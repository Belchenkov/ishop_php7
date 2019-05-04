<?php

namespace app\controllers\admin;

use app\models\User;

class UserController extends AppController
{
    public function loginAdminAction()
    {
        if (!empty($_POST)) {
            $user = new User();

            if (!$user->login(true)) {
                $_SESSION['error'] = 'Логин/пароль введены неверно';
            }

            if (User::isAdmin()) {
                redirect(ADMIN);
            } else {
                redirect();
            }
        }

        $this->layout = 'login';
    }
}