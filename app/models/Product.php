<?php
namespace app\models;

class Product extends AppModel
{
    public function setRecentlyViewed($id)
    {
        $recentlyViewed = $this->getAllRecentlyViewed();

        if (!$recentlyViewed) {
            setcookie('recentlyViewed', $id, time() + 3600*24, '/');
        } else {
            $recentlyViewed = explode('.', $recentlyViewed);

            if (!in_array($id, $recentlyViewed)) {
                $recentlyViewed[] = $id;
                $recentlyViewed = implode('.', $recentlyViewed);
                setcookie('recentlyViewed', $recentlyViewed, time() + 3600*24, '/');
            }
        }
    }

    public function getRecentlyViewed()
    {
        if (!empty($_COOKIE['recentlyViewed'])) {
            $recentlyViewed = $_COOKIE['recentlyViewed'];
            $recentlyViewed = explode('.', $recentlyViewed);

            return array_slice($recentlyViewed, -3);
        }

        return false;
    }

    public function getAllRecentlyViewed()
    {
        return !empty($_COOKIE['recentlyViewed']) ? $_COOKIE['recentlyViewed'] : false;
    }
}