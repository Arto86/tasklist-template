<?php

require_once "isauth.php";
require_once "bdd-crud.php";
if (isAuth() === false) {
    header("Location: login.php");
}

$isValidate = validate_task($_GET['id']);

if ($isValidate == true) {
    header("Location: index.php");
} var_dump($_GET);

?>