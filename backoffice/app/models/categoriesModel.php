<?php

namespace App\Models\CategoriesModel;

use \PDO;

function findAll(PDO $connexion)
{
    $sql = "SELECT *
            FROM categories 
            ORDER BY name ASC;";

    $rs = $connexion->query($sql);

    return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function addOne(PDO $connexion, $name){
    $sql = "INSERT INTO categories
            VALUES(null, :name)";

    $rs = $connexion->prepare($sql);
    $rs->bindValue(':name', $name, PDO::PARAM_STR);
    $rs->execute();

}

function deleteOne(PDO $connexion, $id){
    $sql = "DELETE FROM categories
            WHERE id = :id";

    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_STR);
    $rs->execute();

}

function findOneById(PDO $connexion, int $id): array
{
    $sql = "SELECT *
            FROM categories 
            WHERE id = :id;";

    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();

    return $rs->fetch(PDO::FETCH_ASSOC);
}

function updateOneById(PDO $connexion, int $id, array $data): bool
{
    $sql = "UPDATE categories 
            SET name = :name
            WHERE id = :id;";

    $rs = $connexion->prepare($sql);
    $rs->bindValue(':name', $data['name'], PDO::PARAM_STR);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    return $rs->execute();
}