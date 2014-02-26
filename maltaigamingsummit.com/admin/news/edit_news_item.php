<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../../login/index.php");
} 

if($_GET['id'])
{
require ('../../classes/DB.php');
$db = new DB();
$user = $_SESSION['username'];
$result = $db->query("SELECT users_id FROM users WHERE users_username='$user'");
$row = $db->fetchData($result);
$userID = $row['users_id'];

$id=$_GET['id'];
$title=$_POST['title'];
$date = $_POST['date'];
$time = $_POST['time'];
$info = $_POST['info'];
$img = $_POST['img'];
$video = $_POST['video'];
$newsVid = str_replace('/', '"', $video);
$yr = substr($date, "6");
$month = substr($date, "0","-8");
$day = substr($date, "3", "-5");
$news_date = "$yr" . "-" . $month . "-" . "$day"." ".$time;
$result = $db->query("UPDATE news SET news_title='$title', user_id='$userID', news_time='$news_date', news_content='$info', news_img='$img', news_vid='$newsVid' WHERE news_id='$id'");
if ($db->affected_rows()== 1){
    header("Location: editNews.php?id=$id&update=t");
}else
    header("Location: editNews.php?id=$id&update=f");

}
?>