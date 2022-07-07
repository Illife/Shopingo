<?php

namespace Models;

require_once __DIR__ . '/Dbconnect.php';

class Product extends Dbconnect
{

    public function read_products()
    {
        $SqlReadProducts = "SELECT * FROM product";
        $conn = $this->dbconnect();
        if ($ResultReadProducts = $conn->query($SqlReadProducts)) {
            foreach ($ResultReadProducts as $product) {
            }
        }
        return $ResultReadProducts;
    }

    public function sort_products_by_rating()
    {
        $SqlSortProductsByRating = "SELECT * FROM product ORDER BY average_rating DESC LIMIT 8";
        $conn = $this->dbconnect();
        if ($ResultSortProductsByRating = $conn->query($SqlSortProductsByRating)) {
            foreach ($ResultSortProductsByRating as $product) {
            }
        }
        return $ResultSortProductsByRating;
    }

    public function sort_products_by_rating_limit4()
    {
        $SqlSortProductsByRating = "SELECT * FROM product ORDER BY average_rating DESC LIMIT 4";
        $conn = $this->dbconnect();
        if ($ResultSortProductsByRating = $conn->query($SqlSortProductsByRating)) {
            foreach ($ResultSortProductsByRating as $product) {
            }
        }
        return $ResultSortProductsByRating;
    }

    public function sort_products_by_id()
    {
        $SqlSortProductsById = "SELECT * FROM product ORDER BY id DESC LIMIT 5";
        $conn = $this->dbconnect();
        if ($ResultSortProductsById = $conn->query($SqlSortProductsById)) {
            foreach ($ResultSortProductsById as $product) {
            }
        }
        return $ResultSortProductsById;
    }

    public function sort_products_by_id_limit4()
    {
        $SqlSortProductsById = "SELECT * FROM product ORDER BY id DESC LIMIT 4";
        $conn = $this->dbconnect();
        if ($ResultSortProductsById = $conn->query($SqlSortProductsById)) {
            foreach ($ResultSortProductsById as $product) {
            }
        }
        return $ResultSortProductsById;
    }

    public function read_products_with_pagination($page, $limit)
    {
        $offset = $limit * ($page - 1);
        $SqlReadProductsWithPagination = "SELECT * FROM product LIMIT $limit OFFSET $offset";
        $conn = $this->dbconnect();
        if ($ResultReadProductsWithPagination = $conn->query($SqlReadProductsWithPagination)) {
            foreach ($ResultReadProductsWithPagination as $product) {
            }
        }
        return $ResultReadProductsWithPagination;
    }

    public function read_products_by_category_id($category_id)
    {
        $SqlReadProductsByCategoryId = "SELECT * FROM product WHERE category_id=$category_id";
        $conn = $this->dbconnect();
        if ($ResultReadProductsByCategoryId = $conn->query($SqlReadProductsByCategoryId)) {
            foreach ($ResultReadProductsByCategoryId as $products) {
            }
        }
        return $ResultReadProductsByCategoryId;
    }

    public function read_products_by_status($status)
    {
        $SqlReadProductsByStatus = "SELECT * FROM product WHERE `status`='$status'";
        $conn = $this->dbconnect();
        if ($ResultReadProductsByStatus = $conn->query($SqlReadProductsByStatus)) {
            foreach ($ResultReadProductsByStatus as $product) {
            }
        }
        return $ResultReadProductsByStatus;
    }

    public function read_product_by_id($id)
    {
        $SqlReadProductById = "SELECT * FROM product WHERE id=$id";
        $conn = $this->dbconnect();
        if ($ResultReadProductById = $conn->query($SqlReadProductById)) {
            foreach ($ResultReadProductById as $products) {
            }
        }
        return $ResultReadProductById;
    }

    public function update_product($id, $img, $title, $price, $old_price, $category_id, $brand_id, $color, $size, $status, $date)
    {
        $SqlUpdateProduct = "UPDATE product SET img = '$img', title = '$title', price = '$price', old_price = '$old_price', category_id = '$category_id', brand_id = '$brand_id', color = '$color', size = '$size', `status` = '$status', `date` = '$date' WHERE id = $id";
        $conn = $this->dbconnect();
        $ResultUpdateProduct = $conn->query($SqlUpdateProduct);
    }

