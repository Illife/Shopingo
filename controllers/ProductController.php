<?php

namespace Controllers;

require_once __DIR__ . '/../models/Slider.php';
require_once __DIR__ . '/../models/Page.php';
require_once __DIR__ . '/../models/Category.php';
require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../models/Brand.php';
require_once __DIR__ . '/../models/Color.php';
require_once __DIR__ . '/../models/Size.php';

class ProductController
{

    public function search()
    {
        if (!empty($_GET['category'])) {
            $category_id = $_GET['category'];
            $ResultReadCategoryByParentId = new \Models\Category;
            $ResultReadCategoryByParentId = $ResultReadCategoryByParentId->read_category_by_parent_id($category_id);
            foreach ($ResultReadCategoryByParentId as $subcategory) {
                // для каждой подкатегории 2 уровня находим товары 2 уровня
                $category_id = $subcategory['id'];
                $ResultReadProductsByCategoryId = new \Models\Product;
                $ResultReadProductsByCategoryId = $ResultReadProductsByCategoryId->read_products_by_category_id($category_id);
                foreach ($ResultReadProductsByCategoryId as $products) {
                }
                // для каждой подкатегории находим подкатегории 3 уровня
                $ResultReadCategoryByParent_3_Id = new \Models\Category;
                $ResultReadCategoryByParent_3_Id = $ResultReadCategoryByParent_3_Id->read_category_by_parent_id($category_id);
                foreach ($ResultReadCategoryByParent_3_Id as $subcategory_3) {
                    // для каждой подкатегории 3 уровня находим товары 3 уровня
                    $category_id = $subcategory_3['id'];
                    $ResultReadProductsByCategory_3_Id = new \Models\Product;
                    $ResultReadProductsByCategory_3_Id = $ResultReadProductsByCategory_3_Id->read_products_by_category_id($category_id);
                    foreach ($ResultReadProductsByCategory_3_Id as $products_3) {
                    }
                }
            }
        } else {
            $search = $_POST['input_search'];
            $category_id = $_POST['select_search'];
            $ResultReadProductsSearch = new \Models\Product;
            $ResultReadProductsSearch = $ResultReadProductsSearch->read_products_search($search, $category_id);
        }

        $ResultReadCategories = new \Models\Category;
        $ResultReadCategories = $ResultReadCategories->read_categories();

        require_once __DIR__ . '/../views/search/search.php';
    }
}
