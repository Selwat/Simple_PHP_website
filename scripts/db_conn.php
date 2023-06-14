<?php
    $host = 'localhost';
    $dbname = 'dziennik';
    $username = 'root';
    $password = '';

    $conn = new mysqli($host, $username, $password, $dbname);

    try {

        $dbh = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {

        echo "Wystąpił błąd podczas nawiązywania połączenia: " . $e->getMessage();
    }