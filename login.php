<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie - Wielka Liga Czytelników</title>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');

      :root {
        --primary-color: #4CAF50;
        --secondary-color: #388E3C;
        --text-color: #333;
        --bg-color: #f4f4f4;
        --card-bg: #fff;
        --shadow-color: rgba(0, 0, 0, 0.1);
      }

      body {
        font-family: 'Montserrat', sans-serif;
        line-height: 1.6;
        margin: 0;
        padding: 0;
        background-color: var(--bg-color);
        color: var(--text-color);
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
      }

      .login-container {
        width: 100%;
        max-width: 400px;
        padding: 2rem;
        background-color: var(--card-bg);
        border-radius: 12px;
        box-shadow: 0 4px 12px var(--shadow-color);
        text-align: center;
      }

      .login-container h2 {
        color: var(--primary-color);
        margin-bottom: 1.5rem;
        font-size: 2rem;
        border-bottom: 2px solid var(--primary-color);
        padding-bottom: 0.5rem;
      }

      .login-form {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
      }

      .form-group {
        text-align: left;
      }

      .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 700;
        color: var(--secondary-color);
      }

      .form-group input {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 1rem;
        box-sizing: border-box; /* Ensures padding doesn't affect the width */
      }

      .form-group input:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
      }

      .login-button {
        background-color: var(--primary-color);
        color: #fff;
        padding: 0.75rem;
        border: none;
        border-radius: 50px;
        font-size: 1.2rem;
        font-weight: 700;
        cursor: pointer;
        transition: background-color 0.2s, transform 0.2s;
      }

      .login-button:hover {
        background-color: var(--secondary-color);
        transform: translateY(-2px);
      }

      .forgot-password {
        margin-top: 1rem;
        font-size: 0.9rem;
      }

      .forgot-password a {
        color: var(--primary-color);
        text-decoration: none;
        transition: color 0.2s;
      }

      .forgot-password a:hover {
        color: var(--secondary-color);
      }

      .back-link {
        display: block;
        margin-top: 1.5rem;
        font-size: 0.9rem;
      }

      .back-link a {
        color: var(--text-color);
        text-decoration: none;
        font-weight: 700;
        transition: color 0.2s;
      }

      .back-link a:hover {
        color: var(--secondary-color);
      }
    </style>
</head>

<?php
include "./backend/loginLogic.php";
?>

<body>
<div class="login-container">
    <h2>Zaloguj się</h2>
    <form class="login-form" action="#" method="POST">
        <?php 
        if (!empty($_SESSION["error"])) {
            echo "<p style='color:red'>" . $_SESSION["error"] . "</p>";
            $_SESSION["error"] = "";
        }
        if (!empty($_SESSION["INFO"])) {
            echo "<p style='color:green'>" . $_SESSION["INFO"] . "</p>";
            $_SESSION["INFO"] = "";
        }?>
        <div class="form-group">
            <label for="username">Email</label>
            <input type="email" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Hasło</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" class="login-button">Zaloguj</button>
    </form>
    <div class="forgot-password">
        <a href="#">Nie pamiętasz hasła?</a>
    </div>
    <div class="back-link">
        <a href="index.php">&#8592; Powrót do strony głównej</a>
    </div>
    <div class="back-link">
        <span>Nie masz konta?</span><a href="register.php"> Zarejestruj się.</a>
    </div>
</div>

</body>
</html>