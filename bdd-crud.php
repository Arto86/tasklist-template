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
function create_user(string $email,string $password) : int | false {
    $database = connect_database();
    $request = $database->prepare("INSERT INTO users (email, password) VALUES(?, ?)");
    $request->execute([htmlspecialchars($email), password_hash(htmlspecialchars($password), PASSWORD_BCRYPT)]);
    $user_id = $request->fetch(PDO::FETCH_ASSOC);
    return $user_id;
}
// Read (login)
function get_user(int $id) : array | null {
    $database = connect_database();
    $request = $database->prepare("SELECT * FROM users WHERE id = $id");
    $request->execute();
    $user = $request->fetchAll(PDO::FETCH_ASSOC);
    return $user;
}


// CRUD Task
// Create
function add_task(string $name,string $description,int $user_id,int $urgent) : int | null {
    $database = connect_database();
    $request = $database->prepare("INSERT INTO task (name, description, user_id, urgent) VALUES(?, ?, ?, ?)");
    $request->execute([$name, $description, $user_id, $urgent]);
    $task_id = $request->fetch()['id'];
    return $task_id;
}

//Read
function get_task(int $id) : array | null {
    $database = connect_database();
    $request = $database->prepare("SELECT * FROM task WHERE id = ?");
    $request->execute([$id]);
    $task = $request->fetch(PDO::FETCH_ASSOC);
    return $task;
}

function get_all_task(int $user_id) : array | null {
    $database = connect_database();
    $request = $database->prepare("SELECT * FROM task WHERE user_id = ?");
    $request->execute([$user_id]);
    $tasks = $request->fetchAll(PDO::FETCH_ASSOC);
    return $tasks;
}

// Delete (BONUS)
function delete_task(int $id) : bool{
    $database = connect_database();
    $request = $database->prepare("DELETE FROM task WHERE  (id = ?)");
    $request->execute([$id]);
    $isSuccessful = true;
    return $isSuccessful;
}



// Validate

function validate_task(int $id) : bool {
    $database = connect_database();
    $request = $database->prepare("UPDATE task SET validate = 1 WHERE id = ?");
    $request->execute([$id]);
    $data = $request->fetch(PDO::FETCH_ASSOC);
    if ($data = 1) {
        $isValidate = true;
    } else {
        $isValidate = false;
    }
    return $isValidate;
}