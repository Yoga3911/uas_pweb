<?php

require_once "db.php";

$id = $_GET['id'];

$query = "DELETE FROM film WHERE film_id= '$id'";
$conn->query($query);

header('location: ../main.php');