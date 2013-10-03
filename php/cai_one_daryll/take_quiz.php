<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Take Quiz</title>
    </head>
    <body>
        <!--Generate the "questionnaire"-->
        <form action="quiz_results.php">
            <!--Pass the username again to the next form as $_GET['user']-->
            <input type="hidden" name="user" value="<?php echo $_GET['user'] ?>"/>
            <?php
//            Connect to db
            include 'utilities.php';

//            "Dynamic questionnaire": To get a limited amount of questions, 
//            use the LIMIT keyword.
//            To order things by random, use the ORDER BY RAND()clause
//            Generate the array to hold the questions
            $questions = array();
            $result = mysqli_query($dbc, "SELECT * FROM questions ORDER BY 
                RAND() LIMIT $_GET[numbers];");

            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $questions[] = $row;
            }

            foreach ($questions as $question) {
                ?>
                <!--Very important: Generate the label (question) and the input 
                type for each of the questions.
                Each input type HAS to have name = the ID number of the 
                questionnaire so we can pass it to the "results" page for
                computation of the scores.
                -->
                <label for="<?php echo $question['id']; ?>"><?php echo $question['question'] ?></label>
                <input type="text" name="<?php echo $question['id']; ?>"/>
                <?php
            }
            ?>
            <input type="submit"/>
        </form>
    </body>
</html>
