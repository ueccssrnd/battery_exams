<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>CAI One - Daryll</title>
    </head>
    <body>
        <h1>CAI One - Daryll</h1>
        <hr/>
        <?php
        include 'dbc.php';

        if (isset($_GET['take_quiz'])) {
            $question_bank = array();
            $result = $connection->query('SELECT * FROM questions');

            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $question_bank[] = $row;
            }
            shuffle($question_bank);

            $questions = array_slice($question_bank, 0, $_GET['number_of_questions']);
            ?>
            <form action="quiz.php">
                <input type="hidden" name="grade_quiz">
                <input type="hidden" name="user_name" value="<?php echo $_GET['user_name']; ?>">
                <?php
                foreach ($questions as $question) {
                    echo '<label for="' . $question['question_id'] . '">' . $question['question'] . '</label>';
                    echo '<input type="text" name="' . $question['question_id'] . '">';
                }
                ?><input type="submit" value="Submit"/></form><?php
        }

        if (isset($_GET['grade_quiz'])) {
            $score = 0;
            $keys = array_keys($_GET);
            foreach ($keys as $question) {
                $result = $connection->query('SELECT * FROM questions WHERE question_id = "' . $question . '" AND answer= "' . $_GET[$question] . '";');
                while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                    $score += $row['question_value'];
                }
            }

            echo '<h1>Total score for ' . $_GET['user_name'] . ' :' . $score . '</h1>';
        }
        ?>

        <form action="quiz.php">
            <input type="hidden" name="take_quiz" value="set"/>
            <label for="user_name">Name:</label>
            <input type="text" name="user_name">
            <label for="number_of_questions">Questions:</label>
            <select name="number_of_questions">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
                <option value="25">25</option>
            </select>
            <input type="submit" value="Submit"/>
        </form>
    </body>
</html>
