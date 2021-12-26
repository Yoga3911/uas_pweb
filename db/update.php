<?php 
require_once "db.php";

$query = "UPDATE warga SET nama='" . $_POST['nama'] . "', umur='" . $_POST['umur'] . "' WHERE id='" . $_POST['id'] . "'";
$conn->query($query);

header('location: index.php');
?>