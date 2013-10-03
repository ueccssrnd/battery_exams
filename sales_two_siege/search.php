<title>Search Results</title>
<body style="font-family: arial;">
<?php
    include 'connection.php'; 
    
    $term = mysql_real_escape_string($_REQUEST['term']);
    
    $query = "SELECT * FROM sni.sni WHERE `code` OR `desc` LIKE '%".$term."%'";
    $result = mysql_query($query);
    if($result == false)
    {
        echo "<h2>No Results Found</h2>";
    }
    else
    {
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
    }
?>
<a href="index.php">Go Back</a>
</body>