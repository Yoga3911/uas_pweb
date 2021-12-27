<?php

session_start();
require_once "db.php";

$user_id = $_SESSION['user_id'];
$username = $_POST['username'];
$avatar = $_POST['avatar'];

$query = "UPDATE user SET username='$username', avatar='$avatar' WHERE id='$user_id'";
$conn->query($query);

header('location: ../main.php');
exit;