<?php

    include_once '../config/db.php';
    session_start();
    if(!$_SESSION['rider_id']){
        session_destroy();
        header("location: login.php");
    }

?>