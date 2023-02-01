<?php

namespace App\Models\AuthorsModel;

use \PDO;

function findOneById(PDO $connexion, int $id)
{
    $sql = "SELECT *
        FROM authors
        WHERE id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(":id", $id, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(PDO::FETCH_ASSOC);
}

function findAll(PDO $connexion)
{
    $sql = "SELECT *
            FROM authors;
            ORDER BY lastname ASC, firstname ASC";
    
    $rs = $connexion->query($sql);
    return $rs->fetchAll(PDO::FETCH_ASSOC);
    
}
