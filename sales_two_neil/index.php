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
        if(isset($_GET['choice'])){
            if($_GET['choice']=="add"){
                $desc =  $_GET["description"]; 
                $ctr = 0;
                $gendesc="";
                for($i=0;$i<strlen($desc);$i++){
                    if(ctype_alpha($desc{$i})){
                        $gendesc = $gendesc . $desc{$i};
                        $ctr++;
                    }
                    if($ctr===3)
                        break;
                }
                $rand = (string)(rand(0,99999));
                $len = strlen($rand);
                if($len<5){
                    
                    for($i=0;$i<5-$len;$i++){
                        $rand = "0" . $rand;
                    }
                }
                $date = (string)(date('jMY'));
                $code = strtoupper($gendesc . "-" . $rand . "-" . $date);
                $date = date('F,j,Y');
                echo $code;
              //  mysqli_query($dbc, 'INSERT INTO products(code,description,stocks,date_created,quantity) 
              //      values "' . $code . '", "' . $_GET['description'] . '","' . $_GET['stocks'] . '","' . $date . '","' . $quantity . '";)');
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
            <input type="submit"/>
        </form>
    </body>
</html>
