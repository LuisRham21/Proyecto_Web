<?php

$hostname = "localhost";
$database = "desarollo_aplicaciones";
        $username = "root";
$password = "";

$mysqli = new mysqli($hostname, $username, $password, $database);

    if($mysqli->connect_errno){
        echo $mysqli->connect_error;
    }
$urlweb = "http://localhost/2022-3/proyecto_web/"
?>