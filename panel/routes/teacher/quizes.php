<?php
include BASE_PATH . '/../backend/queryQuizes.php';
$quizes = queryQuizes();
?>
<style>
    input[name="name"], .name {
        width: 25dvw;
    }
    input[name="description"], .desc{
        width: 100%;
    }
    .question {
        display: flex;
        width: 100%;
        justify-content: space-between;
    }
    span{
        display: block;
        flex-direction: row;
        width: auto;
    }
    .buttons{
        width: 150px;
        display: flex;
    }
    .buttons > * {
        width: 100%;
    }
    button[name="delete"]{
        background-color: red;
    }
</style>
<ul>
    <li>
        <form method="post">
            <input type="text" value="Name" name="name">
            <input type="text" value="Description" name="description">
            <div class="buttons">
                <button type="submit" name="create">Create</button>
            </div>
        </form>
    </li>
    <?php
        foreach ($quizes as $quiz) {
            echo '<li>';
            $quiz_obj = [
                "id" => $quiz[0],
                "name" => $quiz[1],
                "description" => $quiz[2]
            ];
            echo '<div class="question">';
            echo '<div class="name">'.$quiz_obj['id']." - ".$quiz_obj['name'].'</div>';
            echo '<div class="desc">'.$quiz_obj['description'].'</div> <div class="buttons">';
            echo '<form method="post"><button type="submit" name="delete" value="'.$quiz_obj['id'].'">Delete</button></form>';
            echo '<form method="get"><button type="submit" name="quiz_id" value="'.$quiz_obj['id'].'">Edit</button></form></div>';
            echo '</div>';
            echo '</li>';
        }
    ?>
</ul>

<?php
if (isset($_GET['delete'])){
    include BASE_PATH .'/../backend/deleteQuiz.php';
    header('Location: ./panel.php');
}
if(isset($_POST['create'])){
    include BASE_PATH .'/../backend/createQuiz.php';
    header("Location: ./panel.php");
}
?>