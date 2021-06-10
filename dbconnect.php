<?php
require_once 'dbpdoconfig.php';

function getDB() {
    $conn = NULL:     
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        echo "Connected to $dbname at $host successfully.";
    } catch (PDOException $pe) {
        die("Could not connect to the database $dbname :" . $pe->getMessage());
    }
    return $conn;
};
    