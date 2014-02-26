<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../../login/index.php");
}
if (isset($_GET[id])) {
    $id = $_GET['id'];
    require ('../../classes/DB.php');
    $db = new DB();
} else {
    header("Location: index.php");
}
?>

<html>
    <head>
        <meta name="author" content="Eric Castillo" />
        <meta http-equiv="Content-Type" content="text/html; charset=ISO8859_3">   
        <title>Admin - Edit News Item</title>
        <meta name="viewport" content="width=1040"/> 
        <link rel="stylesheet" href="../css/style.css?t=1" type="text/css"/>
        <link rel="stylesheet" href="../css/demo_table.css" type="text/css"/>     
        <link rel='shortcut icon' type='image/x-icon' href='../images/favicon.ico' />
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
        <script src="../js/jquery.js" type="text/javascript"></script>
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
         <script src="../js/textEdit/ckeditor.js"></script>
        <script>
            $(function() {
                $( "#date" ).datepicker();
            });
        </script>

        <script type="text/javascript" >

            $(document).ready(function() {
                $(".edit_img").error(function () { 
                    $(this).hide(); 
                });
            
                $('.editbox').show();       
              
              
                // Edit input box click action
                $(".editbox").mouseup(function() 
                {
                    return false;
                });       
            } );       
        </script>
    </head>
    <body class="nws">
        <div id="main">
            <div id="head">
                <?
                include ('../inc/head.php');
                ?>
            </div>
            <div id="content2">
                <form method="post" action="edit_news_item.php?id=<?=$id?>">
                <?
                $result = $db->query("SELECT * FROM news WHERE news_id=$id");
                $row = $db->fetchData($result);
                $news_date = $row['news_time'];
                $yr = substr($news_date, "0", "-15");
                $month = substr($news_date, "5", "-12");
                $day = substr($news_date, "8", "-9");
                $time = substr($news_date, "10");
                $news_date = "$month" . "/" . $day . "/" . "$yr";
                $newsVid = $row['news_vid'];
                $newsVid = str_replace('"', '/', $newsVid);
                ?>
                <div id="title">
                    Edit News
                </div>
                <div id="leftContent">
                        <div id="heading">
                            <input type="text" value="<?= $row['news_title']; ?>" class="editbox" name="title"/>
                        </div>
                        <div class="clear"></div>
                        <div id="textarea">
                             <textarea class="ckeditor editbox" name="info"><?= $row['news_content']; ?></textarea>
                        </div>

                        <input class="button_save" type="submit" value="Save" style="width: 100px; margin-top: 10px; float: left;">
                    
                     <div id="message" style="margin-top: 15px; text-align: right;">
                        <?
                        //Display if article got updated or failed
                        if (isset($_GET['update'])){
                            $update = $_GET['update'];  
                            if($update == "t"){
                                echo '<p style="color: #078c20">Update Sucessfull</p>';
                            }elseif ($update == "f") {
                                echo '<p style="color: #e72929">Update Failed</p>';
                            }
                        }
                        ?>
                    </div>

                </div>
                <div id="rightContent">
                    <div id="details">
                        <div id="details_title">Details</div>
                        <div id="details_inner">
                            <label>Date:</label> 
                            <input id="date" type="text" value="<?= $news_date; ?>" class="editbox" name="date"/> 
                            <div class="clear"></div> 
                            <label>Time:</label> 
                            <?
                            //get todays date and format for the db
                            date_default_timezone_set('Europe/Malta');
                            $date = date('m/d/Y h:i:s a', time());
                            $time = substr($date, "11","-2");
                            ?>
                            <input type="text" value="<?= $time; ?>" class="editbox" name="time"/> 
                            <div class="clear"></div> 
                            <label>Image Source:</label>
                            <input type="text" value="<?= $row['news_img']; ?>" class="editbox" name="img"/>
                            <div class="clear"></div> 
                            <label>Video Source:</label>
                            <input type="text" value="<?= $newsVid;?>" class="editbox" name="video"/>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div id="image">
                        
                        <img id="img_<?= $id; ?>" class="text  edit_img" src="../<?= $row['news_img']; ?>"/>

                    </div>
                    
                   
                </div>
</form>
            </div>

        </div>

    </body>
</html>