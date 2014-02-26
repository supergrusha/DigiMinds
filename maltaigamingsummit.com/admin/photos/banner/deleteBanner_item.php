<?php
session_start();

if(!isset ($_SESSION['username'])){
     header("Location: ../../login/index.php");
}
if (isset($_POST['id'])){
    $id = $_POST['id'];
    require ('../../../classes/DB.php');
    
    $db = new DB();
    //getting img url to delet image
    $result = $db->query("SELECT bannerImage_imgSrc FROM bannerImages WHERE bannerImage_id='$id'");
    $imgSrc = $db->fetchData($result);
    $imgSrc = "../../".$imgSrc['bannerImage_imgSrc'];
    if (isset($imgSrc)) {
        $delete = unlink($imgSrc);
        //check if file deleted from server
        if ($delete == TRUE) {
            $result = $db->query("DELETE FROM bannerImages WHERE bannerImage_id='$id'");
            if($db->affected_rows()== 1){
                echo 'Delete Sucessful';
            }
        }  else {
            echo 'File not deleted';    
        }
    }
}
?>

