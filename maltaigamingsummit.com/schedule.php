<?
require_once ('classes/DB.php');
require_once ('classes/Version.php');
require_once ('classes/counter.php');

$db = new DB();
$version = new Version();

$url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$url = strtok($url, '?');
$result = $db->query("SELECT page_id FROM pages WHERE page_link='$url'");
$row = $db->fetchData($result);
$pageId = $row["page_id"];
$_SESSION['page_id'] = $pageId;
$count = new counter();

$result = $db->query("SELECT pageDet_title, pageDet_name, pagePics_imgSrc FROM pageDetails JOIN pagesPics  WHERE pageDetails.page_id=$pageId AND pagesPics.page_id=$pageId");
$row = $db->fetchData($result);
$pageTitle = $row['pageDet_title'];
$pageName = $row['pageDet_name'];
$topImg = $row['pagePics_imgSrc'];
?>
<html> 
    <head>  
        <meta http-equiv="Content-Type" content="text/html; charset=ISO8859_3">  
        <meta name="viewport" content="width=1343"/>   
        <meta name="viewport" content="height=1243"/>
        <title><?= $pageTitle; ?></title>
        <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>  
        <link href="<?php $version->autoVer('css/style.css'); ?>" rel="stylesheet" type="text/css" media="screen">
        <link rel="stylesheet" href="css/val.css" type="text/css"/>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery.formvalidator.min.js"></script>
        <script type='text/javascript'>          
            $(document).ready(function() {   
                var validationSettings = {
                    errorMessagePosition : 'element',
                    borderColorOnError : ''
                };

                $('#contactform').submit(function() {
                    
                })
                .validateOnBlur(false, validationSettings)
                .showHelpOnFocus();
            });
        </script>
            <?php include_once('inc/analyticstracking.php') ?>  
        <style>
            #banner{
                width: 100%;
                height: 278px;
                position: absolute;
                background: url('<?=$topImg;?>') center top no-repeat;
            }
        </style>
    </head>	 
    <body id="about">      
               <?php include ('inc/topMenu.php'); ?> 
        <div id="wrapper"> 
            <div id="banner"></div> 
            <div id="header"> 
              <?php include ('inc/menu.php'); ?> 
            </div>      
            <div class="content-wrapper"> 
                <div class="heading-box"> 
                    <h1>Scheduled Program</h1>   
                </div>        
                <div class="copy" style="width:100%">  
                    <form method="post" id="contactform" action="process_contactForm.php"> 
                        <?
                            $result = $db->query("SELECT content_text FROM content WHERE page_id=$pageId ");
                            while ($row = $db->fetchData($result)) {
                                echo $row['content_text'];
                            }
                        ?>                                  
                    </form>            
                    <br class="clear"> 
                    <br class="clear"> 
                </div>            
                        
                <span class="block clear-both"></span>  
            </div>        
            <div id="footer">   
             <?php include ('inc/footer.php'); ?>     
            </div>     
        </div>  
    </body>
</html>