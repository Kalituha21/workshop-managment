<?php

namespace app\controllers;

use yii\web\Controller;

class StudentController extends Controller
{
    public function actionStudentProfileTab()
    {
        return $this->render('student_profile_tab');
    }

    public function actionStudentPortal()
    {
        return $this->render('student_portal');
    }
}