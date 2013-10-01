<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>  
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include 'utilities.php';
        
        if(isset($_GET['action'])){
            if($_GET['action']=='add'){
                mysqli_query($dbc, "INSERT INTO QUESTIONS (question, answer, question_value)
                    VALUES ('" . $_GET['question'] . "', '" . $_GET['answer'] . "', " . $_GET['value'] . ");");
                echo '<em>Added ' . $_GET['question'] . '</em>';
            } else if($_GET['action']=='edit'){
                mysqli_query($dbc, 'UPDATE questions SET question = "' .$_GET['question'] . '", answer = "' . $_GET['answer'] . '", question_value = "' . $_GET['value'] . 'WHERE id = ' . $_GET['id'] . ';' );
            } else if($_GET['action']=='delete'){
                mysqli_query($dbc,'DELETE FROM questions where id = ' . $_GET['id'] . ';');
            }
         
        }
        ?>
        
        <h1>Add Questions!</h1>
        <form action='index.php'>
            <select name='action'>
                <option value="add">Add</option>
                <option value="edit">Edit</option>
                <option value="delete">Delete</option>
                <option value="search">Search</option>
            </select>
            <label for="question">Question</label>
            <input type="text" name="question">
            <label for="answer">Answer</label>
            <input type="text" name="answer">
            <label for="value">Question-Value</label>
            <select name="value">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
            </select>
            <input type="text" name="id">
            <input type='submit'/>
            
        </form>
        <hr>
        
        <?php
        $result = mysqli_query($dbc, 'SELECT * from questions;');
        ?>
        <h1>All Questions</h1>
        <table>
            <tr><td>ID</td><td>Question</td><td>Answer</td><td>Value</td></tr>
        <?php
        while($row = $result->fetch_array(MYSQLI_ASSOC))
                echo '<tr><td>'. $row['id'] . '</td><td>' . $row['question'] . '</td><td>' . $row['answer'] . '</td><td>' . $row['question_value'] . '</td></tr>'
        ?>
        </table>
    </body>
</html>
