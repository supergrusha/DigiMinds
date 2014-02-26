
<?php
session_start();

if(!isset ($_SESSION['username'])){
     header("Location: ../login/index.php");
}
if (isset($_POST['id'])){
    $id = $_POST['id'];
    require ('../../../classes/DB.php');
    
    $db = new DB();
    $result = $db->query("DELETE FROM users WHERE users_id='$id'");
     if ($db->affected_rows() == 1) {
            echo "<div>Sucess</div>";
        }
}
?>
