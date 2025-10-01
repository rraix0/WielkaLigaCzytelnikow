<?php
session_start();
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
    <div class="nav_buttons">
        <button class="nav_item">Quizy</button>
    </div>
    <form action="../logout.php" method="post">
        <button type="submit">Wyloguj</button>
    </form>
</nav>
<main>
    <?php
        if (isset($_GET["quiz_id"])) {
            include __DIR__ . "/teacher/questions.php";
        }
        else if(isset($_GET["question_id"])){
            include __DIR__ . "/teacher/question.php";
        }
        else {
            include __DIR__ . "/teacher/quizes.php";
        }
    ?>
</main>