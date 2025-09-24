<?php
session_start();
include "./../conn.php";
?>

<style>
    * {
        margin: 0;
    }
    nav {
        display: flex;
        border-bottom: 1px solid black;
        padding: 10px;
        justify-content: space-between;
        align-items: center;
    }
    .nav_buttons {
        display: flex;
        justify-content: space-between;
    }
    .nav_item {
        padding: 5px;
        margin: 3px;
    }

    ul {
        margin: 0;
        width: 90%;
        list-style-type: circle;
    }
    ul > li {
        border-bottom: 1px solid black;
        padding: 8px;
        display: flex;
    }
    ul > li:hover {
        background-color: #00000022;
    }
    li > form {
        margin-right: 10px;
        width: 100%;
        display: flex;
        justify-content: space-between;
    }

</style>

<nav>
    <?php
        echo  "Witaj ". $_SESSION["LOGGED"]["username"] ."!";
    ?>
    <br>
    <div class="nav_buttons">
        <button class="nav_item">Urzytkownicy</button>
    </div>
    <form action="../logout.php" method="post">
        <button type="submit">Wyloguj</button>
    </form>
</nav>
<main>
<span style="padding:10px;">
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user_id = $_POST["user_id"];
            $username = $_POST["username"];
            $acc_type = $_POST["acc_type"];

            $username = htmlspecialchars(trim($username));

            include "../../../conn.php";

            $conn = conn();

            $stmt = $conn->prepare("UPDATE users SET username = ?, type = ? WHERE id = ?;");
            $stmt->bind_param("sss", $username, $acc_type, $user_id);
            if ($stmt->execute() === TRUE) {
                echo "Użytkownik " . $username ." został pomyślnie zedytowany";
                echo "<hr />";
            } else {
                echo "Nie udało się zedytować użytkownika, błąd servera.";
            }
        }
    ?>
</span>

    <ul>
        <?php
            $conn = conn();
            if ($result = $conn->query("SELECT * FROM users WHERE type = 'participant' OR type = 'teacher'")) {
                echo "Participants: " . $result->num_rows . "<br>";
                while ($row = $result->fetch_assoc()) {
        ?>
    
        <li>
            <form action="" method="post">
                <input type="text" name="username" value='<?php echo "". $row['username'] . ""; ?>'>
                <span>
                    <?php echo "". $row['email'] . ""; ?>
                </span>
                <select name="acc_type">
                    <option value="participant">Participant</option>
                    <option value="teacher" <?php if ($row['type'] == "teacher") echo "selected"; ?> >Teacher</option>
                </select>
                <button type="submit" name="user_id" value='<?php echo "".$row['id'].""; ?>'>Zapisz</button>
            </form>
            <form action="./routes/admin/chengePassword.php" method="post">
                <button type="submit" name="user_id" value="<?php echo "".$row['id'].""; ?>">
                    <?php echo "Change ". $row['username'] . "'s password"; ?> 
                </button>
            </form>
        </li>
        <?php
            }
                $result->free();
            }
        ?>
    </ul>
</main>
