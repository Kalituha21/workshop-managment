<?php

namespace app\controllers;

use app\models\User;
use Yii;
use yii\bootstrap4\ActiveForm;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;

class AdminController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['instructors', 'add-instructor'],
                'rules' => [
                    [
                        'actions' => ['instructors', 'add-instructor'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function () {
                            return in_array(
                                Yii::$app->user->identity->role,
                                [User::ROLE_ADMIN]
                            );
                        },
                    ],
                ],
            ],
        ];
    }

    public function actionInstructors()
    {
        $instructorsData = [];
        $instructors = User::findAll(['role' => User::ROLE_INSTRUCTOR]);
        foreach ($instructors as $instructor) {
            $instructorsData[] = [
                'surname' => $instructor->surname,
                'name' => $instructor->name,
                'email' => $instructor->email,
            ];
        }

        return $this->render(
            'instructor_list',
            ['instructors' => $instructorsData]
        );
    }

    public function actionAddInstructor()
    {
        $newUser = new User();

        if ($newUser->load(Yii::$app->request->post())) {
            $newUser->role = User::ROLE_INSTRUCTOR;

            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;

                return ActiveForm::validate($newUser);
            }

            $newUser->setPassword($newUser->password);
            $newUser->generateAuthKey();
            $newUser->generatePasswordResetToken();

            if ($newUser->save()) {
                return $this->redirect('/admin/instructors');
            }
        }

        return $this->renderAjax(
            'modal_add_instructor',
            ['model' => $newUser]
        );
    }
}