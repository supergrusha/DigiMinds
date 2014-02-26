<?php
session_start();
if (!isset($_SESSION['superAdmin'])) {
    header("Location: ../../login/index.php");
} else {
    $user = $_SESSION['username'];
    require ('../../../classes/DB.php');
    $db = new DB();

    $result = $db->query("SELECT * FROM users WHERE users_username='$user'");
    $row = $db->fetchData($result);

    if ($row['userType_id'] == 4) {
        $_SESSION['superadmin'] = $user;
    } else {
        header("Location: ../../index.php");
    }
}
$delete = $_GET['delete'];
if ($delete == "FALSE") {
    echo 'Delete Failed';
}
?>
<html>
    <head>
        <meta name="author" content="Eric Castillo" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Admin - Edit Site Users</title>
        <meta name="viewport" content="width=1040"/> 
        <link rel="stylesheet" href="../../css/style.css" type="text/css"/>
        <link rel="stylesheet" href="../../css/demo_table.css" type="text/css"/>
        <link rel='shortcut icon' type='image/x-icon' href='../../images/favicon.ico' />
        <script src="../../js/jquery.js" type="text/javascript"></script>
        <script type="text/javascript"  src="../../js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="../../js/functions.js"></script>
        <script type="text/javascript" >
			
            $(document).ready(function() {
                /* Add a click handler to the rows - this could be used as a callback */           
                $('#usersData').load( 'getUsers.php' );
                $('.load').hide(); 

                function finishAjax(id, response){

                    $('#'+id).html(unescape(response));
                    $('#'+id).fadeIn(1000);
                    
                } 
                $('.dataTables_length').hide;
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
                <h1>User Settings</h1>
                <div id="usersData">
                    
                </div>
                <div class="clear"></div>
                <?php 
                    if(isset($_GET['reset'])){
                        if($_GET['reset'] == "true"){
                            echo 'Succesfully Reset Password';
                        }elseif ($_GET['reset'] == "false") {
                            echo 'There was an error reseting the users password';
                    }
                    }
                ?>
                
                <a id="addItem" class="submit">Add User</a>
                <div class="add">
                    
                   
            
                        <label for="name">Name & Surname</label>
                        <input name="name" id="name" class="required"  type="text"/><div class="clear"></div>
                        <label for="email">E-mail</label>
                        <input type="text" id="email" name="email" value="" onblur="return check_email_availability();"><div class="clear"></div>
                        <div id="Info"></div>
                        <span class="load"><img src="../../images/load.gif" width="20px" alt="" /></span>
                        <label for="username">Username</label>
                        <input id="username" name="username" type="text" value="" onblur="return check_username_availability();" /><div class="clear"></div>
                        <div id="Info"></div>
                        <span class="load"><img src="../../images/load.gif" width="20px" alt="" /></span>
                        <label for="password">Password</label>
                        <input type="password" id="pass" name="password" class="required"><div class="clear"></div>
                        <input type="submit" id="addUser" class="button_save" name="addTodb" value="Add User"/>
                </div>

            </div>
        </div>
    </body>
</html>