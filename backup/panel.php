<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PANEL</title>
</head>
<body>
<?php
session_start();

if (empty($_SESSION["logged"]) || $_SESSION["logged"] === false) {
    header('Location: index.php');
} else {
    echo "ZALOGOWANO";
}

?>
<form action="logout.php" method="post">
    <button type="submit">LOGOUT</button>
</form>
    
</body>
</html>