<?php

namespace App\Controllers\PostsController;

use \PDO, \App\Models\PostsModel;

function indexAction(PDO $connexion)
{
    include_once '../app/models/postsModel.php';
    $posts = PostsModel\findAll($connexion);

    global $content;
    ob_start();
    include '../app/views/posts/index.php';
    $content = ob_get_clean();
}

function addFormAction(PDO $connexion)
{
    
    include_once '../app/models/authorsModel.php';
    $authors = \App\Models\AuthorsModel\findAll($connexion);
    
    include_once '../app/models/categoriesModel.php';
    $categories = \App\Models\CategoriesModel\findAll($connexion);
    
    include_once '../app/models/tagsModel.php';
    $tags = \App\Models\TagsModel\findAll($connexion);

    global $content;
    ob_start();
    include '../app/views/posts/addForm.php';
    $content = ob_get_clean();
}



function addAction(PDO $connexion, array $data, array $files)
{
    //1. J'insert le post et je récupère son id
    include_once '../app/models/PostsModel.php';
    $post_id = PostsModel\addOne($connexion, $data, $files['image']);

    //2. J'insert les posts_has_tags en bouclant sur les tags
    foreach($data['tags'] as $tag_id){
        $resp = PostsModel\addTagByPostId($connexion, $post_id, $tag_id);
    }

    header('location: ' . BASE_HREF_BACKOFFICE . 'posts');
}

function editAction(PDO $connexion, int $id)
{
    include_once '../app/models/PostsModel.php';
    $post = PostsModel\findOneById($connexion, $id);

    include_once '../app/models/authorsModel.php';
    $authors = \App\Models\AuthorsModel\findAll($connexion);
    
    include_once '../app/models/categoriesModel.php';
    $categories = \App\Models\CategoriesModel\findAll($connexion);
    
    include_once '../app/models/tagsModel.php';
    $tags = \App\Models\TagsModel\findAll($connexion);

    $postTags = \App\Models\TagsModel\findAllByPostId($connexion, $id);


    global $content;
    ob_start();
    include '../app/views/posts/edit.php';
    $content = ob_get_clean();
}

function updateAction(PDO $connexion, array $files, array $data, int $id)
{
    include_once '../app/models/PostsModel.php';
    $rep = PostsModel\updateOneById($connexion, $files['image'], $data, $id);
    
    PostsModel\deleteTagsByPostId($connexion, $id);

    foreach($data['tags'] as $tag_id){
        $resp = PostsModel\addTagByPostId($connexion, $id, $tag_id);
    }
    header('location: ' . BASE_HREF_BACKOFFICE . 'posts');
}

// function deleteAction(PDO $connexion, int $id)
// {
//     include_once '../app/models/PostsModel.php';
//     $rep = PostsModel\deleteOneById($connexion, $id);
//     header('location: ' . BASE_HREF_BACKOFFICE . 'Posts');
// }


