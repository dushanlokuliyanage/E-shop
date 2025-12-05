<?php

require_once __DIR__ . "/../app/controllers/UserController.php";
require_once __DIR__ . "/../app/controllers/HomeController.php";
require_once __DIR__ . "/../app/controllers/ProductController.php";

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$UserController = new UserController();
$HomeController = new HomeController();
$ProductController = new ProductController ();


if ($uri === "/") {
    $HomeController->homeView();
} elseif ($uri === "/register") {
    $UserController->registerForm();
} elseif ($uri === "/registerProcess") {
    $UserController->registerUser();
} elseif ($uri === "/logIn") {
    $UserController->logInForm();
} elseif ($uri === "/logInProcess") {
    $UserController->logUser();
} elseif ($uri === "/logout") {
    $UserController->logoutForm();
} elseif ($uri ===  "/logoutProcess") {
    $UserController->logoutUser();
} elseif ($uri === "/delete") {
    $UserController->deleteForm();
} elseif ($uri === "/deleteProcess") {
    $UserController->deleteUser();
}elseif ($uri === "/profile") {
    $UserController->profile();
}elseif($uri === "/profileUpdate"){
     $UserController->updateUser();
}elseif($uri === "/addProducts"){
     $ProductController->productForm();
}elseif($uri === "/productProcess"){
     $ProductController->product();
}elseif($uri === "/listProduct"){
    $ProductController->productView();
}elseif($uri === "/singleProduct"){
    $ProductController->singleProductView();
}