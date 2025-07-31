<?php
require_once "isauth.php";
require_once "bdd-crud.php";
if (isAuth() === false) {
    header("Location: login.php");
}

$isSuccessful = delete_task($_GET['id']);

if ($isSuccessful === true){
    header("Location: index.php");
} 
var_dump($_GET);
?>