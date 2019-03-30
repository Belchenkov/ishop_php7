<?php

namespace app\controllers;

use ishop\App;

class MainController extends AppController
{
    public function indexAction()
    {
        $this->setMeta(App::$app->getProperty('shop_name'), 'Описание ...', 'Ключевые слова ...');
        $this->set(['name' => 'Aleksey', 'age' => 30]);
    }
}