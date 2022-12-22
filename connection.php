<?php

    session_start();

    $host = 'localhost';
    $dbname = 'econnect';
    $user = 'root';
    $password = '';

    try {
        $connection = new PDO(
            "mysql:host=$host;dbname=$dbname",
            "$user",
            "$password"
        );

    } catch(PDOException $e) {
        echo "<p>$e->getMessage()</p>";
    }

?>