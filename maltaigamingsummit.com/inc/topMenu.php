<div id="top-container">
<div id="top">
    
<ul id="navigation">
    <?
        $result = $db->query("SELECT page_id FROM menuPage WHERE menu_id='4'");
        while ($ab = $db->fetchData($result)){
            $pageID = $ab['page_id'];
            $a = $db->query("SELECT pageDet_name, pageDet_desc, page_link FROM pageDetails INNER JOIN pages  WHERE pageDetails.page_id=$pageID  AND pages.page_id=pageDetails.page_id");
            $row = $db->fetchData($a);
            $link = $row['page_link'];
             ?>
        <li class="end"><a href="<?=$link;?>"><span><?=$row['pageDet_name'];?></span><br><?=$row['pageDet_desc'];?></a></li>
    <?
        } ?>
</ul>
    </div>
</div>