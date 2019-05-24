<?php

namespace app\models\admin;

use app\models\AppModel;

class Currency extends AppModel
{
    public $attributes = [
        'title' => '',
        'code' => '',
        'value' => '',
        'base' => '',
        'symbol_left' => '',
        'symbol_right' => ''
    ];

    public $rules = [
        'required' => [
            ['title'],
            ['code'],
            ['value']
        ],
        'numeric' => [
            ['value']
        ]
    ];
}