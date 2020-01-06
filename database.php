<?php

    //connect credentials
    $db_host = 'localhost';
    $db_name = 'quizzer';
    $db_user = 'root';
    $db_pass = '';

    //create msqli object
    $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

    if($mysqli->connect_error){
        printf("connect failed: %s\n,", $mysqli->connect_error);
        exit();
    }