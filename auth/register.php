<?php

require_once "../db/db.php";

$username = $_POST["username_r"];
$email = $_POST["email_r"];
$password = mysqli_real_escape_string($conn, $_POST["password_r"]);
$password2 = mysqli_real_escape_string($conn, $_POST["password2_r"]);

if ($password != $password2) {
    setcookie("wrong", "wrong", time() + 1, '/');
    header('location: ../index.php');
    exit;
}

$query = "SELECT * FROM user";
$result = $conn->query($query);
$datas = [];
while ($data = $result->fetch_assoc()) {
    $datas[] = $data;
};

foreach ($datas as $d) {
    if ($email == $d['email']) {
        setcookie("gagal", "gagal", time() + 1, '/');
        header('location: ../index.php');
        exit;
    }
};
$password = password_hash($password, PASSWORD_DEFAULT);
$query = "INSERT INTO user VALUES (0, '$username', '$email', '$password', 1)";
$result = $conn->query($query);


if ($result == 1) {
    setcookie("success", "success", time() + 1, '/');
} else {
    setcookie("gagal", "gagal", time() + 1, '/');
}

header('location: ../index.php');
exit;
