<?php
session_start();

if (!isset ($_SESSION['superadmin'])){
 header("Location: ../../login/index.php");
}
if(isset($_POST['pass'])){
    require ('../../../classes/DB.php');
    $db = new DB();
    
    if(trim($_POST['username']) == ""){
        $hasError = true;
    }else
        $username = trim ($_POST['username']);
    if(trim($_POST['name']) == ""){
        $hasError = TRUE;
    }  else {
        $name = trim($_POST['name']);
    }
    if(trim($_POST['email']) == ""){
        $hasError = true;       
    }else
        $email = trim ($_POST['email']);        
    if (trim($_POST['pass']) == "") {
            $hasError = TRUE;
    }else
        $password = trim ($_POST['pass']);
        $password = md5($password);

   if(!isset ($hasError)){
//       $title = htmlentities($title);
//       $title = $db->sanitize($title);
//
//       $imgSrc = htmlentities($imgSrc);
//       $imgSrc = $db->sanitize($imgSrc);
//
//       $linkTo = htmlentities($linkTo);
//       $linkTo = $db->sanitize($linkTo);
       $result = $db->query("SELECT users_username FROM users");
        
        while ($row = $db->fetchData($result)) {
            if ($username == $row['users_username']) {
            header("Location: addUser.php?user=FAlSE");
        }
    }
       $result = $db->query("INSERT INTO users (users_username, users_pass, users_name, users_email, userType_id) VALUES ('$username','$password', '$name', '$email', '3')");
       if ($db->affected_rows() == 1){
           echo 'Success Adding User';
       }

    }  
    
}


?>
