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
        //database
        include 'utilities.php';
        //button pressed
        if (isset($_GET['choice'])) {
            if ($_GET['choice'] == "add") {
                $code = generateCode();
                $date = date('Y-m-d');
                $quantity = $_GET['stocks'] * .22;
                mysqli_query($dbc, "INSERT INTO products(code, description, stocks, date_created, quantity)
                    values ('" . $code . "', '" . $_GET['description'] . "', '" . $_GET['stocks'] . "', '" . $date . "', '" . $quantity . "');");
            } elseif ($_GET['choice'] == 'edit') {

                mysqli_query($dbc, "UPDATE products SET description = '" . $_GET['description'] . "', stocks = '" . $_GET['stocks'] . "' WHERE code = '" . $_GET['code'] . "';");
            } elseif ($_GET['choice'] == 'delete') {
                mysqli_query($dbc, "DELETE FROM products where code = '" . $_GET['code'] . "';");
            } elseif ($_GET['choice'] == 'search') {
                $description = $_GET['description'];
                $prodCode = $_GET['code'];
                $result = mysqli_query($dbc, "SELECT * from products WHERE description LIKE '%$description%' and code like '%$prodCode%';");
                ?>
                <table>
                    <tr><td>Code</td><td>Description</td><td>Stocks</td><td>Quantity</td></tr>

                    <?php
                    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                        $codes = $row['code'];
                        $description = $row['description'];
                        $stocks = $row['stocks'];
                        $quantity = $row['quantity'];

                        echo "<tr><td>$codes</td><td>$description</td><td>$stocks</td><td>$quantity</td></tr>";
                    }
                    ?>
                </table>
                <?php
            }
        }
        ?>
        <form action="index.php">
            <select name="choice">
                <option value="add">Add</option>
                <option value="edit">Edit</option>
                <option value="delete">Delete</option>
                <option value="search">Search</option>
            </select>
            <label for="description">Description</label>
            <input type="text" name="description">
            <label for="stocks">Stock Level</label>
            <input type="text" name="stocks">
            <label for="date">Date Created</labe>
                <input type="text" name="date">
                <label for="quantity">Quantity</label>
                <input type ="text" name="quantity">
                <label for="code">Product Code</label>
                <input type="text" name="code">
                <input type="submit"/>
        </form>
        <?php
        $result = mysqli_query($dbc, "SELECT * from products;");
        ?>
        <h1>All Questions</h1>
        <table>
            <tr><td>Code</td><td>Description</td><td>Stocks</td><td>Date Created</td><td>Quantity</td></tr>
            <?php
            while ($row = $result->fetch_array(MYSQLI_ASSOC))
                echo '<tr><td>' . $row['code'] . '</td><td>' . $row['description'] . '</td><td>' . $row['stocks'] . '</td><td>' . $row['date_created'] . '</td><td>' . $row['quantity'] . '</td></tr>'
                ?>
        </table>
        <?php

        function generateCode() {
            $desc = $_GET['description'];
            $ctr = 0;
            $gendesc = "";
            for ($i = 0; $i < strlen($desc); $i++) {
                if (ctype_alpha($desc{$i})) {
                    $gendesc = $gendesc . $desc{$i};
                    $ctr++;
                }
                if ($ctr === 3)
                    break;
            }

            $rand = (string) (rand(0, 99999));
            $len = strlen($rand);
            if ($len < 5) {

                for ($i = 0; $i < 5 - $len; $i++) {
                    $rand = "0" . $rand;
                }
            }
            $date = (string) (date('jMY'));
            $code = strtoupper($gendesc . "-" . $rand . "-" . $date);
            return $code;
        }
        ?>
    </body>
</html>
