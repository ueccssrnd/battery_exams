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
        if(isset($_GET['transaction'])){
            if($_GET['transaction']=='order'){
                $result = mysqli_query($dbc, "SELECT quantity FROM products WHERE code = '" . $_GET['code'] . "';");
               
                $row = mysql_fetch_row($result); 
                $base_pay = $row[0]; 
                $value = $row[0] + $_GET['quantity'];
                mysqli_query($dbc, "UPDATE products SET quantity = '" . $value . "' WHERE code = " . $_GET['code']);
            }
        }
        ?>
        <form action="module.php">
            <label for="code">Product Code</label>
            <input type="text" name="code">
            <select name="transaction">
                <option value="order">O</option>
                <option value="sale">S</option>
            </select>
            <label for="quantity">Quantity</label>
            <input type="text" name="quantity">
            <input type="submit"/>
        </form>
        <table>
            <tr><th>Code</th><th>Description</th><th>Stocks</th><th>Date</th><th>Quantity</th></tr>
        <?php
        $result = mysqli_query($dbc,"SELECT * FROM products");
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            echo "<tr><td>" . $row['code'] . "</td><td>" . $row['description'] . "</td><td>" . $row['stocks'] . "</td><td>" . $row['date_created'] . "</td><td>" . $row['quantity'] ."</td></tr>";         
        }
        ?>
        </table>
    </body>
</html>
