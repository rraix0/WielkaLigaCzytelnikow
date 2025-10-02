<?php
include BASE_PATH . '/../backend/queryQuestions.php';
$answers = queryQuestions();
?>
<style>
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
    textarea{
        width: 75dvw;
        resize: none;
        height: 100px;
    }
    #height{
        height: 100px;
    }
    #correct_box{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        padding: 0 5px;
    }
</style>
<ul>
    <li id="height">
        <form method="post">
            <textarea type="text" value="Answer" name="content"> </textarea>
            <div id="correct_box">
                <label for="is_correct">Is correct?</label>
                <input type="checkbox" id="is_correct" name="is_correct">
            </div>
            <div class="buttons">
                <button type="submit" name="create_answer">Add</button>
            </div>
        </form>
    </li>
    <?php
    foreach ($answers[$_GET['question_id']]['answers'] as $answer) {
        echo '<li>';
        echo '<div class="question">';
        echo '<div class="name">'.$answer['id'].' - '.($answer['is_correct'] ? 'Correct' : 'In correct').'</div>';
        echo '<div class="desc">'.$answer['content'].'</div> <div class="buttons">';
        echo '<form method="post"><button type="submit" name="delete_answer" value="'.$answer['id'].'">Delete</button></form>';
        echo '<form method="get"><button type="submit" name="question_id" value="'.$answer['id'].'">Edit</button></form></div>';
        echo '</div>';
        echo '</li>';
    }
    ?>
</ul>
<?php 
if(isset($_POST['create_answer'])){
    include BASE_PATH .'/../backend/createAnswer.php';
    header('Location: panel.php?question_id='.$_GET['question_id'].'&quiz_id='.$_GET['quiz_id']);
}
else if(isset($_POST['delete_answer'])){
    include BASE_PATH .'/../backend/deleteAnswer.php';
    header('Location: panel.php?question_id='.$_GET['question_id'].'&quiz_id='.$_GET['quiz_id']);
}
?>