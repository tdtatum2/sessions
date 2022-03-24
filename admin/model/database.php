<?php

    $dsn = "mysql:host=w3epjhex7h2ccjxx.cbetxkdyhwsb.us-east-1.rds.amazonaws.com; dbname=ttba11idfgr9j59g";
    $username = 'ssx8rouilpvwxdr5';
    $password = 'w6x5rwplgay82ki7';
    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error = 'Database Error: ' . $e->getMessage();
        echo $error;
        exit();
    }


?>