<?
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../../login/index.php");
} else {
    $user = $_SESSION['username'];
    require ('../../../classes/DB.php');
    $db = new DB();
}

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
        <script type="text/javascript" src="../../js/jquery.formvalidator.min.js"></script>
        <script type='text/javascript'>          
            $(document).ready(function() {   
                var validationSettings = {
                    errorMessagePosition : 'element',
                    borderColorOnError : ''
                };

                $('#userAccount').submit(function() {
                    if ($(this).validate(false, validationSettings)){
                        var name = $("#name").val();
                        var email = $("#email").val();
                        
                        var data = 'name='+name+'&email='+email;
                                        
                        $.ajax(
                        {
                            type: "POST",
                            url: "process_editAccount.php",
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
                <h1>Account Settings</h1>
                <?
                    $result = $db->query("SELECT * FROM users WHERE users_username='$user'");
                    $row = $db->fetchData($result);

                ?>
                <div id="compInfo" style="margin-top: 10px;">
                    <div id="message">

                    </div>
                <form name="userAccount" id="userAccount" method="post" action="">
                    <p>
                        <label for="name">Name & Surname</label>
                        <input id="name" name="name" type="text" value="<?=$row['users_name']?>" data-validation="validate_min_length length8"/>                        
                    </p>
                    <div class="clear"></div>
                    <p>
                        <label for="email">Email</label>
                        <input id="email" name="email" type="text" value="<?=$row['users_email']?>" data-validation="validate_email" />
                    </p>
                    <div class="clear"></div>
                    <input type="submit" class="button_save" name="editUser" value="Submit"/>
                </form>
                <a href="changePass.php" id="changepass">Change your password</a>
                
            </div>
        </div>
    </body>
</html>