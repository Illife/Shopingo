<?php

namespace Controllers;

require_once __DIR__ . '/../models/Slider.php';
require_once __DIR__ . '/../models/Category.php';
require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../models/Brand.php';
require_once __DIR__ . '/../controllers/IsAdminController.php';

class AdminController extends IsAdminController
{
    public function glavnaya()
    {
        require_once __DIR__ . '/../views/admin/glavnaya.php';
    }

    public function prodazhi()
    {
        require_once __DIR__ . '/../views/admin/prodazhi.php';
    }

    public function upravlenie_proektom()
    {
        require_once __DIR__ . '/../views/admin/upravlenie-proektom.php';
    }

    public function panel_upravleniya()
    {
        require_once __DIR__ . '/../views/admin/panel_upravleniya.php';
    }

    public function slajd()
    {
        $id = $_GET['id'];
        $ResultReadSlide = new \Models\Slider;
        $ResultReadSlide = $ResultReadSlide->read_slide_by_id($id);
        require_once __DIR__ . '/../views/admin/slajd.php';
    }

    public function slajd_add()
    {
        require_once __DIR__ . '/../views/admin/slajd_add.php';
    }

    public function slajd_delete()
    {
        $id = $_GET['id'];
        $SlajdDelete = new \Models\Slider;
        $SlajdDelete = $SlajdDelete->slajd_delete($id);
        echo "<script>location.href='" . PATH . "/admin/slajdy" . "';</script>";
    }

    public function slajdy()
    {
        $ResultReadSlides = new \Models\Slider;
        $ResultReadSlides = $ResultReadSlides->read_slides();
        require_once __DIR__ . '/../views/admin/slajdy.php';
    }

    public function kategorii_tovarov()
    {
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $limit = 10;
        $ResultReadCategories = new \Models\Category;
        $ResultReadCategories = $ResultReadCategories->read_categories_with_pagination($page, $limit);

        $ResultReadSubCategories = new \Models\Category;
        $ResultReadSubCategories = $ResultReadSubCategories->read_subcategories();
        $count = 0;
        foreach ($ResultReadSubCategories as $category) {
            $count++;
        }
        $countPages = ceil($count / $limit);
        require_once __DIR__ . '/../views/admin/kategorii_tovarov.php';
    }

    public function kategoriya()
    {
        $category_id = $_GET['id'];
        $ResultReadCategoryById = new \Models\Category;
        $ResultReadCategoryById = $ResultReadCategoryById->read_category_by_id($category_id);
        require_once __DIR__ . '/../views/admin/kategoriya.php';
    }

    public function kategoriya_delete()
    {
        $id = $_GET['id'];
        $CategoryDelete = new \Models\Category;
        $CategoryDelete = $CategoryDelete->category_delete($id);
        echo "<script>location.href='" . PATH . "/admin/kategorii-tovarov" . "';</script>";
    }

    public function read_products_with_pagination()
    {
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $limit = 20;
        $ResultReadProductsWithPagination = new \Models\Product;
        $ResultReadProductsWithPagination = $ResultReadProductsWithPagination->read_products_with_pagination($page, $limit);

        $ResultReadProducts = new \Models\Product;
        $ResultReadProducts = $ResultReadProducts->read_products();
        $count = 0;
        foreach ($ResultReadProducts as $product) {
            $count++;
        }
        $countPages = ceil($count / $limit);

        $ResultReadCategories = new \Models\Category;
        $ResultReadCategories = $ResultReadCategories->read_categories();

        require_once __DIR__ . '/../views/admin/product/products.php';
    }

    public function read_products_by_category()
    {
        //товары 1 уровня
        $category_id = $_GET['category'];

        $ResultReadProducts = new \Models\Product;
        $ResultReadProducts = $ResultReadProducts->read_products();

        if ($category_id == 0) {
            echo "<script>location.href='/admin/products';</script>";
        } else {
            $ResultReadProductsByCategoryId = new \Models\Product;
            $ResultReadProductsByCategoryId = $ResultReadProductsByCategoryId->read_products_by_category_id($category_id);

            //товары 1 уровня
            //категории 2 уровня
            $ResultReadCategoryByParentId = new \Models\Category;
            $ResultReadCategoryByParentId = $ResultReadCategoryByParentId->read_category_by_parent_id($category_id);
            //категории 2 уровня
            $ResultReadCategories = new \Models\Category;
            $ResultReadCategories = $ResultReadCategories->read_categories();
        }

        require_once __DIR__ . '/../views/admin/product/products_by_category.php';
    }

    public function read_products_by_status()
    {
        $status = $_GET['status'];
        // $status = str_replace('%', ' ', $status);
        $ResultReadCategories = new \Models\Category;
        $ResultReadCategories = $ResultReadCategories->read_categories();

        $ResultReadProductsByStatus = new \Models\Product;
        $ResultReadProductsByStatus = $ResultReadProductsByStatus->read_products_by_status($status);

        require_once __DIR__ . '/../views/admin/product/products_by_status.php';
    }

    public function update_product_by_id()
    {
        $id = $_GET['id'];
        $ResultReadProductById = new \Models\Product;
        $ResultReadProductById = $ResultReadProductById->read_product_by_id($id);

        $ResultReadCategories = new \Models\Category;
        $ResultReadCategories = $ResultReadCategories->read_subcategories();

        $ResultReadAllBrands = new \Models\Brand;
        $ResultReadAllBrands = $ResultReadAllBrands->read_all_brands();

        $ResultReadStatus = new \Models\Brand;
        $ResultReadStatus = $ResultReadStatus->read_status();

        require_once __DIR__ . '/../views/admin/product/update_product_by_id.php';
    }

    public function product_create()
    {
        $id = $_GET['id'];
        $ResultReadCategories = new \Models\Category;
        $ResultReadCategories = $ResultReadCategories->read_categories();

        $ResultReadAllBrands = new \Models\Brand;
        $ResultReadAllBrands = $ResultReadAllBrands->read_all_brands();

        $ResultReadStatus = new \Models\Brand;
        $ResultReadStatus = $ResultReadStatus->read_status();

        require_once __DIR__ . '/../views/admin/product/product-create.php';
    }

    public function product_delete()
    {
        $id = $_GET['id'];
        $ProductDelete = new \Models\Product;
        $ProductDelete = $ProductDelete->delete_product($id);
        echo "<script>location.href='" . PATH . "/admin/products" . "';</script>";
    }
}
