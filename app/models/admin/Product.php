<?php

namespace app\models\admin;

use app\models\AppModel;

class Product extends AppModel
{
    public $attributes = [
        'title' => '',
        'category_id' => '',
        'keywords' => '',
        'description' => '',
        'price' => '',
        'old_price' => '',
        'content' => '',
        'status' => '',
        'hit' => '',
        'alias' => ''
    ];

    public $rules = [
        'required' => [
            ['title'],
            ['category_id'],
            ['price']
        ],
        'integer' => [
            ['category_id']
        ]
    ];

    public function editRelatedProduct($id, $data)
    {
        $related_product = \R::getCol('SELECT related_id FROM related_product WHERE product_id = ?', [$id]);

        // IF manage remove chain products
        if (empty($data['related']) && !empty($related_product)) {
            \R::exec("DELETE FROM related_product WHERE product_id = ?", [$id]);
            return;
        }

        // If filters adding chain products
        if (empty($related_product) && !empty($data['related'])) {

            $sql_part = '';
            foreach ($data['related'] as $v) {
                $v = (int)$v;
                $sql_part .= "($id, $v),";
            }
            $sql_part = rtrim($sql_part, ',');

            \R::exec("INSERT INTO related_product (product_id, related_id) VALUES $sql_part");
            return;
        }

        // If change chain product - remove old and add new
        if (!empty($data['related'])) {
            $result = array_diff($related_product, $data['related']);

            if (!empty($result) || count($related_product) != count($data['related'])) {
                \R::exec("DELETE FROM related_product WHERE product_id = ?", [$id]);
                $sql_part = '';
                foreach ($data['related'] as $v) {
                    $v = (int)$v;
                    $sql_part .= "($id, $v),";
                }
                $sql_part = rtrim($sql_part, ',');

                \R::exec("INSERT INTO related_product (product_id, related_id) VALUES $sql_part");
            }
        }
    }

    public function editFilter($id, $data)
    {
        $filter = \R::getCol('SELECT attr_id FROM attribute_product WHERE product_id = ?', [$id]);

        // IF manage remove filters
        if (empty($data['attrs']) && !empty($filter)) {
            \R::exec("DELETE FROM attribute_product WHERE product_id = ?", [$id]);
            return;
        }

        // If filters adding
        if (empty($filter) && !empty($data['attrs'])) {

            $sql_part = '';
            foreach ($data['attrs'] as $v) {
                $sql_part .= "($v, $id),";
            }
            $sql_part = rtrim($sql_part, ',');

            \R::exec("INSERT INTO attribute_product (attr_id, product_id) VALUES $sql_part");
            return;
        }

        // If change filters - remove old and add new
        if (!empty($data['attrs'])) {
            $result = array_diff($filter, $data['attrs']);

            if (!$result) {
                \R::exec("DELETE FROM attribute_product WHERE product_id = ?", [$id]);
                $sql_part = '';
                foreach ($data['attrs'] as $v) {
                    $sql_part .= "($v, $id),";
                }
                $sql_part = rtrim($sql_part, ',');

                \R::exec("INSERT INTO attribute_product (attr_id, product_id) VALUES $sql_part");
            }
        }
    }
}