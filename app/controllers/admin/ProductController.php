<?php

namespace app\controllers\admin;

use app\models\admin\Product;
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

    public function addAction()
    {
        if (!empty($_POST)) {
            $product = new Product();
            $data = $_POST;
            $product->load($data);
            $product->attributes['status'] = $product->attributes['status'] ? '1' : '0';
            $product->attributes['hit'] = $product->attributes['hit'] ? '1' : '0';

            if (!$product->validate($data)) {
                $product->getErrors();
                $_SESSION['form-data'] = $data;
                redirect();
            }

            if ($id = $product->save('product')) {
                $_SESSION['success'] = 'Товар добавлен';
            }
        }

        $this->setMeta('Новый товар');
    }
}