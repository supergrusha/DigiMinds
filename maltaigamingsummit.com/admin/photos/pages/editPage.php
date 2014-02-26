<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../../login/index.php");
}
if (!isset($_GET['id'])) {
    header("Location: index.php");
}
$id = $_GET['id'];
require ('../../../classes/DB.php');
$db = new DB();
$result = $db->query("SELECT pagePics_imgSrc, page_id FROM pagesPics WHERE pagePics_id='$id'");
?>
<html>
    <head>
        <meta name="author" content="Eric Castillo" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Admin - Edit Page Images</title>
        <meta name="viewport" content="width=1040"/> 
        <link rel="stylesheet" href="../../css/style.css" type="text/css"/>
        <link rel="stylesheet" href="../../css/demo_table.css" type="text/css"/>
        <link rel='shortcut icon' type='image/x-icon' href='../../images/favicon.ico' />
        <script src="../../js/jquery.js" type="text/javascript"></script>
        <script type="text/javascript"  src="../../js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="../../js/jquery.form.js"></script>
        <script type="text/javascript" >
            $(document).ready(function() {
                $('#pagePics').dataTable( );
                
                $('#pagePics td a.delete').click(function(){
                    if (confirm("Are you sure you want to delete this row?"))
                    {
                        var id = $(this).parent().parent().attr('id');
                        var data = 'id=' + id ;
                        var parent = $(this).parent().parent();
                    
                        $.ajax(
                        {
                            type: "POST",
                            url: "deletePic_item.php",
                            data: data,
                            cache: false,
                        
                            success: function()
                            {
                                parent.fadeOut('slow', function() {$(this).remove();});
                            }
                        });			
                    }
                });
                 function closeAdd(){
                    $(".add").hide();
                }
                $("#addItem").click(function(){
                    $(".add").show();
                    $('#addBannerItem').click(function(){
                        if (confirm("Are you sure you want to add this item?"))
                        {
                            var name=$("#name").val();
                            var username=$("#username").val();
                            var email=$("#email").val();
                            var pass=$("#pass").val();
                            var dataString = 'pass='+ pass +'&username='+username+'&name='+name+'&email='+email;
                            $("#username").html('<img src="../../images/load.gif" />'); // Loading image
                            if(username.length>0&& name.length>0 )
                            {

                                $.ajax(
                                {
                                    type: "POST",
                                    url: "addUser.php",
                                    data: dataString,
                                    cache: false,

                                    success: function()
                                    {
                                        $(".add").hide();
                                        $('#editBanner').load( 'getBannerItems.php' );
                                    
                                    }
                                });	
                            }
                        }
                        else
                        {
                            alert('Something went wrong');
                        }
                        $('.add').mouseleave(function(){
                            $(this).hide();
                        });
                    });     
                });                		
                $('#photoimg').live('change', function()			{ 
                    $("#preview").html('');
                    $("#preview").html('<img src="../../images/load.gif" alt="Uploading...."/>');
                    $("#imageform").ajaxForm({
                        target: '#preview'
                    }).submit();
		

                });                
            });
        </script>

    </head>
    <body class="photos">
        <div id="main">
            <div id="head">
                <?
                include ('../../inc/head.php');
                ?>
            </div>
            <div id="sidemenu">
                <?php
                include('../../inc/submenu_photos.php');
                ?>


            </div>
            <div id="content">
                <h1>Edit Page Images</h1><br/>
                <table cellpadding="0" cellspacing="0" border="0" class="display" id="pagePics">
                    <thead>
                        <tr>
                            <th>Image Source</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?
                        while ($row = $db->fetchData($result)) {
                            $id = $row['pagePics_id'];
                            $pageID = $row['page_id'];
                            $imgSrc = $row['pagePics_imgSrc'];
                            $imgSrc = substr($imgSrc, "2");
                            
                            $imgSrc = "http://www.vallettaboatshow.com".$imgSrc;
                            
                            ?>
                            <tr id="<?= $id; ?>" class="edit_tr">
                                
                                <td class="edit_td">
                                    <img src="<?=$imgSrc;?>" style="width: 200px; height: 150px;"/>
                                </td>                     
                                <td><a href="#" class="delete"><div id="delete"></div></a></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                

                </table>
                <div class="clear"></div>
                <a id="addItem" class="submit">Add Image</a>
            </div>
            
            <div class="add">
                <div class="close"><img onclick="closeAdd();"  src="../../images/close.png"/></div>
                <span>Please Upload the New Banner Image </span>
                <form id="imageform" method="post" enctype="multipart/form-data" action='addBanner_item.php'>
                    <input type="text" value='<?=$banner_cat_id;?>' name="bannerCat" hidden="hidden"/>                   
                    Upload your image <input type="file" name="photoimg" id="photoimg" />
                </form> <div id='preview'></div>
            </div>
        </div>
</body>
</html>

