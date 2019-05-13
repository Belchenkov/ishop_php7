<?php

namespace app\controllers\admin;

use ishop\libs\Pagination;

class ProductController extends AppController
{
    public function indexAction()
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 10;
        $count = \R::count('product');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();
        $products = \R::getAll("SELECT product.*, category.title AS cat FROM product
            JOIN category ON category.id = product.category_id ORDER BY product.title LIMIT $start, $perpage");

        $this->setMeta('Список товаров');
        $this->set(compact('products', 'pagination', 'count'));
    }
}