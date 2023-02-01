<?php

use \App\Controllers\PostsController,
    \App\Controllers\UsersController;

if (isset($_GET['login'])) :
    // ROUTE DE L'AFFICHAGE DU FORMULAIRE DE CONNEXION
    // PATTERN: ?login
    // CTRL: usersController
    // ACTION: loginFormAction
    require_once '../app/controllers/usersController.php';
    UsersController\loginFormAction();
    
elseif (isset($_GET['verify'])) :
    // ROUTE DE VERIFICATION DU FORMULAIRE
    // PATTERN: ?verify
    // CTRL: usersController
    // ACTION: verifyAction
    require_once '../app/controllers/usersController.php'; 
    UsersController\verifyAction($_POST['login'], $_POST['password'], $connexion);

elseif (isset($_GET['postID'])) :
    // ROUTE DU DETAIL D'UN POST
    // PATTERN: ?postID=x
    // CTRL: postsController
    // ACTION: showAction
    require_once '../app/controllers/postsController.php';
    PostsController\showAction($connexion, $_GET['postID']);


else :
    // ROUTE PAR DEFAUT
    // PATTERN: /
    // CTRL: postsController
    // ACTION: index
    require_once '../app/controllers/postsController.php';
    PostsController\indexAction($connexion);
endif;
