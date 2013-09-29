<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Sales One - Daryll</title>
    </head>
    <body>
        <h1>Sales One - Daryll</h1>
        <hr/>
        <?php
        include 'utilities.php';




        if (isset($_GET['db'])) {
            if ($_GET['action'] == 'add') {
                $product_code = strtoupper(substr($_GET['product_description'], 0, 3)
                        . '-' . str_pad(rand(1, 100000), 5, '0', STR_PAD_LEFT)
                        . '-' . date('dMY', time()));
                
                mysqli_query($dbc, 'INSERT INTO PRODUCTS (product_code, product_description,
                stock_level, date_created, quantity) VALUES ("'
                        . $product_code . '", "'
                        . $_GET['product_description'] . '", "'
                        . $_GET['stock_level'] . '", "' . date('F d, Y') . '", "'
                        . $_GET['stock_level'] * 0.2 . '");');
            }
        }

        echo '<hr/>';
        ?>
        <form action="index.php">
            <input type="hidden" name="db"/>
            <select name="action">
                <option value="add">Add</option>
                <option value="edit">Edit</option>
                <option value="delete">Del</option>
                <option value="search">Search</option>
            </select>
            <label for="product_description">Product Description</label>
            <input type="text" name="product_description"/>
            <label for="stock_level">Stock Level</label>
            <input type="number" name="stock_level"/>
            <input type="submit"/>
        </form>

    </body>
</html>
