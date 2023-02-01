<?php

use \App\Controllers\UsersController;

// ROUTES DES CATÉGORIES
// PATTERN: ?categories=x
if (isset($_GET['categories'])) {
    include_once '../app/routers/categories.php';

// ROUTES DES POSTS
// PATTERN: ?categories=x
}elseif (isset($_GET['posts'])) {
    include_once '../app/routers/posts.php';


// ROUTE PAR DEFAUT
// PATTERN: /
// CTRL: usersController
// ACTION: dashboard
}elseif(isset($_GET['disconnect'])){
    unset($_SESSION['user']);
        header("Location: ".BASE_HREF_WWW);
}else{
    require_once '../app/controllers/usersController.php';
    UsersController\dashboardAction();
}



