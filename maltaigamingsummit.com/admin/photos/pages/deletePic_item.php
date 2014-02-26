<?php
session_start();

if(!isset ($_SESSION['username'])){
     header("Location: ../../login/index.php");
}
if (isset($_POST['id'])){
    $id = $_POST['id'];
    require ('../../../classes/DB.php');
    
    $db = new DB();
    $result = $db->query("DELETE FROM pagesPics WHERE pagePics_id='$id'");
    //TO delete image from folder once delete is done!!
}
?>

