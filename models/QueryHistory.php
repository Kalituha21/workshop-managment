<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use \Exception;

/**
 * @property int $id
 * @property string $name
 * @property string $completed_at
 */
class QueryHistory extends ActiveRecord
{
    public const QUERY_NAMES = [
        'create_query_history_table',
        'create_test_table',
        'create_system_users_table',
        'insert_admin_user',
        'modify_query_history_table',
        'alter_users_add_fullname_columns',
        'create_system_meta_table',

        // TODO: add here name new query folder
    ];




    public const FILE_NAME_QUERY_RUN = 'execute.sql';
    public const FILE_NAME_QUERY_REVERT = 'revert.sql';

    private const QUERY_NAME_CREATE_QUERY_HISTORY_TABLE = 'create_query_history_table';

    public static function tableName()
    {
        return 'query_history';
    }

    /**
     * @throws Exception
     */
    public function revert(): void
    {
        $sql = self::getSql($this->name, self::FILE_NAME_QUERY_REVERT);
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand($sql);
        $command->query();

        if ($this->name === self::QUERY_NAME_CREATE_QUERY_HISTORY_TABLE) {
            // no need to delete history of "query_history" table creation since history table already dropped
            return;
        }

        $this->delete();
    }

    /**
     * @param string $queryName
     * @throws Exception
     */
    public static function executeQuery(string $queryName): void
    {
        if ($queryName === self::QUERY_NAME_CREATE_QUERY_HISTORY_TABLE) {
            if (Yii::$app->getDb()->getSchema()->getTableSchema(self::tableName())) {
                return;
            }
        } elseif (QueryHistory::find()->where(['name' => $queryName])->exists()) {
            return;
        }


        $sql = self::getSql($queryName, self::FILE_NAME_QUERY_RUN);

        $connection = Yii::$app->getDb();
        $command = $connection->createCommand($sql);
        $command->queryAll();

        if ($queryName === self::QUERY_NAME_CREATE_QUERY_HISTORY_TABLE) {
            Yii::$app->db->schema->refresh();
        }

        $queryHistory = new QueryHistory();
        $queryHistory->name = $queryName;
        $queryHistory->save();
    }

    public static function getSql(string $queryName, string $executionType): string
    {
        $filePath = self::getFilePath($queryName, $executionType);

        return file_get_contents($filePath);
    }

    private static function getFilePath(string $queryName, string $executionType): string
    {
        return sprintf('%s/../queries/%s/%s', realpath(__DIR__), $queryName, $executionType);
    }
}