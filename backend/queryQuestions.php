<?php
include '../conn.php';
function queryQuestions() {
    $res = [];
    if($_SESSION['LOGGED']['type'] == 'creator' && isset($_GET['quiz_id'])){
        $conn = conn();
        $stmt = $conn->prepare("SELECT * FROM questions WHERE pool_id = ?;");
        $stmt->bind_param("s", $_GET['quiz_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $questions = $result->fetch_all();
        foreach($questions as $question){
            $question_obj = [
                'id' => $question[0],
                'title' => $question[1],
                'content' => $question[2],
            ];
            $stmt = $conn->prepare("SELECT id, content, is_correct FROM answers WHERE question_id = ?;");
            $stmt->bind_param("s", $question_obj["id"]);
            $stmt->execute();
            $result = $stmt->get_result();
            $answers = $result->fetch_all(MYSQLI_ASSOC);
            $question_obj['answers'] = $answers;
            $res[$question[0]] = $question_obj;
        }
    }
    return $res;
}