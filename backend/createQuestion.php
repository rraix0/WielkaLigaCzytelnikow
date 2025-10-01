<?php
    if(isset($_POST['create_question']) && $_SESSION['LOGGED']['type'] == 'creator'){
        $conn = conn();
        $stmt = $conn->prepare("INSERT INTO questions (title, content, pool_id) VALUES (?, ?, ?);");
        $stmt->bind_param("sss", $_POST["title"], $_POST["content"], $_GET['quiz_id']);
        $stmt->execute();
        $result = $stmt->get_result();
    }
?>