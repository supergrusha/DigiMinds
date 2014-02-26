<?php
 require ('../../../classes/DB.php');
$db = new DB();

if($_POST['id'])
{
$id=$_POST['id'];
$username=$_POST['username'];
$name=$_POST['name'];
$email=$_POST['email'];
$result = $db->query("UPDATE users SET users_username='$username', users_name='$name', users_email='$email' WHERE users_id='$id'");
}
?>