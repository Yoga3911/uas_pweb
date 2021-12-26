<?php

require_once "db.php";

$query = "DELETE FROM warga WHERE id='".$_GET['id']."'";
$conn->query($query);

header('location: index.php');