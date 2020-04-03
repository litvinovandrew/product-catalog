<?php


namespace frontend\helpers;


use common\models\Category;
use common\models\Product;

class CategoryHelper
{
    /**
     * @param $product Product
     */
    public static function getCategoryBreadCrumbs($product) {

        $category =  Category::find()->where(['id' => $product->category_id])->one();


        $tree = [];
        $tree[] = ['id' => $category->id, 'name' => ucfirst($category->name)];


        while(self::getParentCategory($category)) {
            $category =  Category::find()->where(['id' => $category->parent_id])->one();
            $tree[] = ['id' => $category->id, 'name' => ucfirst($category->name)];
        }

        return $tree;


    }

    /**
     * @param $category
     * @return mixed
     */
    public static function getParentCategory($category) {
        return $category->parent_id;
    }

    /**
     * @param $product
     */
    public static function breadcrumbsHtml($product)
    {
        $parts = self::getCategoryBreadCrumbs($product);
        $parts = array_reverse($parts);

        $htmlArray = [];

        foreach ($parts as $part) {
            $htmlArray[] = sprintf('<a href="/site/show-category/%s">%s</a>',$part['id'],$part['name']);
        }

        return implode(' -> ',$htmlArray);
    }




    public static function getChildrenFor($childs, $parentId)
    {
        $results = array();

        foreach ($childs as $el)
        {
            if ($el->parent_id == $parentId)
            {
                $results[] = $el;
            }
            if (count(self::getChilds($el)) > 0 && ($children = self::getChildrenFor(self::getChilds($el), $el->id)) !== FALSE)
            {
                $results = array_merge($results, $children);
            }
        }

        return count($results) > 0 ? $results : [];
    }

    public static function getChilds($category) {
        return Category::find()->where(['parent_id' => $category->id])->all();
    }

}