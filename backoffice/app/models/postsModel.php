<?php

namespace App\Models\PostsModel;

use \PDO;

function findAll(PDO $connexion)
{
    $sql = "SELECT *
            FROM posts 
            ORDER BY created_at DESC 
            LIMIT 10";

    $rs = $connexion->query($sql);
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function findRecents(PDO $connexion)
{
    $sql = "SELECT 	p.image AS postImage, p.id AS postId, 
                    COUNT(c.id) AS nbreComments,
                    p.title, p.created_at, a.lastname, a.firstname
            FROM posts p
            JOIN authors a ON p.author_id = a.id
            LEFT JOIN comments c ON c.post_id = p.id
            GROUP BY p.id
            ORDER BY p.created_at DESC 
            LIMIT 3;";

    $rs = $connexion->query($sql);
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function findOneById(PDO $connexion, int $id)
{
    $sql = "SELECT *
            FROM posts
            WHERE id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(PDO::FETCH_ASSOC);
}

function addOne(PDO $connexion, array $data, array $image)
{
    $sql = "INSERT INTO posts
    VALUES(null, :title, NOW(), :resume, :image, :content, :author_id, :category_id)";   

    $rs = $connexion->prepare($sql);
    $rs->bindValue(':title', $data['title'], PDO::PARAM_STR);
    $rs->bindValue(':resume', $data['resume'], PDO::PARAM_STR);
    $rs->bindValue(':image', $image['name'], PDO::PARAM_STR);
    $rs->bindValue(':content', $data['content'], PDO::PARAM_STR);
    $rs->bindValue(':author_id', $data['author_id'], PDO::PARAM_INT);
    $rs->bindValue(':category_id', $data['category_id'], PDO::PARAM_INT);

    $rs->execute();
    return $connexion->lastInsertId();

}

function addTagByPostId(PDO $connexion, int $post_id, int $tag_id)
{
    $sql = "INSERT INTO posts_has_tags
    SET post_id = :post_id
        tag_id = :tag_id;"; 
        
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':post_id', $post_id, PDO::PARAM_INT);
    $rs->bindValue(':tag_id', $tag_id, PDO::PARAM_INT);

    return $rs->execute();

}


function updateOneById(PDO $connexion, array $image, array $data, int $id)
{
    $sql = "UPDATE posts
            SET id = :id
                title = :title
                resume = :resume 
                image = :image
                content = :content
                author_id = :author_id
                category_id = :category_id
            WHERE id = :id;";

    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->bindValue(':title', $data['title'], PDO::PARAM_STR);
    $rs->bindValue(':resume', $data['resume'], PDO::PARAM_STR);
    $rs->bindValue(':image', $image['name'], PDO::PARAM_STR);
    $rs->bindValue(':content', $data['content'], PDO::PARAM_STR);
    $rs->bindValue(':author_id', $data['author_id'], PDO::PARAM_INT);
    $rs->bindValue(':category_id', $data['category_id'], PDO::PARAM_INT);

    return $rs->execute();
            
}

function deleteTagsByPostId(PDO $connexion, int $id)
{
    $sql = "DELETE FROM posts_has_tags
            WHERE id = :id";

    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();

}