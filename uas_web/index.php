<?php

session_start();
require_once('Config/Database.php');
require_once('Controllers/UserController.php');
require_once('Controllers/ProductController.php');
require_once('Models/User.php');
require_once('Models/Product.php');

$userController = new UserController();
$productController = new ProductController();

$action = isset($_GET['action']) ? $_GET['action'] : '';

if (!isset($_SESSION['username'])) {
    if ($action === 'register') {
        $userController->register();
    } else {
        $userController->login();
    }
} else {
    switch ($action) {
        case 'logout':
            $userController->logout();
            break;
        case 'create':
            $productController->create();
            break;
        case 'edit':
            $productController->edit($_GET['id']);
            break;
        case 'delete':
            $productController->delete($_GET['id']);
            break;
        case 'show':
            $productController->show($_GET['id']);
            break;
        default:
            $productController->index();
            break;
    }
}