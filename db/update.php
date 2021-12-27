<?php 
require_once "db.php";

$id = $_POST["film_id"];
$description = htmlspecialchars($_POST["description"]);
$title = htmlspecialchars($_POST["title"]);
$rental_duration = htmlspecialchars($_POST["rental_duration"]);
$release_year = htmlspecialchars($_POST["release_year"]);
$language_id = htmlspecialchars($_POST["language_id"]);
$replacement_cost = htmlspecialchars($_POST["replacement_cost"]);
$length = htmlspecialchars($_POST["length"]);
$rating = htmlspecialchars($_POST["rating"]);
$rental_rate = htmlspecialchars($_POST["rental_rate"]);

$query = "UPDATE film SET 
title='$title', description='$description', length='$length', rental_rate='$rental_rate', replacement_cost='$replacement_cost', 
rating='$rating', rental_duration='$rental_duration', language_id='$language_id', release_year='$release_year' WHERE film_id='$id'";
$conn->query($query);
setcookie("berhasilUp", "berhasilUp", time() + 1, "/");

header('location: ../main.php');
exit;