    public function create_product($img, $title, $description, $price, $old_price, $category_id, $brand_id, $color, $size, $status)
    {
        $SqlCreateProduct = "INSERT INTO product SET img = '$img', title = '$title', `description`='$description', price = '$price', old_price = '$old_price', category_id = '$category_id', brand_id = '$brand_id', color = '$color', size = '$size', `status` = '$status'";
        $conn = $this->dbconnect();
        $ResultCreateSlide = $conn->query($SqlCreateProduct);
    }

    public function delete_product($id)
    {
        $SqlDeleteProduct = "DELETE FROM product WHERE id = '$id'";
        $conn = $this->dbconnect();
        $ResultDeleteProduct = $conn->query($SqlDeleteProduct);
    }

    public function read_products_search($search, $category_id)
    {
        if ($category_id == 0) {
            $SqlReadProductsSearch = "SELECT * FROM `product` WHERE `title` LIKE '%{$search}%'";
        } else {
            $SqlReadProductsSearch = "SELECT * FROM `product` WHERE `category_id` = $category_id AND `title` LIKE '%{$search}%'";
        }

        $conn = $this->dbconnect();
        if ($ResultReadProductsSearch = $conn->query($SqlReadProductsSearch)) {
            foreach ($ResultReadProductsSearch as $search_product) {
            }
        }
        return $ResultReadProductsSearch;
    }

    public function read_product_gallery_by_id($product_id)
    {
        $SqlReadProductById = "SELECT * FROM product_gallery WHERE product_id=$product_id";
        $conn = $this->dbconnect();
        if ($ResultReadProductById = $conn->query($SqlReadProductById)) {
            foreach ($ResultReadProductById as $products) {
            }
        }
        return $ResultReadProductById;
    }

    public function read_product_size_by_id($product_id)
    {
        $SqlReadProductSizeById = "SELECT * FROM product_size WHERE product_id=$product_id";
        $conn = $this->dbconnect();
        if ($ResultReadProductSizeById = $conn->query($SqlReadProductSizeById)) {
            foreach ($ResultReadProductSizeById as $products) {
            }
        }
        return $ResultReadProductSizeById;
    }

    public function read_product_color_by_id($product_id)
    {
        $SqlReadProductColorById = "SELECT * FROM product_color WHERE product_id=$product_id";
        $conn = $this->dbconnect();
        if ($ResultReadProductColorById = $conn->query($SqlReadProductColorById)) {
            foreach ($ResultReadProductColorById as $products) {
            }
        }
        return $ResultReadProductColorById;
    }

    public function read_products_sort_by_price_desc()
    {
        $SqlReadProductsSearchByPriceDesc = "SELECT * FROM product ORDER BY `product`.`price` DESC LIMIT 1";
        $conn = $this->dbconnect();
        if ($ResultReadProductsSearchByPriceDesc = $conn->query($SqlReadProductsSearchByPriceDesc)) {
            foreach ($ResultReadProductsSearchByPriceDesc as $product) {
            }
        }
        return $ResultReadProductsSearchByPriceDesc;
    }

    public function read_products_sort_by_price_asc()
    {
        $SqlReadProductsSearchByPriceAsc = "SELECT * FROM product ORDER BY `product`.`price` ASC LIMIT 1";
        $conn = $this->dbconnect();
        if ($ResultReadProductsSearchByPriceAsc = $conn->query($SqlReadProductsSearchByPriceAsc)) {
            foreach ($ResultReadProductsSearchByPriceAsc as $product) {
            }
        }
        return $ResultReadProductsSearchByPriceAsc;
    }

    public function read_products_by_price_range($min_price, $max_price)
    {
        $SqlReadProductsByPriceRange = "SELECT * FROM product WHERE `price` BETWEEN $min_price AND $max_price";
        $conn = $this->dbconnect();
        if ($ResultReadProductsByPriceRange = $conn->query($SqlReadProductsByPriceRange)) {
            foreach ($ResultReadProductsByPriceRange as $product) {
            }
        }
        return $ResultReadProductsByPriceRange;
    }

