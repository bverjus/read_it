<?php

namespace App\Controllers\UsersController;

use \PDO, \App\Models\UsersModel;

function dashboardAction()
{
    global $content;
    ob_start();
    include '../app/views/users/dashboard.php';
    $content = ob_get_clean();
}
