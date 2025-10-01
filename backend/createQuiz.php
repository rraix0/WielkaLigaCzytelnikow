<?php
    if(isset($_POST['create']) && $_SESSION['LOGGED']['type'] == 'teacher'){
        $conn = conn();
        $stmt = $conn->prepare("INSERT INTO pools (name, description) VALUES (?, ?);");
        $stmt->bind_param("ss", $_POST["name"], $_POST["description"]);
        $stmt->execute();
        $result = $stmt->get_result();
    }
?>