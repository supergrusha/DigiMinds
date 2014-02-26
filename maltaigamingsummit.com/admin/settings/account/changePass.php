<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login/index.php");
}
require ('../../../classes/DB.php');
$db = new DB();
$user = $_SESSION['username'];
?>
<html>
    <head>
        <meta name="author" content="Eric Castillo" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Admin - User Account</title>
        <meta name="viewport" content="width=1040"/> 
        <link rel="stylesheet" href="../../css/style.css" type="text/css"/>
        <link rel="stylesheet" href="../../css/demo_table.css" type="text/css"/>
        <link rel="stylesheet" href="../../css/val.css" type="text/css"/>
        <link rel='shortcut icon' type='image/x-icon' href='../../images/favicon.ico' />
        <script src="../../js/jquery.js" type="text/javascript"></script>
        <script type="text/javascript" src="../../js/functions.js"></script>
        <script type="text/javascript" src="../../js/jquery.formvalidator.min.js"></script>

        <script type="text/javascript">
                
              $(document).ready(function() {   
                var validationSettings = {
                    errorMessagePosition : 'element',
                    borderColorOnError : ''
                };

                $('#changePass').submit(function() {
                    if ($(this).validate(false, validationSettings)){
      
                        var oldPass = $("#oldPass").val();
                        var newPass = $("#newPass").val();
                        alert(email);
                        
                        var data = '&oldPass='+oldPass+'&newPass='+newPass;
                                        
                        $.ajax(
                        {
                            type: "POST",
                            url: "process_editPass.php",
                            data: data,
                            cache: false,

                            success: function()
                            {                                             
                                var e = $('<div id="message-green"><table border="0" width="100%" cellpadding="0" cellspacing="0"><tbody><tr><td class="green-left">Editing sucessfull.</td>'+'<td class="green-right"><a class="close-green"><img style="height: 30px;" src="../../images/icon_close_green.gif" alt=""></a></td></tr></tbody></table></div>');
                                $('#message').append(e);
                                $('.close-green').click(function(){
                                    $('#message').hide('slow');
                                });
                            }
                        });
                    }return false;
                })
                .validateOnBlur(false, validationSettings)
                .showHelpOnFocus();
            });

        </script>
    </head>
    <body class="settings">
        <div id="main">
            <div id="head">
                <?
                include ('../../inc/head.php');
                ?>
            </div>
            <div id="sidemenu">
                <?php
                include('../../inc/submenu_settings.php');
                ?>


            </div>
            <div id="content">
                <h1>Change Youre Password</h1>
                <div id="compInfo" style="margin-top: 10px;">
                    <?
                    $result = $db->query("SELECT * FROM users WHERE users_username='$user'");
                    $row = $db->fetchData($result);

                    if (isset($_POST['subPass'])) {
                     

                        $oldPass = trim($_POST['oldPass']);
                        $newPass = trim($_POST['newPass']);

                        if ($oldPass == '') {
                            $hasError = true;
                        }
                        if ($newPass == '') {
                            $hasError = true;
                        }
                      

                        if (!isset($hasError)) {
                            $oldPass = md5($oldPass);
                            $newPass = md5($newPass);

                    

             
                            $password = $row['users_pass'];
                            if ($password == $oldPass) {
                                $result = $db->query("UPDATE users SET users_pass='$newPass' WHERE users_username='$user'");
                                if ($db->affected_rows() == 1) {
                                    echo 'Sucess Password Changed';
                                }
                            } else {
                                echo 'Error: email/old password do not match ';
                            }
                        }
                    } else {
                        ?>
                    <div id="message">
                        
                    </div>
                        <form name="changePass" id="changePass" method="post" action="">
                          
                   
                            <div class="clear"></div>
                            <p>
                                <label for="oldPass">Old Password</label>
                                <input type="password" name="oldPass" id="oldPass" value="" data-validation="required"/>                                
                            </p>
                            <div class="clear"></div>
                            <p>
                                <label for="newPass">New Password</label>
                                <input type="password" name="newPass" id="newPass" data-validation="required"/>                            
                            </p>
                            <div class="clear"></div>
                            <input class="button_save" type="submit" name="subPass" value="Submit"/>
                        </form>
                    
                    </div>
                <? } ?>
            </div>
        </div>
    </body>
</html>

