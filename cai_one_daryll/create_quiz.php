<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Create Quiz</title>
    </head>
    <body>
        <!--Self-explanatory, creates a quiz-->
        <h1>Create Quiz</h1>
        <form action="take_quiz.php">
            <label for="user">User</label>
            <input type="text" name="user">
            <label for="numbers">Questions</label>
            <select name="numbers">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
                <option value="25">25</option>
            </select>
            <input type="submit"/>
        </form>
    </body>
</html>
