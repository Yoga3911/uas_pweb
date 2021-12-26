<?php

require_once "db.php";

# Tanda titik sebagai penggabung antara 2 string
$query = "INSERT INTO warga VALUES(0,'".$_POST['nama']."','".$_POST['umur']."')";
$conn->query($query);

# Untuk berpidah halaman berdasarkan file php
header('location: index.php');