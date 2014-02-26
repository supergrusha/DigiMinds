<?php

require_once('../../../classes/DB.php');
$db = new DB();

if($_REQUEST)
{
	$username = $_REQUEST['username'];
	$result = $db->query("SELECT * FROM users WHERE users_username = '$username'");
        
        if ($db->numRows($result) == 1) {
            echo '<div class="error">Already Taken</div>';
        }  else {
            echo '<div class="success">Available</div>';
        }
	
	
}?>