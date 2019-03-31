<?php

namespace app\controllers;

use ishop\App;

class MainController extends AppController
{
    public function indexAction()
    {
        $posts = \R::findAll('test');

        $this->setMeta(App::$app->getProperty('shop_name'), 'Описание ...', 'Ключевые слова ...');
        $this->set(compact('posts'));
    }
}