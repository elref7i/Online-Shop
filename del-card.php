<?php
include('config.php');
$ID = $_GET['id'];
$delete = "DELETE FROM addcartt WHERE id=$ID";
mysqli_query($conn, $delete);
header('location:/OnlineShop/card.php');
;
?>