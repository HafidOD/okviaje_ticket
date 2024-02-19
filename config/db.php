<?php

//leer .env
$env = parse_ini_file('.env');

$servername = $env["DB_HOST"];
$username = $env["DB_USER"];
$password = $env["DB_PASSWORD"];
$dbname = $env["DB_NAME"];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
