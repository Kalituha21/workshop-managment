<?php

namespace app\controllers;

use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

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
}