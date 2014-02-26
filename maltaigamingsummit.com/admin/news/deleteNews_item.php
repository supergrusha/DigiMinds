
<?php
session_start();

if(!isset ($_SESSION['username'])){
     header("Location: ../login/index.php");
}
if (isset($_POST['id'])){
    $id = $_POST['id'];
    require ('../../classes/DB.php');
    
    $db = new DB();
    
    $row = $db->query("DELETE FROM news WHERE news_id=$id");
    if ($db->affected_rows()== 1){
        echo 'True';
    }  else {
        echo 'Didnt manage to delete';
    }
}
?>
