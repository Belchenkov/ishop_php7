<?php

namespace app\controllers;

class ProductController extends AppController
{
    public function viewAction()
    {
        $alias = $this->route['alias'];
        $product = \R::findOne('product', "alias = ? AND status = '1'", [$alias]);

        if (!$product) {
            throw new \Exception('Страница не найдена', 404);
        }

        // TODO breadcrumbs

        // TODO chain products

        // TODO record cookies products

        // TODO просмотренные товары

        // TODO Gallery

        // TODO Modificate

        $this->setMeta($product->title, $product->description, $product->keywords);
        $this->set(compact('product'));
    }
}