<?php
    if($_POST['delete'] && $_SESSION['LOGGED']['type'] == 'teacher'){
        $conn = conn();
        $stmt = $conn->prepare("DELETE FROM pools WHERE id = ?;");
        $stmt->bind_param("s", $_POST["delete"]);
        $stmt->execute();
        $result = $stmt->get_result();
    }
?>