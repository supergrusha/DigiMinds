<?php
session_start();
if (isset($_GET['id'])) {
    $username =  $_SESSION['username'];
    $id = $_GET['id'];
    require ('../../classes/DB.php');
    $db = new DB();
    $text = $_POST['text'];
    $result = $db->query("SELECT users_id FROM users WHERE users_username='$username'");
    $row = $db->fetchData($result);
    $userID = $row['users_id'];
    $result = $db->query("UPDATE content SET content_text='$text', user_id='$userID' WHERE content_id='$id'");
    if ($db->affected_rows() == 1) {
        header("Location: editPage.php?id=$id&update=true");
    }
    
}  else {
    header("Location: ../index.php");
}


?>
