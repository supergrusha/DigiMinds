<?php
session_start();
require ('../../../classes/DB.php');
$db = new DB();
if (isset($_POST['name'])){
    $user = $_SESSION['username'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $result = $db->query("UPDATE users SET  users_name='$name', users_email='$email' WHERE users_username='$user'");
    if ($db->affected_rows() == 1) {
            echo 'Updated Completed!';
        }
}
    
?>