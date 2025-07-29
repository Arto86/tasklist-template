<?php
/**
 * Ce fichier contient les fonctions de CRUD pour les utilisateurs et les tâches.
 * Il est utilisé pour interagir avec la base de données.
 * Presque toutes les pages de l'application utilisent ce fichier.
 * 
 * A vous de remplir ces fonction pour qu'elles fonctionnent correctement.
 * 
 * Vous pourrez ainsi facilment les utiliser dans les autres fichiers et construire votre site sans plus vous soucis du SQL.
 */


function connect_database() : PDO{
    $database = new PDO("mysql:host=127.0.0.1;dbname=app-database","root","root");
    return $database;
}
// CRUD User
// Create (signin)
function create_user(string $email,string $password) : int | null {
    $database = connect_database();
    // TODO

    return $user_id;
}
// Read (login)
function get_user(int $id) : array | null {
    $database = connect_database();
    // TODO 

    return $user;
}


// CRUD Task
// Create
function add_task(string $name,string $description) : int | null {
    $database = connect_database();

    
    return $task_id;
}

//Read
function get_task(int $id) : array | null {
    $database = connect_database();
    // TODO
    return $task;
}

function get_all_task() : array | null {
    $database = connect_database();
    // TODO
    return $tasks;
}

// Delete (BONUS)
function delete_task(int $id) : bool{
    $database = connect_database();
    // TODO
    return $isSuccessful;
}