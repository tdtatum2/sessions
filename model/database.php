<?php

    $dsn = "mysql:host=localhost; dbname=todolist";
    $username = 'root';
    try {
        $db = new PDO($dsn, $username);
    } catch (PDOException $e) {
        $error = 'Database Error: ' . $e->getMessage();
        echo $error;
        exit();
    }


?>