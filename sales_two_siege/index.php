<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php       
        include 'connection.php';
        $query = "SELECT * FROM sni.sni";        
        $result = mysql_query($query);
        
        while($data = mysql_fetch_array($result))
        {
            echo "<p>" . $data['code'] . "</p>";
            echo "<p>" . $data['desc'] . "</p>";
            echo "<p>" . $data['stock'] . "</p>";
            echo "<a href=\"edit.php?id=" .  $data['id'] . "\">EDIT</a>";
            echo "&nbsp";
            echo "<a href=\"delete.php?id=" .  $data['id'] . "\">DELETE</a>";
        }
        ?>
        <h1> Add Data </h1>
        <form action ="create.php" method="post"> 
            DESC<input type ="text" name="desc" value=""/><br/>
            STOCK<input type ="text" name="stock" value=""/><br/>
            <input type="submit" name="submit"/>
        </form>
    </body>
</html>
