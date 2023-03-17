<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "ecommercefinal");
define('SERVER_PATH', $_SERVER['DOCUMENT_ROOT'] . '/eCommerce-final/');
define('SITE_PATH', 'http://localhost:8080/eCommerce-final/');

define('PRODUCT_IMAGE_SERVER_PATH', SERVER_PATH . 'uploads/product/');
define('PRODUCT_IMAGE_SITE_PATH', SITE_PATH . 'uploads/product/');