    public function read_products_search_by_sql($sql)
    {
        $conn = $this->dbconnect();
        if ($ResultReadProductsSearchBySql = $conn->query($sql)) {
            foreach ($ResultReadProductsSearchBySql as $product) {
            }
        }
        return $ResultReadProductsSearchBySql;
    }

    public function read_products_by_category_id_sort_by_price_desc($category_id)
    {
        $SqlReadProductsByCategoryIdSortByPriceDesc = "SELECT * FROM product WHERE category_id=$category_id ORDER BY `product`.`price` DESC LIMIT 1";
        $conn = $this->dbconnect();
        if ($ResultReadProductsByCategoryIdSortByPriceDesc = $conn->query($SqlReadProductsByCategoryIdSortByPriceDesc)) {
            foreach ($ResultReadProductsByCategoryIdSortByPriceDesc as $products) {
            }
        }
        return $ResultReadProductsByCategoryIdSortByPriceDesc;
    }

    public function read_products_by_category_id_sort_by_price_asc($category_id)
    {
        $SqlReadProductsByCategoryIdSortByPriceAsc = "SELECT * FROM product WHERE category_id=$category_id ORDER BY `product`.`price` ASC LIMIT 1";
        $conn = $this->dbconnect();
        if ($ResultReadProductsByCategoryIdSortByPriceAsc = $conn->query($SqlReadProductsByCategoryIdSortByPriceAsc)) {
            foreach ($ResultReadProductsByCategoryIdSortByPriceAsc as $products) {
            }
        }
        return $ResultReadProductsByCategoryIdSortByPriceAsc;
    }

    public function read_product_by_size_by_all_categories($size)
    {
        $SqlReadProductBySizeByAllCat = "SELECT * FROM product JOIN product_size ON product.id = product_size.product_id  WHERE product_size.size=$size";
        $conn = $this->dbconnect();
        if ($ResultReadProductBySizeByAllCat = $conn->query($SqlReadProductBySizeByAllCat)) {
            foreach ($ResultReadProductBySizeByAllCat as $products) {
            }
        }
        return $ResultReadProductBySizeByAllCat;
    }

    public function read_products_by_brand_id($brand_id)
    {
        $SqlReadProductsByBrandId = "SELECT * FROM product WHERE brand_id=$brand_id";
        $conn = $this->dbconnect();
        if ($ResultReadProductsByBrandId = $conn->query($SqlReadProductsByBrandId)) {
            foreach ($ResultReadProductsByBrandId as $products) {
            }
        }
        return $ResultReadProductsByBrandId;
    }

    public function read_product_by_color_by_all_categories($color)
    {
        $SqlReadProductByColorByAllCat = "SELECT * FROM product JOIN product_color ON product.id = product_color.product_id  WHERE product_color.color=$color";
        $conn = $this->dbconnect();
        if ($ResultReadProductByColorByAllCat = $conn->query($SqlReadProductByColorByAllCat)) {
            foreach ($ResultReadProductByColorByAllCat as $products) {
            }
        }
        return $ResultReadProductByColorByAllCat;
    }

    public function update_product_view($view, $id)
    {
        $SqlUpdateProductView = "UPDATE product SET view = $view WHERE id = $id";
        $conn = $this->dbconnect();
        $ResultUpdateProductView = $conn->query($SqlUpdateProductView);
    }

    public function read_products_sort_by_popularity($category_id)
    {
        $SqlReadProductsSortByPopularity = "SELECT * FROM product WHERE category_id=$category_id ORDER BY `product`.`view` DESC";
        $conn = $this->dbconnect();
        if ($ResultReadProductsSortByPopularity = $conn->query($SqlReadProductsSortByPopularity)) {
            foreach ($ResultReadProductsSortByPopularity as $products) {
            }
        }
        return $ResultReadProductsSortByPopularity;
    }
}
