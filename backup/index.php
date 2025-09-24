<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            margin: 0;
            width: 100dvw;
            height: 100dvh;
            background-color: hsl(0, 0%, 27%);
            display: flex;
            justify-content: center;
        }
        main {
            align-self: center;
            padding: 20px;
            border-radius: 5px;
            background-color: #555555;
            width: min-content;
            height: min-content;
        }
        input {
            border: 1px solid white;
            background-color: #454545;
            color: white;
        }
        input::placeholder {
            color: silver;
        }
        .change_mode{
            border: none;
            background-color: silver;
            color: white;
            margin-top: 10px;
            background-color: transparent;
        }
    </style>
</head>
<body>
    <?php 
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            if ($_SESSION["mode"] === false) {
                $_SESSION["mode"] = true;
            } else {
                $_SESSION["mode"] = false;
            }
        }
        echo $_SESSION["mode"];

        if ($_SESSION["mode"] === true) {        
    ?>
        <main>
            <form method="post" action="register.php">
                <input type="text" name="login" placeholder="Login">
                <br />
                <input type="password" name="password1" placeholder="Password">
                <br />
                <input type="password" name="password2" placeholder="Repeat password">
                <br />
                <button type="submit">Register</button>
            </form>
             <form action="" method="post">
                <button class="change_mode" type="submit">Login</button>
            </form>
        </main>
    <?php
    } else {
    ?>
    <main>
        <form method="post" action="login.php">
            <input type="text" name="login" placeholder="Login">
            <br />
            <input type="password" name="password" placeholder="Password">
            <br />
            <button type="submit">Login</button>
        </form>
        <form action="" method="post">
            <button class="change_mode" type="submit">Sing up</button>
        </form>
    </main>
    <?php
        }
    ?>
</body>
</html>