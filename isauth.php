<?php
session_start();

function isAuth() : bool{
    if(session_status() == PHP_SESSION_ACTIVE){
        return isset($_SESSION['user_id']);
    }else{
        return false;
    }
}

?>