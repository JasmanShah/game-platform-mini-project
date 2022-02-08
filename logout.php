<?php
session_start();
$_SESSION['session_id'] = "";
$_SESSION['session_user'] = 'Guest';
$_SESSION['session_role'] = 'Guest';
header('location: store.php');
?>