<?php

namespace app\controllers;

use yii\web\Controller;

class ExamplesController extends Controller
{
    public function actionIndex()
    {
        return $this->render(
            'test',
            ['text' => 'Hello World!']
        );
    }
    public function actionAdmin()
    {
        return $this->render(
            'admin_list'
        );
    }
    public function actionStudent()
    {
        return $this->render(
            'student_list'
        );
    }
}