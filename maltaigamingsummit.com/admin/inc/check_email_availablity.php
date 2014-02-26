<?php

require_once('../../classes/DB.php');
$db = new DB();

if($_REQUEST)
{
	$email = $_REQUEST['email'];
	$result = $db->query("SELECT * FROM users WHERE users_email = '$email'");
        
        if ($db->numRows($result) == 1) {
            echo '<div class="error">Already Taken</div>';
        }  else {
            echo '<div class="success">Available</div>';
        }
	
	
}?>