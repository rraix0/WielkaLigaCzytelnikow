<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change password</title>
</head>
<body>
    <?php
    function RandomString($lenght)
        {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randstring = '';
            for ($i = 0; $i < $lenght; $i++) {
                $randstring = $randstring . $characters[rand(0, strlen($characters))];
            }
            return $randstring;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user_id = $_POST["user_id"];
            $random_string = RandomString(8);

            include "../../../conn.php";

            $hashed_password = password_hash($random_string, PASSWORD_DEFAULT);

            $conn = conn();

            $stmt = $conn->prepare("UPDATE users SET pass = ? WHERE id = ?;");
            $stmt->bind_param("ss", $hashed_password, $user_id);
            if ($stmt->execute() === TRUE) {
                echo  "Nowe hasło użytkownika: <code>". $random_string . "</code>";
            }
                
        }
    ?>
</body>
</html>