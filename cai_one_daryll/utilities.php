<?php

//DB Connection
$dbc = mysqli_connect('localhost', 'root', '', 'cai_one_daryll');

//Generate sample questions ans answers in this format:
//Question: question1, Answer: answer1, Difficulty: easy
function generate_random($count) {
    $dbc = mysqli_connect('localhost', 'root', '', 'cai_one_daryll');
    for ($i = 0; $i < $count; $i++) {
        mysqli_query($dbc, "INSERT INTO QUESTIONS (question, answer, question_value)
                    VALUES ('question" . $i . "', 'answer" . $i . "', " . 5 . ");");
    }
}