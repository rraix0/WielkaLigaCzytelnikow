<?php
    session_start();
    define("BASE_PATH", __DIR__);
    if (isset($_SESSION["LOGGED"]) && !empty($_SESSION["LOGGED"]["username"])) {
?>

<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            margin: 0;
        }
    </style>
    <title>Wielka liga czytelników</title>
</head>
<body>

<?php
    switch ($_SESSION["LOGGED"]["type"]) {
        case "admin":
            include "./routes/admin.php";
            break;
        case "teacher":
            include "./routes/teacher.php";
            break;
        case "participant":
            break;
    }
    
?>








</body>
</html>


<?php

 } else {
    header("Location: ../login.php");
 }

 ?>