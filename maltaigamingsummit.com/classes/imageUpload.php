<?php

/**
 * Description of imageUpload
 *
 * @author eric
 */
class imageUpload {

    //put your code here
    private $path = "http://www.ericmlt.com/igamingforum/images/";
    private $folder;
    private $relativePath;
//    private $imageName;


    public function setPath($path){
        $this->path = $path;
    }
    public function getPath(){
        return $this->path;
    }
    public function setFolder($folder){
        $this->folder = $folder;
        $this->path = $this->path.$folder;
    }
    public function getFolder(){
        return $this->folder;
    }
    public function setrelativePath($relativePath){
        $this->relativePath = $relativePath."images/";
    }
    public function getrelativePath(){
        return $this->relativePath;
    }

    

    public function deleteImage($path) {
        $this->path = $path;
        $file = unlink($path);
        if ($file == TRUE) {
            return $result = TRUE;
        } else
            return $result = FALSE;
    }

    public function uploadImage() {

        $valid_formats = array("jpg", "png", "gif", "bmp");
        if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
            $name = $_FILES['photoimg']['name'];
            $size = $_FILES['photoimg']['size'];

            if (strlen($name)) {
                list($txt, $ext) = explode(".", $name);
                if (in_array($ext, $valid_formats)) {
                    if ($size < (1024 * 1024)) {
                        $actual_image_name = time() . substr(str_replace(" ", "_", $txt), 5) . "." . $ext;
                        $tmp = $_FILES['photoimg']['tmp_name'];
                        $path = $this->relativePath.$this->folder;
                        if (move_uploaded_file($tmp,  $path . $actual_image_name)) {
                            return $imgUp = array($this->path.$actual_image_name, $actual_image_name); 
                        }
                        else
                            echo "failed";
                    }
                    else
                        echo "Image file size max 1 MB";
                }
                else
                    echo "Invalid file format..";
            }

            else
                echo "Please select image..!";

            exit;
        }
    }
}
?>
