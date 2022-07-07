<?php

require_once __DIR__ . '/controllers/PageController.php';
require_once __DIR__ . '/controllers/AdminController.php';
require_once __DIR__ . '/controllers/ProductController.php';
require_once __DIR__ . '/controllers/UserController.php';
require_once __DIR__ . '/controllers/CartController.php';
require_once __DIR__ . '/controllers/OrderController.php';

$route_uri = $_SERVER['REQUEST_URI'];
$route_uri = trim($route_uri);
$route = explode('/', $route_uri);
if ($route[1] === '') {
    $glavnaya = new \Controllers\PageController;
    $glavnaya = $glavnaya->glavnaya();
}
if ($route[1] === 'otslezhivat-zakaz') {
    $otslezhivat_zakaz = new \Controllers\PageController;
    $otslezhivat_zakaz = $otslezhivat_zakaz->otslezhivat_zakaz();
}
if ($route[1] === 'o-nas') {
    $o_nas = new \Controllers\PageController;
    $o_nas = $o_nas->o_nas();
}
if ($route[1] === 'kategorii-tovarov') {
    $kategorii_tovarov = new \Controllers\CategoryController;
    $kategorii_tovarov = $kategorii_tovarov->kategorii_tovarov();
}
if ($route[1] === 'blog') {
    $blog = new \Controllers\PageController;
    $blog = $blog->blog();
}
if ($route[1] === 'kontakty') {
    $kontakty = new \Controllers\PageController;
    $kontakty = $kontakty->kontakty();
}
if ($route[1] === 'izbrannoe') {
    $izbrannoe = new \Controllers\PageController;
    $izbrannoe = $izbrannoe->izbrannoe();
}
if ($route[1] === 'shop-cart') {
    $shop_cart = new \Controllers\CartController;
    $shop_cart = $shop_cart->shop_cart();
}
if ($route[1] === 'order-details') {
    $order_details = new \Controllers\OrderController;
    $order_details = $order_details->order_details();
}
if ($route[1] === 'order-shipping') {
    $order_shipping = new \Controllers\OrderController;
    $order_shipping = $order_shipping->order_shipping();
}
if ($route[1] === 'checkout-payment') {
    $checkout_payment = new \Controllers\OrderController;
    $checkout_payment = $checkout_payment->checkout_payment();
}
if ($route[1] === 'checkout-review') {
    $checkout_review = new \Controllers\OrderController;
    $checkout_review = $checkout_review->checkout_review();
}
if ($route[1] === 'checkout-complete') {
    $checkout_complete = new \Controllers\OrderController;
    $checkout_complete = $checkout_complete->checkout_complete();
}
if ($route[1] === 'order-tracking') {
    $order_tracking = new \Controllers\OrderController;
    $order_tracking = $order_tracking->order_tracking();
}
if ($route[1] === 'admin') {
    if ($route[2] === '') {
        $is_admin = new \Controllers\UserController;
        $is_admin = $is_admin->is_admin();
    }
    if ($route[2] === 'glavnaya') {
        $glavnaya = new \Controllers\AdminController;
        $glavnaya = $glavnaya->glavnaya();
    }
    if ($route[2] === 'prodazhi') {
        $prodazhi = new \Controllers\AdminController;
        $prodazhi = $prodazhi->prodazhi();
    }
    if ($route[2] === 'upravlenie-proektom') {
        $upravlenie_proektom = new \Controllers\AdminController;
        $upravlenie_proektom = $upravlenie_proektom->upravlenie_proektom();
    }
    if ($route[2] === 'panel-upravleniya') {
        $panel_upravleniya = new \Controllers\AdminController;
        $panel_upravleniya = $panel_upravleniya->panel_upravleniya();
    }
    if ($route[2] === 'slajd') {
        $slajd = new \Controllers\AdminController;
        $slajd = $slajd->slajd();
    }
    if ($route[2] === 'slajd-add') {
        $slajd_add = new \Controllers\AdminController;
        $slajd_add = $slajd_add->slajd_add();
    }
    if ($route[2] === 'slajd-delete') {
        $slajd_delete = new \Controllers\AdminController;
        $slajd_delete = $slajd_delete->slajd_delete();
    }
    if ($route[2] === 'slajdy') {
        $slajdy = new \Controllers\AdminController;
        $slajdy = $slajdy->slajdy();
    }
    if ($route[2] === 'kategorii-tovarov') {
        $kategorii_tovarov = new \Controllers\AdminController;
        $kategorii_tovarov = $kategorii_tovarov->kategorii_tovarov();
    }
    if ($route[2] === 'kategoriya') {
        $kategoriya = new \Controllers\AdminController;
        $kategoriya = $kategoriya->kategoriya();
    }
    if ($route[2] === 'kategoriya-delete') {
        $kategoriya_delete = new \Controllers\AdminController;
        $kategoriya_delete = $kategoriya_delete->kategoriya_delete();
    }
    if ($route[2] === 'products') {
        $ResultReadProductsWithPagination = new \Controllers\AdminController;
        $ResultReadProductsWithPagination = $ResultReadProductsWithPagination->read_products_with_pagination();
    }
    if ($route[2] === 'products-by-category') {
        $ResultReadProductsByCategory = new \Controllers\AdminController;
        $ResultReadProductsByCategory = $ResultReadProductsByCategory->read_products_by_category();
    }
    if ($route[2] === 'products-by-status') {
        $ResultReadProductsByStatus = new \Controllers\AdminController;
        $ResultReadProductsByStatus = $ResultReadProductsByStatus->read_products_by_status();
    }
    if ($route[2] === 'product') {
        $ResultUpdateProductById = new \Controllers\AdminController;
        $ResultUpdateProductById = $ResultUpdateProductById->update_product_by_id();
    }
    if ($route[2] === 'product-create') {
        $product_create = new \Controllers\AdminController;
        $product_create = $product_create->product_create();
    }
    if ($route[2] === 'product-delete') {
        $product_delete = new \Controllers\AdminController;
        $product_delete = $product_delete->product_delete();
    }
}
if ($route[1] === 'search') {
    $search = new \Controllers\ProductController;
    $search = $search->search();
}
if ($route[1] === 'user') {
    if ($route[2] === 'signup') {
        $signup = new \Controllers\UserController;
        $signup = $signup->signup();
    }
    if ($route[2] === 'signin') {
        $signin = new \Controllers\UserController;
        $signin = $signin->signin();
    }
    if ($route[2] === 'lichnyj-kabinet') {
        $lichnyj_kabinet = new \Controllers\UserController;
        $lichnyj_kabinet = $lichnyj_kabinet->lichnyj_kabinet();
    }
    if ($route[2] === 'zakazy') {
        $zakazy = new \Controllers\UserController;
        $zakazy = $zakazy->zakazy();
    }
    if ($route[2] === 'zagruzki') {
        $zagruzki = new \Controllers\UserController;
        $zagruzki = $zagruzki->zagruzki();
    }
    if ($route[2] === 'adresa') {
        $adresa = new \Controllers\UserController;
        $adresa = $adresa->adresa();
    }
    if ($route[2] === 'sposoby-oplaty') {
        $sposoby_oplaty = new \Controllers\UserController;
        $sposoby_oplaty = $sposoby_oplaty->sposoby_oplaty();
    }
    if ($route[2] === 'uchyotnaya-zapis') {
        $uchyotnaya_zapis = new \Controllers\UserController;
        $uchyotnaya_zapis = $uchyotnaya_zapis->uchyotnaya_zapis();
    }
}
