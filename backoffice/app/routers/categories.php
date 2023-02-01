<?php

use \App\Controllers\CategoriesController;

require_once '../app/controllers/categoriesController.php';

switch ($_GET['categories']):
    case 'add':
        CategoriesController\addAction($connexion, $_POST['name']);
        break;
    case 'delete':
        CategoriesController\deleteAction($connexion, $_GET['id']);
        break;
    case 'edit':
        CategoriesController\editAction($connexion, $_GET['id']);
        break;
    case 'update':
        CategoriesController\updateAction($connexion, $_GET['id'], $_POST);
        break;
    default:
        CategoriesController\indexAction($connexion);
        break;
endswitch;