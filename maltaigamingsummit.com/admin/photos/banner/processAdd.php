<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    require ('../../../classes/DB.php');
    $db = new DB();
    require_once ('../../../classes/banner.php');
    $banner = new banner();
    $a = $banner->setBannerId($id);
    if (trim($_POST['imgSrc']) == "") {
        $hasError = true;
    }else
        $imgSrc = trim($_POST['imgSrc']);
    $banner->setimageSrc($imgSrc);
    if (trim($_POST['linkTo']) == "") {
        $hasError = true;
    }else
        $linkTo = trim($_POST['linkTo']);
    $a = $banner->setBannerLink($linkTo);
    $title = trim($_POST['title']);
    $banner->setBannerTitle($title);
    $alt = trim($_POST['alt']);
    $banner->setBannerAlt($alt);
    $imgId = trim($_POST['imgId']);
    $banner->setBannerImgId($imgId);


    if (!isset($hasError)) {
        $a = $banner->addBannerItem();
            header("Location: editBanner.php?id=$id");
        
    }
}
?>
