    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            session_start();
            $name = $_POST["name"];
            $date = $_POST["datetime"];
        
            $pool = $_POST["pool"];

            $name = htmlspecialchars(trim($name));
            $mysql_datetime = str_replace("T", " ", $date) . ":00";
            echo "". $name ."     ". $mysql_datetime ."   ". $pool ."";
                
            $code = random_int(10000000, 99999999);

            
            if (strlen($name) >= 30) {
                echo "Nazwa ma ponad 30 znaków!";
            } else {   
                    include "../../../conn.php";

                    $conn = conn();
                    $stmt = $conn->prepare("INSERT INTO codes (id, name, expire_date, pool_id, code, teacher_id) values (DEFAULT, ?, ?, ?, ?, ?);");
                    $stmt->bind_param("sssss", $name, $mysql_datetime, $pool, $code, $_SESSION["LOGGED"]["id"]);


                    if ($stmt->execute() === TRUE) {
                        echo "Kod " . $username ." został pomyślnie dodany";
                        echo "<hr />";
                    } else {
                        echo "Nie udało się zedytować użytkownika, błąd servera.";
                    }
            }    

        }
    ?>