<?php

require_once __DIR__ . '/../models/Category.php';

$category_id = $_POST['id'];

$ResultReadCategoryByParentId = new \Models\Category;
$ResultReadCategoryByParentId = $ResultReadCategoryByParentId->read_category_by_parent_id($category_id);

?>

<?php foreach ($ResultReadCategoryByParentId as $subcategory) { ?>
    <option value="<?= $subcategory['id'] ?>"><?= $subcategory['title'] ?></option>
<?php } ?>