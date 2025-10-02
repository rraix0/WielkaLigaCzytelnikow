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
    <form action="./routes/teacher/create_code.php" method="post">
        <input type="text" name="name" placeholder="Code name">
        <input type="datetime-local" id="datetime" name="datetime" required>
        <select name="pool">
            <?php
                $conn = conn();
                if ($result = $conn->query("SELECT * FROM pools")) {
                    while ($row = $result->fetch_assoc()) {
            ?>
                 <option value="<?php echo "". $row['id'] . ""; ?>">
                    <?php echo "". $row["name"] .""; ?>
                 </option>

            <?php
                    }
                }
            ?>
        </select>
        <button type="submit">Dodaj</button>
    </form>

</span>
    <ul>
       <?php
                $conn = conn();
                $stmt = $conn->prepare("SELECT * FROM pools where id = ?;");
                $stmt->bind_param("s", $_SESSION["LOGGED"]["id"]);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {
            ?>
                
    
        <li>
            <form action="" method="post">
                <input type="text" name="name" value='<?php echo "". $row['name'] . ""; ?>'>
                <button type="submit" name="user_id" value='<?php echo "".$row['id'].""; ?>'>Zapisz</button>
            </form>
        </li>
        <?php
               }
                
                $result->free();
            }
        ?>
    </ul>
</main>
