<?php
    if(isset($_POST['create_answer']) && $_SESSION['LOGGED']['type'] == 'creator'){
        $conn = conn();
        $stmt = $conn->prepare("INSERT INTO answers (question_id, content, is_correct) VALUES (?, ?, ?);");
        $is_correct = 0;
        if(isset($_POST['is_correct'])){
            $is_correct = 1;
        }
        echo $is_correct;
        $stmt->bind_param("ssi", $_GET["question_id"], $_POST["content"], $is_correct);
        $stmt->execute();
        $result = $stmt->get_result();
    }
?>