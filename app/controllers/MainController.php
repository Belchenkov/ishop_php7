<?php

namespace app\controllers;

use ishop\App;
use ishop\Cache;

class MainController extends AppController
{
    public function indexAction()
    {
        $posts = \R::findAll('test');

        $cache = Cache::instance();
        $cache->delete('test');

        $this->setMeta(App::$app->getProperty('shop_name'), 'Описание ...', 'Ключевые слова ...');
        $this->set(compact('posts'));
    }
}