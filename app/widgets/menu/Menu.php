<?php
namespace app\widgets\menu;

use ishop\App;
use ishop\Cache;

class Menu
{
    protected $data;
    protected $tree;
    protected $menuHtml;
    protected $tpl;
    protected $container = 'ul';
    protected $table = 'category';
    protected $cache = 3600;
    protected $cacheKey = 'ishop_menu';
    protected $attrs = [];
    protected $prepend = '';

    public function __construct($options = [])
    {
        $this->tpl = __DIR__ . '/menu_tpl/menu.php';
        $this->getOptions($options);
        $this->run();
    }

    protected function getOptions($options)
    {
        foreach ($options as $k => $v) {
            if (property_exists($this, $k)) {
                $this->$k = $v;
            }
        }
    }

    protected function run()
    {
        $cache = Cache::instance();
        $this->menuHtml = $cache->get($this->cacheKey);

        if (!$this->menuHtml) {
            $this->data = App::$app->getProperty('cats');

            if (!$this->data) {
                $this->data = \R::getAssoc("SELECT * FROM {$this->table}");
            }
        }

        $this->output();
    }

    protected function output()
    {
        echo $this->menuHtml;
    }

    protected function getTree()
    {

    }

    protected function getMenuHtml($tree, $tab = '')
    {

    }

    protected function catToTemplate($category, $tab, $id)
    {

    }
}