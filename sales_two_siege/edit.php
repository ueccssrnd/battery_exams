<?php
    include 'connection.php';
    if(!isset($_POST['submit']))
    {
        $query = "SELECT * FROM sni.sni WHERE ID = '$_GET[id]'";
        $result = mysql_query($query);
        $data = mysql_fetch_array($result);       
    }
?>
<h1> Edit Data </h1>
<form action ="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 
    DESC<input type ="text" name="desc" value="<?php echo $data['desc']; ?>"/><br/>
    STOCK<input type ="text" name="stock" value="<?php echo $data['stock']; ?>"/><br/>
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>
    <input type="submit" name="submit" value ="edit"/>
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
