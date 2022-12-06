<?php

$hostname = "localhost";
$database = "id19971368_desarollo_aplicaciones";
$username = "id19971368_root";
$password = "";

$mysqli = new mysqli($hostname, $username, $password, $database);

    if($mysqli->connect_errno){
        echo $mysqli->connect_error;
    }
$urlweb = "https://proyecto-web-2022.000webhostapp.com/"
?>