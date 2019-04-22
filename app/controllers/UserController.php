<?php

namespace app\controllers;

use app\models\User;

class UserController extends AppController
{
    public function signupAction()
    {
        if (!empty($_POST)) {
            $user = new User();
            $data = $_POST;
            $user->load($data);

            if (!$user->validate($data) || !$user->checkUnique()) {
                $user->getErrors();
                redirect();
            } else {
                $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
                if ($user->save('user')) {
                    $_SESSION['success'] = 'Пользователь зарегистрирован.';
                } else {
                    $_SESSION['error'] = 'Ошибка!';
                }
            }
            redirect();
        }

        $this->setMeta('Регистрация');
    }

    public function loginAction()
    {
        
    }

    public function logout()
    {
        
    }
}