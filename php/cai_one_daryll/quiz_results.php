<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Quiz Results</title>
    </head>
    <body>
        <?php
//        Connect to db
        include 'utilities.php';

        $user = $_GET['user'];
        $current_score = 0;
        $total_score = 0;

//        Since you had input fields with question ids for their name, then you
//        should see them in the $_GET array.
//        echo var_dump($_GET);
//        And their value is the answer that the user inputted.
//        For example, $_GET['20'] = 'answer20' or $_GET['1'] = 'pogi'
//        So, you check the database query to see if the answer is correct or not.

        $question_ids = array_keys($_GET);

        foreach ($question_ids as $question_id) {
            $result = mysqli_query($dbc, 'SELECT * FROM questions WHERE id = "' . $question_id . '";');
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
//                If correct, add the score
                if ($_GET[$question_id] == $row['answer']) {
                    $current_score += $row['question_value'];
                }
//                Regardless if correct or not, add to total score
                $total_score += $row['question_value'];
            }
        }
        echo "<h1>Score for $user: $current_score / $total_score</h1>";
        ?>
    </body>
</html>
