<?php

namespace Controllers;

require_once __DIR__ . '/../models/Slider.php';
require_once __DIR__ . '/../models/Page.php';
require_once __DIR__ . '/../models/Category.php';
require_once __DIR__ . '/../models/Product.php';

class PageController
{
    public function glavnaya()
    {
        $ResultReadSlides = new \Models\Slider;
        $ResultReadSlides = $ResultReadSlides->read_slides();

        $ResultReadCategories = new \Models\Category;
        $ResultReadCategories = $ResultReadCategories->read_categories();

        $ResultReadSubCategories = new \Models\Category;
        $ResultReadSubCategories = $ResultReadSubCategories->read_subcategories();
        require_once __DIR__ . '/../views/glavnaya.php';
    }

    public function otslezhivat_zakaz()
    {
        require_once __DIR__ . '/../views/otslezhivat-zakaz.php';
    }

    public function o_nas()
    {
        require_once __DIR__ . '/../views/o-nas.php';
    }

    public function blog()
    {
        require_once __DIR__ . '/../views/blog.php';
    }

    public function kontakty()
    {
        require_once __DIR__ . '/../views/kontakty.php';
    }

    public function izbrannoe()
    {
        require_once __DIR__ . '/../views/izbrannoe.php';
    }
}
