<?php

require_once "db.php";

$id = $_GET['id'];

$query = "SELECT * FROM film WHERE film_id = $id";

echo json_encode($conn->query($query)->fetch_assoc());