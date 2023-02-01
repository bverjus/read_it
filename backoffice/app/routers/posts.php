<?php

use \App\Controllers\PostsController;

require_once '../app/controllers/postsController.php';

switch ($_GET['posts']):
    case 'addForm':
        PostsController\addFormAction($connexion);
        break;
    case 'add':
        PostsController\addAction($connexion, $_POST, $_FILES);
        break;
    case 'edit':
            PostsController\editAction($connexion, $_GET['id']);
        break;
    case 'update':
        PostsController\updateAction($connexion, $_FILES, $_POST, $_GET['id']);
        break;
    default:
        PostsController\indexAction($connexion);
        break;
endswitch;