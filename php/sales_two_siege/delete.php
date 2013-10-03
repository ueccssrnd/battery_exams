<?php
    include 'connection.php';
    mysql_query("DELETE FROM sni.sni WHERE ID = $_GET[id]") or die(mysql_error());
    header('location: index.php');
?>
