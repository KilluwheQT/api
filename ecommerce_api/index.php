<?php
require __DIR__ . "/inc/bootstrap.php";
require_once PROJECT_ROOT_PATH . "/inc/conn.php";
require PROJECT_ROOT_PATH . "/Controller/Api/UserController.php";
require PROJECT_ROOT_PATH . "/Controller/Api/CategoryController.php";
require PROJECT_ROOT_PATH . "/Controller/Api/ProductController.php";
require PROJECT_ROOT_PATH . "/Controller/Api/DetailsController.php";
require PROJECT_ROOT_PATH . "/Controller/Api/CartController.php";

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );

if( $uri[2] == 'user'){
    $objFeedController = new UserController();
}else if($uri[2] == 'category'){
    $objFeedController = new CategoryController();
}else if($uri[2] == 'details'){
    $objFeedController = new DetailsController();
}else if($uri[2] == 'cart'){
    $objFeedController = new CartController();
}else if($uri[2] == 'product'){
    $objFeedController = new ProductController();
}

$strMethodName = $uri[3] . 'Action';
$objFeedController->{$strMethodName}();




?>