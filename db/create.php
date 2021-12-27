<?php

require_once "db.php";

$huruf = "A B C D E F G H I J K L M N O P Q R S T U V W X Y Z a b c d e f g h i j k l m n o p q r s t u v w x y z";
$huruf2 = explode(' ', $huruf);

for ($i = 0; $i < count($huruf2); $i++) {
    if (str_contains($_POST['length'], $huruf2[$i]) || str_contains($_POST['rental_rate'], $huruf2[$i]) || str_contains($_POST['replacement_cost'], $huruf2[$i])) {
        setcookie("failed", "failed", time() + 1, "/");
        header('location: ../main.php');
        exit;
    }
}

$title = htmlspecialchars($_POST["title"]);
$description = htmlspecialchars($_POST["description"]);
$length = htmlspecialchars($_POST["length"]);
$release_year = htmlspecialchars($_POST["release_year"]);
$language_id = htmlspecialchars($_POST["language_id"]);
$rental_duration = htmlspecialchars($_POST["rental_duration"]);
$rental_rate = htmlspecialchars($_POST["rental_rate"]);
$replacement_cost = htmlspecialchars($_POST["replacement_cost"]);
$rating = htmlspecialchars($_POST["rating"]);

$query = "INSERT INTO film (title, description, language_id, length,  rental_duration, rental_rate, replacement_cost, rating, release_year, last_update) 
VALUES('$title', '$description', '$language_id', '$length', '$rental_duration', '$rental_rate', '$replacement_cost', '$rating', '$release_year', NOW())";
$conn->query($query);
setcookie("berhasil", "berhasil", time() + 1, "/");

header('location: ../main.php');
exit;
