<?php
session_start();

if (isset($_POST['loginButton'])) {

            $username = trim($_POST['user']);
            $password = trim($_POST['pass']);
            
            if($username == '') {
		$hasError = true;
            }
            if ($password == ''){
                $hasError = true;
            }
            if(!isset ($hasError)){
                require_once('../../classes/DB.php');

            $db = new DB();

            $username = $db->sanitize($username);
            $password = $db->sanitize($password);



            $cleanPass = md5($password);

            $sql = "SELECT * FROM users WHERE users_username='$username' AND users_pass='$cleanPass'";
            $result = $db->query($sql);
            $numberOfRows = $db->numRows($result);
            if ($numberOfRows == 1) {
                    $_SESSION['username'] = $username;
                    $row = $db->fetchData($result);
                    if ($row['userType_id'] == 4) {
                        $_SESSION['superAdmin'] = $username;
                    }
                    header("Location: http://admin.maltaigamingsummit.com/index.php");

                }else{
                    header("Location: index.php?er=t");
                }
            }  else{
                    header("Location: index.php?er=t");
                }
}

