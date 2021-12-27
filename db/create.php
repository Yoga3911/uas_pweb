<?php

require_once "db.php";

$length = htmlspecialchars($_POST["length"]);
$title = htmlspecialchars($_POST["title"]);
$description = htmlspecialchars($_POST["description"]);
$language_id = htmlspecialchars($_POST["language_id"]);
$rating = htmlspecialchars($_POST["rating"]);
$rental_duration = htmlspecialchars($_POST["rental_duration"]);
$replacement_cost = htmlspecialchars($_POST["replacement_cost"]);
$release_year = htmlspecialchars($_POST["release_year"]);
$rental_rate = htmlspecialchars($_POST["rental_rate"]);

$query = "INSERT INTO film (title, description, language_id, length,  rental_duration, rental_rate, replacement_cost, rating, release_year, last_update) 
VALUES('$title', '$description', '$language_id', '$length', '$rental_duration', '$rental_rate', '$replacement_cost', '$rating', '$release_year', NOW())";
$conn->query($query);
setcookie("berhasil", "berhasil", time() + 1, "/");

header('location: ../main.php');
exit;
