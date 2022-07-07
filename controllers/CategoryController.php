<?php

namespace Controllers;

require_once __DIR__ . '/../models/Slider.php';
require_once __DIR__ . '/../models/Page.php';
require_once __DIR__ . '/../models/Category.php';

class CategoryController
{
    public function kategorii_tovarov()
    {
        $ResultReadCategories = new \Models\Category;
        $ResultReadCategories = $ResultReadCategories->read_categories();
        $ResultReadSubCategories = new \Models\Category;
        $ResultReadSubCategories = $ResultReadSubCategories->read_subcategories();
        require_once __DIR__ . '/../views/kategorii-tovarov.php';
    }
}
