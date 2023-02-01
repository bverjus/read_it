<?php

if(!isset($_SESSION['user'])){
    header("Location: ".BASE_HREF_WWW.'login');
}