<?php


if(isset($_POST['submit'])) {
	//Check to make sure that the name field is not empty
	if(trim($_POST['name']) == '') {
		$hasError = true;
	} else {
		$name = trim($_POST['name']);
	}
        if(trim($_POST['inquiry']) == '') {
		$hasError = true;
	} else {
		$inquiry = trim($_POST['inquiry']);
	}
	//Check to make sure sure that a valid email address is submitted
	if(trim($_POST['email']) == '')  {
		$hasError = true;
	} else if  (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $hasError = true;
        } else {
		$email = trim($_POST['email']);
	}
	//Check to make sure comments were entered
	if(trim($_POST['message']) == '') {
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$message = stripslashes(trim($_POST['message']));
		} else {
			$message = trim($_POST['message']);
		}
	}
        $phone = $_POST['phone'];
	//If there is no error, send the email
        if(!isset($hasError)) {
                require_once ('classes/DB.php');
                $db = new DB();
                $result = $db->query("SELECT companyInfo_email FROM companyInfo");
                $row = $db->fetchData($result);
		$emailFrom = "{$row['companyInfo_email']}";
                $subject = $inquiry;
		$body = "Name: $name \n\nFrom: $email \n\nPhone: $phone \n\n Message:\n $message";
		$headers = 'From: <'.$email.'>';

                if (mail($emailFrom, $subject, $body, $headers)) {
                    $emailSent = true;
                    header("Location: contact.php?message=sent");
                }  else {
                     header("Location: contact.php?message=notsent");
                }
        }  else {
            header("Location: contact.php?error=t");
        }
}
?>