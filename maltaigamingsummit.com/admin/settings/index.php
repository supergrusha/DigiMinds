<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:  ../login/index.php");
}
require ('../../classes/DB.php');
$db = new DB();
?>
<html>
    <head>
        <meta name="author" content="Eric Castillo" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Admin - Edit Company Info</title>
        <meta name="viewport" content="width=1040"/> 
        <link rel="stylesheet" href="../css/style.css" type="text/css"/>
        <link rel="stylesheet" href="../css/val.css" type="text/css"/>
        <link rel='shortcut icon' type='image/x-icon' href='../images/favicon.ico' />
        <script src="../js/jquery.js" type="text/javascript"></script>   
        <script type="text/javascript" src="../js/jquery.formvalidator.min.js"></script>
        <script type='text/javascript'>          
            $(document).ready(function() {   
                $('#message').hide();
                var e = $('<div id="message-green"><table border="0" width="100%" cellpadding="0" cellspacing="0"><tbody><tr><td class="green-left">Editing sucessfull.</td>'+'<td class="green-right"><a class="close-green"><img style="height: 30px;" src="../images/icon_close_green.gif" alt=""></a></td></tr></tbody></table></div>');
                $('#message').append(e);
                var validationSettings = {
                    errorMessagePosition : 'element',
                    borderColorOnError : ''
                };

                $('#compInfo').submit(function() {
                    if ($(this).validate(false, validationSettings)){
                        var tel = $("#tel").val();
                        var mob = $("#mob").val();
                        var email = $("#email").val();
                        var openDays = $("#openDays").val();
                        var compName = $("#compName").val();
                        var addStreet = $("#addStreet").val();
                        var addLocation = $("#addLocation").val();
                        var country = $("#country").val();
                        
                        var data = 'tel='+tel+'&mob='+mob+'&email='+email+'&openDays='+openDays+'&compName='+compName+'&addStreet='+addStreet+'&addLocation='+addLocation+'&country='+country;
                                        
                        $.ajax(
                        {
                            type: "POST",
                            url: "process_form.php",
                            data: data,
                            cache: false,

                            success: function()
                            {                                             
                                
                               $('#message').show()
                                  
                            }
                        });
                    }return false;
                })
                .validateOnBlur(false, validationSettings)
                .showHelpOnFocus();
                 function close_message(){
                $('#message').hide('slow');
                }
                 $('.close-green').click(function(){
                                    close_message();
                                });
                 
                  setTimeout (close_message, 5000);
                             
                
            });
        </script>
    </head>
    <body class="settings">
        <div id="main">
            <div id="head">
                <?
                include ('../inc/head.php');
                ?>
            </div>
            <div id="sidemenu">
                <?php
                include('../inc/submenu_settings.php');
                ?>


            </div>
            <div id="content">
                <h1>Company Settings</h1><br/>
                
                    <div id="compInfo">
                        <div id="message">

                        </div>
                        <form name="compInfo" id="compInfo" method="post" action="" >
                            <?php
                            $result = $db->query("SELECT * FROM companyInfo");
                            while ($row = $db->fetchData($result)) {
                                ?>
                         <p>   
                            <label for="tel">Company Tel</label>
                            <input id="tel" name="tel" type="text" value="<?= $row['companyInfo_tel'] ?>" data-validation="validate_int validate_min_length length8"/>
                         </p>
                         <div class=clear></div>
                         <p>
                            <label for="mob">Company Mob</label>
                            <input id="mob" name="mob" type="text" value="<?= $row['companyInfo_mob'] ?>" data-validation="validate_int validate_min_length length8"/>                            
                         </p>
                         <div class=clear></div>
                         <p>
                            <label for="email">Company Email</label>
                            <input id="email" name="email" type="text" value="<?= $row['companyInfo_email'] ?>" data-validation="validate_email"/>                             
                         </p>
                         <div class=clear></div>
                         <p>
                            <label for="openDays">Company Open Days</label>
                            <input id="openDays" name="openDays" type="text" value="<?= $row['companyInfo_openDays'] ?>" data-validation="required"/>                                
                         </p>
                         <div class=clear></div>
                         <p>
                            <label for="compName">Company Name</label>
                            <input id="compName" name="compName" type="text" value="<?= $row['companyInfo_addName'] ?>" data-validation="required"/>                             
                         </p>
                         <div class=clear></div>
                         <p>
                            <label for="addStreet">Address Street</label>
                            <input id="addStreet" name="addStreet" type="text" value="<?= $row['companyInfo_addStreet'] ?>" data-validation="validate_min_length length5"/>     
                         </p>
                         <div class=clear></div>
                         <p>
                            <label for="addLocation">Address Location</label>
                            <input id="addLocation" name="addLocation" type="text" value="<?= $row['companyInfo_addLocation'] ?>" data-validation="required"/>                            
                         </p>
                         <div class=clear></div>
                         <p>
                           <label for="country">Address Country</label>
                           <input id="country" name="country" type="text" value="<?= $row['companyInfo_addCountry'] ?>" data-validation="validate_min_length length3"/> 
                        </p>
                         <div class=clear></div>
                         <input type="submit" class="button_save" name="editInfo" value="Submit"/>
                        <? } ?>                      
                    </form>     
                </div>

            </div>
        </div>

    </body>
</html>
