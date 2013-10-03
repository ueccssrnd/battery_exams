<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Sales and Inventory</title>
    </head>
    <body style="font-family: arial;">
        <h3> Sales and Inventory || NSI </h3>
        <form action ="create.php" method="post"> 
            Product Description:<input type ="text" name="desc" value=""/>
            Stock Value:<input type ="text" name="stock" value=""/>
            <input type="submit" name="submit" value ="Add to Database"/>
        </form>
        <form action ="search.php" method="post"> 
                Search:<input type="text" name="term"/>
                <input type="submit" name="submit" value="Find It!"/>
        </form>
        <?php       
        include 'connection.php';
        $query = "SELECT * FROM sni.sni";        
        $result = mysql_query($query);
        
        while($data = mysql_fetch_array($result))
        {
            echo "- - -";
            echo "<p>Code: <b>" . $data['code'] . "</b></p>";
            echo "<p>Description: <i>" . $data['desc'] . "</i></p>";
            echo "<p>Stock Value: " . $data['stock'] . "</p>";
            echo "<a href=\"edit.php?id=" .  $data['id'] . "\">Edit</a>";
            echo "&nbsp";
            echo "<a href=\"delete.php?id=" .  $data['id'] . "\">Delete</a>";
            echo "<p></p>";
        }
        ?>
        
    </body>
</html>
