<?php
    if($_POST['delete_answer'] && $_SESSION['LOGGED']['type'] == 'creator'){
        $conn = conn();
        $stmt = $conn->prepare("DELETE FROM answers WHERE id = ? AND question_id = ?;");
        $stmt->bind_param("ss", $_POST["delete_answer"], $_GET['question_id']);
        $stmt->execute();
        $result = $stmt->get_result();
    }
?>