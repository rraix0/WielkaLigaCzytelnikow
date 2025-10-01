<?php
include BASE_PATH . '/../backend/queryQuestions.php';
$questions = queryQuestions();
?>
<style>
    form > input {
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
        display: flex;
        width: 150px;
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
            <input type="text" value="Question" name="title">
            <input type="text" value="Content" name="content">

            <div class="buttons">
                <button type="submit" name="create_question">Add</button>
            </div>
        </form>
    </li>
    <?php
    foreach ($questions as $question) {
        echo '<li>';
        echo '<div class="question">';
        echo '<div class="name">'.$question['id']." - ".$question['title'].'</div>';
        echo '<div class="desc">'.$question['content'].'</div>';
        echo <<<HTML
            <div class="buttons">
                <form method="post">
                    <button type="submit" name="delete_question" value="{$question['id']}">Delete</button>
                </form>
                <form method="get">
                    <input type="hidden" name="quiz_id" value="{$_GET['quiz_id']}">
                    <button type="submit" name="question_id" value="{$question['id']}">Edit</button>
                </form>
            </div>
        HTML;
        echo '</div>';
        echo '</li>';
    }
    ?>
</ul>
<?php 
if(isset($_POST['create_question'])){
    include BASE_PATH .'/../backend/createQuestion.php';
    header('Location: panel.php?quiz_id='.$_GET['quiz_id']);
}
if(isset($_POST['delete_question'])){
    include BASE_PATH .'/../backend/deleteQuestion.php';
    header('Location: panel.php?quiz_id='.$_GET['quiz_id']);
}
?>