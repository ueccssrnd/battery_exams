<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $dbc = mysqli_connect('localhost', 'root', '', 'cai_one_daryll');

        function generate_random($count) {
            $dbc = mysqli_connect('localhost', 'root', '', 'cai2');
            for ($i = 0; $i < $count; $i++) {
                mysqli_query($dbc, "INSERT INTO QUESTIONS (question, answer, question_value)
                    VALUES ('question" . $i . "', 'answer" . $i . "', " . 5 . ");");
            }
        }

        if (isset($_GET['intent'])) {
            if ($_GET['intent'] == 'add') {
                mysqli_query($dbc, "INSERT INTO QUESTIONS (question, answer, question_value)
                    VALUES ('" . $_GET['question'] . "', '" . $_GET['answer'] . "', " . $_GET['question_value'] . ");");
            } else if ($_GET['intent'] == 'edit') {
                mysqli_query($dbc, 'UPDATE questions SET question = "' . $_GET['question'] . '", answer = "' . $_GET['answer'] . '",  question_value = ' . $_GET['question_value'] . ' WHERE id = ' . $_GET['id'] . ';');
            } else if ($_GET['intent'] == 'delete') {
                mysqli_query($dbc, 'DELETE FROM questions where id = ' . $_GET['id'] . ';');
            } else if ($_GET['intent'] == 'search') {
                $result = mysqli_query($dbc, "SELECT * FROM questions where question like '%" . $_GET['question'] . "%' or answer like '%" . $_GET['answer'] . "%';");
                ?>
                <table>
                    <tr><td>ID</td><td>Question</td><td>Answer</td><td>Value</td></tr>

                    <?php
                    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                        echo '<tr><td>' . $row['id'] . '</td><td>' . $row['question'] . '</td><td>' . $row['answer'] . '</td><td>' . $row['question_value'] . '</td></tr>';
                    }
                    ?>
                </table>
                <?php
            }
        }
        ?>
        <h1>Quizzes</h1>
        <form action="index.php">
            <select name="intent">
                <option value="add">Add</option>
                <option value="edit">Edit</option>
                <option value="delete">Del</option>
                <option value="search">Sear</option>
            </select>
            <label for="question">Question</label>
            <input type="text" name="question">
            <label for="answer">Answer</label>
            <input type="text" name="answer">
            <select name="question_value">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="14">15</option>
            </select>
            <label for="id">ID</label>
            <input type="text" name="id">
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
