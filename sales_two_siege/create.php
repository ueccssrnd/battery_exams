<?php
    include 'connection.php';
    
    $desc = $_POST['desc'];
    $code = strtoupper(substr($desc, 0, 3)
                        . '-' . str_pad(rand(1, 100000), 5, '0', STR_PAD_LEFT)
                        . '-' . date('dMY', time()));
    $stock = $_POST['stock'];
    
    
    if(!$_POST['submit'])
    {
        echo "Fill out the forms.";
        header('Location: index.php');
    }
    else
    {   
        mysql_query("INSERT INTO sni.sni (`id`, `code`, `desc`, `stock`)
            VALUES (NULL, '$code', '$desc', '$stock')") or die(mysql_error());
       
        echo "added";
        header('Location: index.php');
    }
?>

