<?php
session_start();
include "conn.php";

if($_SERVER['REQUEST_METHOD'] === "POST") {
    $login = $_POST['username'];
    $email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    if (empty($login) || empty($password1) || empty($password2) || empty($email)) {
        $_SESSION["error"] = "Wszystkie pola są wymagane.";
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }

    if ($password1 != $password2) {
        $_SESSION["error"] = "Hasła nie są takie same.";
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }

    $login = htmlspecialchars($login);
    $email = htmlspecialchars($email);
    $password1 = htmlspecialchars($password1);

    $conn = conn();

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?;");
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->close();
        $conn->close();
        $_SESSION["error"] = "Użytkownik już istnieje.";
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }

    $hash = password_hash($password1, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (id, username, email, pass, type) VALUES (DEFAULT, ?, ?, ?, 'participant');");
    $stmt->bind_param("sss", $login, $email, $hash);
    $stmt->execute();

    $stmt->close();
    $conn->close();

    $_SESSION["INFO"] = "Pomyślnie zarejestrowano.";
    header("Location: login.php");
    exit;
}