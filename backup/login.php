<?php
include "conn.php";
session_start();
$login = $_POST['login'];
$password = $_POST['password'];

    if($_SERVER['REQUEST_METHOD'] !== "POST") {
        header("Location: index.php");
        return;
    }
if (empty($login) || empty($password)) {
    header("Location: index.php");
    exit;
}
    
$conn = conn();

$stmt = $conn->prepare('SELECT * FROM users WHERE username = ?');
$stmt->bind_param('s', $login);
$stmt->execute();

$result = $stmt->get_result();
$fetch_result = $result->fetch_assoc();
//print_r($fetch_result);
if($fetch_result['password'] == $password) {
    $_SESSION['logged'] = true;
    header('Location: panel.php');
} else {
    header('Location: index.php');
}


$stmt->close();
$conn->close();


