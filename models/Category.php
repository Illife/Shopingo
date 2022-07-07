<?php

namespace Models;

require_once __DIR__ . '/Dbconnect.php';

class Category extends Dbconnect
{

    public function read_categories()
    {
        $SqlReadCategories = "SELECT * FROM category WHERE parent_id=0";
        $conn = $this->dbconnect();
        if ($ResultReadCategories = $conn->query($SqlReadCategories)) {
            foreach ($ResultReadCategories as $category) {
            }
        }
        return $ResultReadCategories;
    }

    public function read_subcategories()
    {
        $SqlReadSubCategories = "SELECT * FROM category";
        $conn = $this->dbconnect();
        if ($ResultReadSubCategories = $conn->query($SqlReadSubCategories)) {
            foreach ($ResultReadSubCategories as $subcategory) {
            }
        }
        return $ResultReadSubCategories;
    }

    public function read_products_by_id($category_id)
    {
        $SqlReadProductsByCategoryId = "SELECT * FROM category JOIN product ON category.id=product.category_id WHERE category.parent_id=$category_id";
        $conn = $this->dbconnect();
        if ($ResultReadProductsByCategoryId = $conn->query($SqlReadProductsByCategoryId)) {
            foreach ($ResultReadProductsByCategoryId as $products) {
            }
        }
        return $ResultReadProductsByCategoryId;
    }

    public function read_category_by_id($category_id)
    {
        $SqlReadCategoryById = "SELECT * FROM category WHERE id=$category_id";
        $conn = $this->dbconnect();
        if ($ResultReadCategoryById = $conn->query($SqlReadCategoryById)) {
            foreach ($ResultReadCategoryById as $category) {
            }
        }
        return $ResultReadCategoryById;
    }

    public function read_category_by_parent_id($category_id)
    {
        $SqlReadCategoryByParentId = "SELECT * FROM category WHERE parent_id=$category_id";
        $conn = $this->dbconnect();
        if ($ResultReadCategoryByParentId = $conn->query($SqlReadCategoryByParentId)) {
            foreach ($ResultReadCategoryByParentId as $subcategory) {
            }
        }
        return $ResultReadCategoryByParentId;
    }

    public function create_category($title, $slug, $parent_id, $img)
    {
        $SqlCreateCategory = "INSERT INTO category SET title = '$title', slug = '$slug', parent_id = '$parent_id', img = '$img'";
        $conn = $this->dbconnect();
        $ResultCreateCategory = $conn->query($SqlCreateCategory);
    }

    public function read_categories_with_pagination($page, $limit)
    {
        $offset = $limit * ($page - 1);
        $SqlReadSubCategories = "SELECT * FROM category LIMIT $limit OFFSET $offset";
        $conn = $this->dbconnect();
        if ($ResultReadSubCategories = $conn->query($SqlReadSubCategories)) {
            foreach ($ResultReadSubCategories as $subcategory) {
            }
        }
        return $ResultReadSubCategories;
    }

    public function update_category($id, $img, $parent_id, $title, $slug)
    {
        $SqlUpdateSlide = "UPDATE category SET img = '$img', parent_id = '$parent_id', title = '$title', slug = '$slug' WHERE id = $id";
        $conn = $this->dbconnect();
        $ResultUpdateSlide = $conn->query($SqlUpdateSlide);
    }

    public function category_delete($id)
    {
        $SqlDeleteSlide = "DELETE FROM category WHERE id = '$id'";
        $conn = $this->dbconnect();
        $ResultCreateSlide = $conn->query($SqlDeleteSlide);
    }
}
