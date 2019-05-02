<?php

namespace app\controllers\admin;


class MainController extends AppController
{
    public function indexAction()
    {
        $this->setMeta('Панель управления');
    }
}