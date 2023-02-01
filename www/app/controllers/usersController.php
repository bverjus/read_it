<?php

namespace App\Controllers\UsersController;

use \PDO, \App\Models\UsersModel;

use function App\Models\UsersModel\findOneByLoginAndPassword;
use function App\Models\UsersModel\verify;

function loginFormAction()
{
    global $content;
    ob_start();
    include '../app/views/users/login_form.php';
    $content = ob_get_clean();
}

function verifyAction(String $login, String $password, PDO $connexion)
{
  include '../app/models/usersModel.php';
  $user = findOneByLoginAndPassword($login, $password, $connexion);
   
  if($user){
    $_SESSION['user'] = $user;
    header("Location: ".BASE_HREF_BACKOFFICE);
  }else{
    header("Location: loginError");
  }
}
