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
        $related = \R::getAll(
            "SELECT * FROM related_product
                  JOIN product ON product.id = related_product.related_id
                   WHERE related_product.product_id = ?", [$product->id]
        );
        // TODO record cookies products

        // TODO просмотренные товары

        // TODO Gallery
        $gallery = \R::findAll('gallery', 'product_id = ?', [$product->id]);

        // TODO Modificate

        $this->setMeta($product->title, $product->description, $product->keywords);
        $this->set(compact('product', 'related', 'gallery'));
    }
}