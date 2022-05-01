<?php

namespace app\controllers;

use app\models\QueryHistory;
use app\structures\QueryData;
use Throwable;
use yii\web\Controller;

class QueryController extends Controller
{
    public function actionIndex()
    {
        return $this->render(
            'index',
            [
                'data' => $this->getQueriesData(),
                'errors' => [],
            ]
        );
    }
    public function actionRunAll()
    {
        $failedQuery = null;
        $errors = [];

        try {
            foreach (QueryHistory::QUERY_NAMES as $queryName) {
                $failedQuery = $queryName;
                QueryHistory::executeQuery($queryName);
            }
        } catch (Throwable $e) {
            $errors[] = "Failed to execute query '$failedQuery', future execution was stopped";
            $errors[] = $e->getMessage();
        }

        return $this->render(
            'index',
            [
                'data' => $this->getQueriesData(),
                'errors' => $errors,
            ]
        );
    }

    public function actionRevertAll()
    {
        $failedQuery = null;
        $errors = [];

        try {
            $queriesHistory = QueryHistory::find()->orderBy('id DESC')->all();

            /** @var QueryHistory $queryHistory */
            foreach ($queriesHistory as $queryHistory) {
                $failedQuery = $queryHistory->name;
                $queryHistory->revert();
            }
        } catch (Throwable $e) {
            $errors[] = "Failed to revert query '$failedQuery', future reverts stopped";
            $errors[] = $e->getMessage();
        }

        return $this->render(
            'index',
            [
                'data' => $this->getQueriesData(),
                'errors' => $errors,
            ]
        );
    }

    public function actionRevertLast()
    {
        $errors = [];

        try {
            $queryHistory = QueryHistory::find()
                ->orderBy('id DESC')
                ->limit(1)
                ->one();

            $queryHistory->revert();
        } catch (Throwable $e) {
            $errors[] = $e->getMessage();
        }

        return $this->render(
            'index',
            [
                'data' => $this->getQueriesData(),
                'errors' => $errors,
            ]
        );
    }

    /**
     * @return QueryData[]
     */
    private function getQueriesData(): array
    {
        try {
            $completedQueries = QueryHistory::find()->select('name')->column();
        } catch (Throwable $e) {
            $completedQueries = [];
        }

        $queriesData = [];
        foreach (QueryHistory::QUERY_NAMES as $queryName) {
            $queryData = new QueryData();
            $queryData->name = $queryName;
            $queryData->sql = QueryHistory::getSql($queryName, QueryHistory::FILE_NAME_QUERY_RUN);
            $queryData->isCompleted = in_array($queryName, $completedQueries);

            $queriesData[] = $queryData;
        }

        return $queriesData;
    }
}