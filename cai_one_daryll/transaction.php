<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $dbc = mysqli_connect('localhost', 'root', '', 'cai_one_daryll');

        if (isset($_GET['answer_quiz'])) {
            $score = 0;

            $keys = array_keys($_GET);

            foreach ($keys as $value) {
                $result = mysqli_query($dbc, 'SELECT * FROM questions WHERE id = "' . $value . '" AND answer="' . $_GET[$value] . '";');
                while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                    $score += $row['question_value'];
                }
            }

            echo '<h1>Score for ' . $_GET['user'] . ': ' . $score . '<h1>';
        }



        if (isset($_GET['create_quiz'])) {
            ?>
            <form action="transaction.php">
                <input type="hidden" name="answer_quiz"/>
                <input type="hidden" name="user" value="<?php echo $_GET['user'] ?>"/>
                <?php
                $question_bank = array();
                $result = mysqli_query($dbc, "SELECT * FROM questions;");

                while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                    $question_bank[] = $row;
                }

                shuffle($question_bank);

                $questions = array_slice($question_bank, 0, $_GET['numbers']);

                for ($i = 0; $i < $_GET['numbers']; $i++) {
                    ?>
                    <label for="<?php echo $questions[$i]['id']; ?>"><?php echo $questions[$i]['question'] ?></label>
                    <input type="text" name="<?php echo $questions[$i]['id']; ?>"/>
                    <?php
                }
                ?>

                <input type="submit"/>
            </form>
            <?php
        }
        ?>
        <h1>Quizzes</h1>
        <form action="transaction.php">
            <input type="hidden" name="create_quiz"/>
            <label for="user">User</label>
            <input type="text" name="user">
            <select name="numbers">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
                <option value="25">25</option>
            </select>
            <input type="submit"/>
        </form>
        <hr/>
        <?php
        $result = mysqli_query($dbc, "SELECT * FROM questions;");
        ?>
        <table>
            <tr><td>ID</td><td>Question</td><td>Answer</td><td>Value</td></tr>

            <?php
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                echo '<tr><td>' . $row['id'] . '</td><td>' . $row['question'] . '</td><td>' . $row['answer'] . '</td><td>' . $row['question_value'] . '</td></tr>';
            }
            ?>
        </table>
    </body>
</html>
