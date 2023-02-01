<?php

namespace App\Controllers\CategoriesController;

use \PDO, App\Models\CategoriesModel;

function indexAction(PDO $connexion)
{
    include_once '../app/models/categoriesModel.php';
    $categories = CategoriesModel\findAll($connexion);

    global $content;
    ob_start();
    include '../app/views/categories/index.php';
    $content = ob_get_clean();
}

function addAction(PDO $connexion, $name)
{
    include_once '../app/models/categoriesModel.php';
    CategoriesModel\addOne($connexion, $name);

    indexAction($connexion);

}

function deleteAction(PDO $connexion, $id)
{
    include_once '../app/models/categoriesModel.php';
    CategoriesModel\deleteOne($connexion, $id);

    indexAction($connexion);

}

function editAction(PDO $connexion, int $id)
{
    include_once '../app/models/categoriesModel.php';
    $categorie = CategoriesModel\findOneById($connexion, $id);
    global $content;
    ob_start();
    include '../app/views/categories/edit.php';
    $content = ob_get_clean();
}

function updateAction(PDO $connexion, int $id, array $data)
{
    include_once '../app/models/categoriesModel.php';
    $rep = CategoriesModel\updateOneById($connexion, $id, $data);
    header('location: ' . BASE_HREF_BACKOFFICE . 'categories');
}
