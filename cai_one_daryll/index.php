<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>CAI One - Daryll</title>
    </head>
    <body>
        <h1>CAI One - Daryll</h1>
        <?php
        include 'dbc.php';

        function seed_questions($count) {
            $connection = mysqli_connect('localhost', 'root', '', 'cai_one_daryll');
            for ($i = 0; $i < $count; $i++) {
                $question = 'question' . ($i + 1);
                $answer = 'answer' . ($i + 1);
                $value = 5;
                $statement = mysqli_prepare($connection, "INSERT INTO questions
                    (question, answer, question_value) VALUES (?, ?, ?);");
                $statement->bind_param('ssi', $question
                        , $answer, $value);
                $statement->execute();
            }
        }
        ?>

        <?php
        if (isset($_GET['db'])) {

            if ($_GET['action'] == 'add') {
                $statement = mysqli_prepare($connection, "INSERT INTO questions
                    (question, answer, question_value) VALUES (?, ?, ?);");
                $statement->bind_param('ssi', $_GET['question']
                        , $_GET['answer'], $_GET['question_value']);
                $statement->execute();
            } else if ($_GET['action'] == 'edit') {
                $statement = mysqli_prepare($connection, "UPDATE questions SET 
                    question = ?, answer = ?, question_value = ? 
                    WHERE question_id = ?;");
                $statement->bind_param('ssii', $_GET['question']
                        , $_GET['answer'], $_GET['question_value']
                        , $_GET['question_id']);
                $statement->execute();
            } else if ($_GET['action'] == 'delete') {
                $statement = mysqli_prepare($connection, "DELETE FROM questions
                    WHERE question_id = ?;");
                $statement->bind_param('i', $_GET['question_id']);
                $statement->execute();
            } else if ($_GET['action'] == 'search') {
                $statement = $connection->prepare('SELECT * FROM questions WHERE question LIKE ? OR answer LIKE ?;');
                $question = '%' . $_GET['question'] . '%';
                $answer = '%' . $_GET['answer'] . '%';
                $statement->bind_param('ss', $question, $answer);
                $statement->execute();
                $statement->bind_result($question_id, $question, $answer, $question_value);
                ?>
                <hr/>
                <h1>Search results</h1>
                <table>
                    <tr>
                        <td>Question ID</td>
                        <td>Question</td>
                        <td>Answer</td>
                        <td>Scoring</td>
                    </tr>

                    <?php
                    while (mysqli_stmt_fetch($statement)) {
                        echo '<tr><td>' . $question_id . '</td><td>' . $question . '</td><td>' . $answer . '</td><td>' . $question_value . '</td></tr>';
                    }
                    ?>
                </table>
                <?php
            }
        }
        ?>




        <hr/>
        <form action="index.php" method="get">
            <input type="hidden" name="db" value="set"/>
            <label for="action">Action:</label>
            <select name="action">
                <option value="add">Add</option>
                <option value="edit">Edit</option>
                <option value="delete">Del</option>
                <option value="search">Search</option>
            </select>
            <label for="question">Question:</label>
            <input type="text" name="question">
            <label for="question">Answer:</label>
            <input type="text" name="answer">
            <label for="question_value">Score:</label>
            <select name="question_value">
                <option  value="5">5</option>
                <option name="question_value" value="10">10</option>
                <option name="question_value" value="15">15</option>
            </select>
            <label for="question_id">Question ID:</label>
            <input type="number" name="question_id">
            <input type="submit" value="Submit"/>
        </form>
        <hr>
        <h1>All Questions</h1>
        <table>
            <tr>
                <td>Question ID</td>
                <td>Question</td>
                <td>Answer</td>
                <td>Scoring</td>
            </tr>


            <?php
            $statement = $connection->prepare('SELECT * FROM questions');
            $statement->execute();
            $statement->bind_result($question_id, $question, $answer, $question_value);

            while (mysqli_stmt_fetch($statement)) {
                echo '<tr><td>' . $question_id . '</td><td>' . $question . '</td><td>' . $answer . '</td><td>' . $question_value . '</td></tr>';
            }
            ?>

        </table>




    </body>
</html>
