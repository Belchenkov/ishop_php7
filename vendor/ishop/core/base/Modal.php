<?php

namespace ishop\base;

use ishop\Db;

abstract class Modal
{
    public $attributes = [];
    public $errors = [];
    public $rules = [];

    public function __construct()
    {
        Db::instance();
    }
}