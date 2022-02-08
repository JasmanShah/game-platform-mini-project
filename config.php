<?php 
session_start();
$_SESSION['web_title'] = 'GameStart';

$servername = "localhost:3308";
$username = "root";
$password = "";
$database = "game_start";

$link = new mysqli($servername, $username, $password, $database);

?>
