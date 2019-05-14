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
}