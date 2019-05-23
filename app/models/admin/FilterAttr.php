<?php

namespace app\models\admin;

use app\models\AppModel;

class FilterAttr extends AppModel
{
    public $attributes = [
        'value' => '',
        'attr_group_id' => ''
    ];

    public $rules = [
        'required' => [
            ['value'],
            ['attr_group_id']
        ],
        'integer' => [
            ['attr_group_id']
        ]
    ];
}