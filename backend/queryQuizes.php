<?php
include '../conn.php';
function queryQuizes() {
    $quizes = [];
    if($_SESSION['LOGGED']['type'] == 'teacher'){
        $conn = getConn();
        $stmt = $conn->prepare("SELECT * FROM pools;");
        $stmt->execute();
        $result = $stmt->get_result();
        $quizes = $result->fetch_all();
    }
    return $quizes;
}