<?php
 require ('../../classes/DB.php');
$db = new DB();

if (isset($_POST['tel'])) {
    if (trim($_POST['tel']) == "") {
        $hasError = TRUE;
    } else {
        $tel = trim($_POST['tel']);
    }
    if (trim($_POST['mob']) == "") {
        $hasError = true;
    } else {
        $mob = trim($_POST['mob']);
    }
    if (trim($_POST['email']) == "") {
        $hasError = true;
    } else {
        $email = trim($_POST['email']);
    }
    if (trim($_POST['openDays']) == "") {
        $hasError = TRUE;
    } else {
        $openDays = trim($_POST['openDays']);
    }
    if (trim($_POST['compName']) == "") {
        $hasError = TRUE;
    } else {
        $compName = trim($_POST['compName']);
    }
    if (trim($_POST['addStreet']) == "") {
        $hasError = TRUE;
    } else {
        $addStreet = trim($_POST['addStreet']);
    }
    if (trim($_POST['addLocation']) == "") {
        $hasError = TRUE;
    } else {
        $addLocation = trim($_POST['addLocation']);
    }
    if (trim($_POST['country']) == "") {
        $hasError = TRUE;
    } else {
        $country = trim($_POST['country']);
    }
    
    if (!isset($hasError)) {
        $db->query("UPDATE companyInfo SET companyInfo_tel='$tel', companyInfo_mob='$mob', companyInfo_email='$email', companyInfo_openDays='$openDays', companyInfo_addName='$compName', companyInfo_addStreet='$addStreet', companyInfo_addLocation='$addLocation', companyInfo_addCountry='$country' WHERE companyInfo_id=2");
        if ($db->affected_rows() == 1) {
            echo 'Updated Completed!';
        }
    }
}
    
?>