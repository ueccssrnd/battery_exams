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
    <h3>Transaction Page</h3>
    <form action ="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 
        Code:<input type="text" name="code" value="<?php echo $data['code'] ?>"readonly/></br>
        Quantity:<input type="text" name="quantity" value="0"/></br>
        <select name="tc">
        <option value="o">Order</option>
        <option value="s">Sale</option>
        </select>
        <input type="hidden" name="quantity_old" value="<?php echo $data['quantity']; ?>"/>
        <input type="hidden" name="stock" value="<?php echo $data['stock']; ?>"/>
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>
        <input type ="submit" name="submit" value="Commence"/>
    </form>
<?php
if(isset($_POST['submit']))
{
    if($_POST['tc'] == "o")
    {
        $quantity1 = $_POST['quantity'];
        $quantity2 = $_POST['quantity_old'];
        
        $sum = $quantity1 + $quantity2;
        if($sum > $_POST['stock'])
        {
            echo "not possible";
        }
        else
        {
            $update_query = "UPDATE sni.sni SET `quantity`='".$sum."'
            WHERE id = '".$_POST['id']."' ";
            mysql_query($update_query) or die(mysql_error());
            header('Location: index.php');
        }

    }
    else
    {
        $quantity1 = $_POST['quantity'];
        $quantity2 = $_POST['quantity_old'];
        
        $diff = $quantity2 - $quantity1;
        if($diff < 0)
        {
            echo "not possible";
        }
        else
        {
            $update_query = "UPDATE sni.sni SET `quantity`='".$diff."'
            WHERE id = '".$_POST['id']."' ";
            mysql_query($update_query) or die(mysql_error());
            header('Location: index.php');
        }        
    }        
}
?>
</body>