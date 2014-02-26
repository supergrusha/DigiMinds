<?php

session_start();
if (!isset($_SESSION['superAdmin'])) {
    header("Location: ../../login/index.php");
} else {
    $id = $_GET['id'];

    function rand_string($length) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

        $size = strlen($chars);
        for ($i = 0; $i < $length; $i++) {
            $str .= $chars[rand(0, $size - 1)];
        }

        return $str;
    }

    $newPass = rand_string(8);
    require_once ('../../../classes/DB.php');

    $db = new DB();
    $encPass = md5($newPass);
    $result = $db->query("UPDATE users SET users_pass='$encPass' WHERE users_id='$id'");
    if ($db->affected_rows()== 1){
    $result = $db->query("SELECT * FROM users WHERE users_id='$id'");
    $row = $db->fetchData($result);
    $emailTo = "{$row['users_email']}";
    $subject = "SITE -  Youre Password has been reset!!";
    $body = "Dear {$row['users_name']} Youre password has been reset. This is youre new password: $newPass";
    $result = $db->query("SELECT companyInfo_email FROM companyInfo");
    $row = $db->fetchData($result);
    $email = $row['companyInfo_email'];
    $headers = 'From: <' . $email . '>';

    if (mail($emailTo, $subject, $body, $headers)) {
        $emailSent = true;
        header("Location: index.php?reset=true");
    } else {
        header("Location: contact.php?reset=false");
    }
    }
    
}