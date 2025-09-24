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
    }
    ul > li:hover {
        background-color: #00000022;
    }
    li > form {
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
    <ul>
        <?php
            $conn = conn();
            if ($result = $conn->query("SELECT * FROM users WHERE type = 'participant'")) {
                echo "Participants: " . $result->num_rows . "<br>";
                while ($row = $result->fetch_assoc()) {
        ?>
    
        <li>
            <form>
                <input type="text" value='
                <?php echo "". $row['username'] . ""; ?>
                '>
                <span>
                    <?php echo "". $row['email'] . ""; ?>
                </span>
                <select>
                    <option>Participant</option>
                    <option>Teacher</option>
                </select>
                <button>
                <?php echo "Change ". $row['username'] . "'s password"; ?>    
                </button>
                <button type="submit">Zapisz</button>
            </form>
        </li>
        <?php
            }
                $result->free();
            }
        ?>
    </ul>
</main>
