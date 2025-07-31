<?php

require_once "isauth.php";
require_once "bdd-crud.php";
if (isAuth() === false) {
    header("Location: login.php");
}

if (!isset($_POST['isUrgent'])) {
    $isUrgent = 0;
} else {
    $isUrgent = $_POST['isUrgent'];
}

if (isset($_POST['nameTask']) && isset($_POST['descTask'])) {
    add_task($_POST['nameTask'], $_POST['descTask'], $_SESSION['user_id'], $isUrgent);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php"><h1>TaskList</h1></a>
    <form action="" method="post">
        <input type="text" name="nameTask" placeholder="Nom de la tâche">
        <input type="text" name="descTask" placeholder="Description de la tâche">
        <input type="checkbox" name="isUrgent" id="isUrgent" value="1">
        <label for="isUrgent">Cette tâche est-elle urgente ?</label>
        <button type="submit">Ajouter cette tâche</button>
    </form>
</body>
</html>