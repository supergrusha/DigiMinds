<div id="shadow"></div>
<div id="footer-in">
<div id="footer-left">
           
                 <ul id="footer-nav">
    <?
        $count = 0;
        $result = $db->query("SELECT page_id FROM menuPage WHERE menu_id='6'");

        while ($ab = $db->fetchData($result)){

            $pageID = $ab['page_id'];

            $a = $db->query("SELECT pageDet_name, page_link FROM pageDetails INNER JOIN pages  WHERE pageDetails.page_id=$pageID  AND pages.page_id=pageDetails.page_id");

            $row = $db->fetchData($a);

            $link = $row['page_link'];

            ?>
                <li><a href="<?=$link;?>"><?=$row['pageDet_name'];?></a></li>
                <?
                $count = $count +1;;
                
                if ($count == 2){
                $count = 0;
                ?>
                </ul>
                                     <ul id="footer-nav"><?
            }  
        } ?>
    
        
              
    </div>
        <div id="footer-right">    &copy; Copyright SIGMA 2014. All rights reserved.	</div>

  
</div>