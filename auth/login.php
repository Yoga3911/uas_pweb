<?php
session_start();
require_once "../db/db.php";

$email = $_POST['email'];
$password = $_POST['password'];

if ($email == "" || $password == "") {
    setcookie("kosong", "kosong", time() + 1, '/');
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
        if (password_verify($password, $d['password'])) {
            $_SESSION['user_id'] = $d['id'];
            $_SESSION['login'] = true;
            setcookie("username", "username", time()+1, '/');
            if (isset($_POST['check'])) {
                if ($_POST['check'] == "on") {
                    $_SESSION['check'] = true;
                }
            }
            header('location: ../main.php');
            exit;
        }
    }
};

setcookie("error", "error", time() + 1, '/');
header('location: ../index.php');
exit;