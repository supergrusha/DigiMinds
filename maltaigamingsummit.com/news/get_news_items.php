<?
session_start();
if(isset($_GET['lang'])){
       require ('../../classes/DB.php');
       $db = new DB();
       $langId = $_GET['lang'];
       $_SESSION['lang'] = $langId;
}  else {
    header("Loaction: index.php");
}

?>
<script type="text/javascript"  src="../js/jquery.dataTables.js"></script>  
<script type="text/javascript" >   
    $(document).ready(function() {
        $('#news').dataTable( );     
        $('#news td a.delete').click(function(){  
            if (confirm("Are you sure you want to delete this row?")){     
                var id = $(this).parent().parent().attr('id');    
                var data = 'id=' + id ;        
                var parent = $(this).parent().parent();   
                $.ajax({    
                    type: "POST",     
                    url: "deleteNews_item.php",      
                    data: data,                   
                    cache: false,                 
                    success: function()           
                    {                     
                        parent.fadeOut('slow', function() {$(this).remove();});   
                    } 
                });	
            }              
        });
    });  
</script>
<table cellpadding="0" cellspacing="0" border="0" class="display" id="news">    
    <thead>               
        <tr>                  
            <th>News Title</th>     
            <th>News Publish Date</th> 
            <th>Last Edit By</th>
            <th>Delete</th>            
        </tr>                  
    </thead>                
    <tbody>
        <?
        $result = $db->query("SELECT news_id, news_title, users_username FROM news JOIN users WHERE news.user_id=users.users_id AND lang_id=$langId ORDER BY news_time ASC ");
        while ($row = $db->fetchData($result)) {
                $id = $row['news_id'];
                $news_date = $row['news_time'];
                $yr = substr($news_date, "0", "-15");
                $month = substr($news_date, "5", "-12");
                $day = substr($news_date, "8", "-9");
                $time = substr($news_date, "10");
                $news_date = "$month" . "/" . $day . "/" . "$yr";
            ?>                            <tr id="<?= $id; ?>">           
                <td>                     
                    <a href="editNews.php?id=<?= $id; ?>" <span><? echo $row['news_title']; ?></span></a>  
                </td>                   
                <td>                 
                    <span><? echo $news_date; ?></span>    
                </td>
                <td><?=$row['users_username'];?></td>
                <td><a href="#" class="delete"><div id="delete"></div></a></td>    
            </tr>    
        <? } ?>      
    </tbody>               
</table>     