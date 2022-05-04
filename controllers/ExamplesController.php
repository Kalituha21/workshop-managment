<?php

namespace app\controllers;

use app\models\SystemMeta;
use app\models\User;
use Yii;
use yii\bootstrap4\ActiveForm;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;

class ExamplesController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['student'],
                'rules' => [
                    [
                        'actions' => ['student'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function () {
                            return in_array(
                                Yii::$app->user->identity->role,
                                [User::ROLE_ADMIN, User::ROLE_INSTRUCTOR]
                            );
                        },
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render(
            'test',
            ['text' => 'Hello World!']
        );
    }
    public function actionStudent()
    {
        return $this->render(
            'student_list'
        );
    }
    public function actionPapers()
    {
        return $this->render(
            'papers_info'
        );
    }
        public function actionSinfo()
        {
            return $this->render(
                'students_info'
            );
        }
        public function actionUpdate()
        {
            return $this->render(
                'update.php?id='. $row['id'] .''
            );
        }
        public function actionDelete()
    {
        return $this->render(
            'delete'
        );
    }

    public function actionAddNumberOfPaper()
    {
        $papersLimit = SystemMeta::getMeta(SystemMeta::KEY_PAPERS_LIMIT, 1);

        if ($papersLimit->load(Yii::$app->request->post())) {
            if ($papersLimit->save()) {
                return $this->redirect('/examples/student');
            }

            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($papersLimit);
        }

        return $this->renderAjax(
            'modal_number',
            ['model' => $papersLimit]
        );
    }
}