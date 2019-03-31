<?php

namespace ishop\base;

abstract class Modal
{
    public $attributes = [];
    public $errors = [];
    public $rules = [];

    public function __construct()
    {

    }
}