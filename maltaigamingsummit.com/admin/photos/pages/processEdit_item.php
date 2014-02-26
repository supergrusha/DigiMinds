<?php
 require ('../../../classes/DB.php');
$db = new DB();

if($_POST['id'])
{
$id=$_POST['id'];
$imgSrc=$_POST['imgSrc'];
$title=$_POST['title'];
$link=$_POST['link'];
$name=$_POST['name'];
$result = $db->query("UPDATE pagesPics SET pagePics_imgSrc='$imgSrc', pagePics_title='$title',
                            pagePics_link='$link', pagePics_name='$name' WHERE pagePics_id='$id'");
}
?>