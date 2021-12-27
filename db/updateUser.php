<?php

require_once "db.php";

$username = $_POST['username'];
$avatar = $_POST['avatar'];

$query = "UPDATE user SET username='$username', avatar='$avatar'";
$conn->query($query);

header('location: ../main.php');
exit;