<title>Edit Data</title>
<body style="font-family: arial;">
<?php
    include 'connection.php';
    if(!isset($_POST['submit']))
    {
        $query = "SELECT * FROM sni.sni WHERE ID = '$_GET[id]'";
        $result = mysql_query($query);
        $data = mysql_fetch_array($result);       
    }
?>
<h3> Edit Data </h3>
<form action ="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 
    Product Description:<input type ="text" name="desc" value="<?php echo $data['desc']; ?>"/><br/>
    Stock Value:<input type ="text" name="stock" value="<?php echo $data['stock']; ?>"/><br/>
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>
    <input type="submit" name="submit" value ="Edit"/>
</form>
<?php
    if(isset($_POST['submit']))
    {
        $update_query = "UPDATE sni.sni SET `desc`='".$_POST['desc']."', `stock`='".$_POST['stock']."'
            WHERE id = '".$_POST['id']."' ";
        mysql_query($update_query) or die(mysql_error());
        echo "successfully edited";
        header('Location: index.php');
    }
?>
</body>
