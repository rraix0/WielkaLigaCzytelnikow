<?php
    session_start();
    include("conn.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["login"]) && isset($_POST["password1"]) && isset($_POST["password2"])) {
            $username = $_POST["login"];
            $password1 = $_POST["password1"];
            $password2 = $_POST["password2"];
            if ($password1 !== $password2) {
                die("Passes doesn't match");
            }

            $conn = conn();

            $check = $conn->prepare("SELECT id FROM users WHERE username = ?");
            $check->bind_param("s", $username);
            $check->execute();
            $check->store_result(); 
            if ($check->num_rows > 0) {
                 $check->close();
                $conn->close();
                die("User exists!");
            }


            $stmt = $conn->prepare("INSERT INTO users (id, username, password) VALUES (DEFAULT, ?, ?)");
            $stmt->bind_param("ss", $username, $password1);
            $stmt->execute();
            
            header("Location: index.php");
       

            $stmt->close();
            $conn->close();

            
        }
    }