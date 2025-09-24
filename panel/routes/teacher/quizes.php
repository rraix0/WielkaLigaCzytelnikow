<?php
include BASE_PATH . '/../backend/queryQuizes.php';
$quizes = queryQuizes();
?>
<ul>
    <li>
        <form>
            <input type="text" value="Name">
            <button type="submit">Create</button>
        </form>
    </li>
    <?php
        foreach ($quizes as $quiz) {
            $quiz_obj = [
                "id" => $quiz[0],
                "name" => $quiz[1],
                "description" => $quiz[2]
            ];
            var_dump($quiz_obj);
        }
    ?>
</ul>