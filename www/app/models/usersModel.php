<?php

namespace App\Models\UsersModel;

use \PDO;

function findOneByLoginAndPassword(String $login, String $password, PDO $connexion)
{
    // Tous les tags du post n°$postID par ordre alphabétique
    $sql = "SELECT * 
            FROM users
            WHERE login = :login
            AND password = :password";

    $rs = $connexion->prepare($sql);
    $rs->bindValue(':login', $login, PDO::PARAM_STR);
    $rs->bindValue(':password', $password, PDO::PARAM_STR);
    $rs->execute();

    return $rs->fetch();
}
