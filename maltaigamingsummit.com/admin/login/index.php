<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="author" content="Eric Castillo" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Admin - Digital Minds</title>
        <link rel='shortcut icon' type='image/x-icon' href='../images/favicon.ico' />
        <link rel="stylesheet" href="../css/login.css" type="text/css"/>

        <script src="../js/jquery.js" type="text/javascript"></script>
        <script src="../js/jquery.validate.min.js" type="text/javascript"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                $("#login_frm").validate();
            });
        </script>

    </head>
    <body>
        <div id="login">
            <div id="logo">

            </div>
            <div id="content">
                <div id="head">
                    <img src="../images/user-icon.png"/><h1>Admin Login</h1>

                </div>
                <div id="main">
                    <form method="post" id="login_frm" name="login_frm" action="process_login.php">
                        <div class="area">
                            <img src="../images/login-image.png">
                                <input onfocus="if(this.value == 'Username'){this.value = '';}" type="text" onblur="if(this.value == ''){this.value='Username';}" id="name" name="user" class="required" value="Username" />
                        </div>
                        <div class="area">
                            <img src="../images/password-image.png">
                                <input onfocus="if(this.value == 'password'){this.value = '';}" type="password" onblur="if(this.value == ''){this.value='password';}" id="name" name="pass" class="required" value="password" />
                        </div>
                        <button name="loginButton" class="login">Login</button>
                    </form>

                </div>
                <?php
if ($_GET['er'] == "t") {
    echo ('<div id="message">Credentials Incorrect</div>');
}
?>
            </div>
            
        </div>
    </body>

</html>
