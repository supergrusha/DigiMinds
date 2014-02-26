
<?php

session_start();
$id = $_POST['bannerCat'];
var_dump($id);


require_once ('../../../classes/imageUpload.php');
require_once ('../../../classes/DB.php');
if (isset($_FILES['photoimg'])){
    $imgUp = new imageUpload();
    $folder = "home-banner/";

    //uploading image
    $upload = $imgUp->setFolder($folder);
    $upload = $imgUp->setrelativePath("../../../");
    $uploadImage =  $imgUp->uploadImage();
    //check if image uploaded sucesfully
    if(!isset($uploadImage)){
        echo 'There was an error in the upload';
    }else {
        $db = new DB();
        $path = "../images/".$imgUp->getFolder()."$uploadImage[1]";       
        $result = $db->query("INSERT INTO bannerImages (banner_id, bannerImage_imgSrc, page_id) VALUES ('$id','$path','26')");
        if($db->affected_rows()==1){
            echo 'Banner Added';
            echo '<img src='.$uploadImage[0].'>';
            
            
        }
    }  
    
}  else {
    header("Location: index.php");
}

?>
