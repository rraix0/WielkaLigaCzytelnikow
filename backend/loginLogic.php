<?php
session_start();
include "conn.php";

if($_SERVER['REQUEST_METHOD'] === "POST") {
    $login = $_POST['username'];
    $password = $_POST['password'];


    if (empty($login) || empty($password)) {
        $_SESSION["error"] = "Wszystkie pola są wymagane.";
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }

    $login = htmlspecialchars($login);
    $password = htmlspecialchars($password);

    $conn = conn();

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?;");
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    
    $stmt->close();
    $conn->close();

    $hash = password_hash($password, PASSWORD_DEFAULT);

    $_SESSION['INFO'] = $row['id'] . " - " . $row['username'] . " - " . password_verify($password, $row['pass']);

    if ( !empty($row )) {
        if (password_verify($password, $row['pass'])) {
            
            $user_object = array (
                "username" => $row["username"],
                "type" => $row["type"],
                "id" => $row["id"],
            );
            $_SESSION['LOGGED'] = $user_object;
            header("Location: panel/panel.php");
            exit;
        }
    }

    
    header("Location: login.php");
    exit;
}