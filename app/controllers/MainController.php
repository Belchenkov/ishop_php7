<?php

namespace app\controllers;

use ishop\App;

class MainController extends AppController
{
    public function indexAction()
    {
        $brands = \R::find('brand', 'LIMIT 3');

        $this->setMeta(App::$app->getProperty('shop_name'), 'Описание ...', 'Ключевые слова ...');
        $this->set(compact('brands'));
    }
}