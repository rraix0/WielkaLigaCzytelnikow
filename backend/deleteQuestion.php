<?php
    if($_POST['delete_question'] && $_SESSION['LOGGED']['type'] == 'creator'){
        $conn = conn();
        $stmt = $conn->prepare("DELETE FROM questions WHERE id = ?;");
        $stmt->bind_param("s", $_POST["delete_question"]);
        $stmt->execute();
        $result = $stmt->get_result();
    }
?>