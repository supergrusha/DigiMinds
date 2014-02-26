<?php

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login/index.php");
}


require ('../../classes/DB.php');
$db = new DB();
$user = $_SESSION['username'];
$result = $db->query("SELECT users_id FROM users WHERE users_username='$user'");
$row = $db->fetchData($result);
$userID= $row['users_id'];

//get todays date and format for the db
date_default_timezone_set('Europe/Malta');
$date = date('m/d/Y h:i:s a', time());
$yr = substr($date, "6", "-12");
$month = substr($date, "0","-20");
$day = substr($date, "3", "-17");
$time = substr($date, "11","-2");
//arrange for the db
$news_date = "$yr". "-" . $month . "-" . "$day"." ".$time;

$result = $db->query("INSERT INTO news (news_title, news_content, news_img, news_time, user_id) 
    VALUES ('New News' , 'Test', '#', '$news_date', '$userID')");
$id = $db->getLastRecord();
if(isset($id)){
    header("Location: editNews.php?id=$id");
}  else {
    header("Location: index.php");
}
?>
