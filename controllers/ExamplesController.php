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
                'update'
            );
        }
        public function actionDelete()
    {
        return $this->render(
            'delete'
        );
    }
}