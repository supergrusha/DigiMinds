<?php
 require ('../../../classes/DB.php');
  require ('../../../classes/banner.php');
$db = new DB();
$banner = new banner();

if($_POST['id'])
{
$id=$_POST['id'];
$banner->setBannerImgId($id);
$imgSrc=$_POST['imgSrc'];
$banner->setimageSrc($imgSrc);
$title=$_POST['title'];
$banner->setBannerTitle($title);
$link=$_POST['link'];
$banner->setBannerLink($link);
$alt=$_POST['alt'];
$banner->setBannerAlt($alt);
$banner->editBannerItem($id);
}
?>