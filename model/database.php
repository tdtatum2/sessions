<?php

    $dsn = "mysql:host=jtb9ia3h1pgevwb1.cbetxkdyhwsb.us-east-1.rds.amazonaws.com; dbname=k2u4xlgen8mlgr1j";
    $username = 'e2xcosnabq1zls2z';
    $password = 'qxicn9e6m32tamz5';
    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error = 'Database Error: ' . $e->getMessage();
        echo $error;
        exit();
    }


?>