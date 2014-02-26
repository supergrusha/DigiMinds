<?php 
require_once('classes/DB.php');
//require_once ('classes/Version.php');
require_once ('classes/counter.php');
$db = new DB();
//$version = new Version();
$url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$url = strtok($url, '?');
$result = $db->query("SELECT page_id FROM pages WHERE page_link='$url'");
$row = $db->fetchData($result);
$pageId = $row["page_id"];
$_SESSION['page_id'] = $pageId;
if ($pageId == '') {
    $pageId = '26';
}
$count = new counter();
$result = $db->query("SELECT pageDet_title, pageDet_name FROM pageDetails WHERE  page_id='$pageId' ");
$row = $db->fetchData($result);
$pageTitle = $row['pageDet_title'];
?>
<html>   
    <head>
        <link href="css/style.css" rel="stylesheet" type="text/css"> 
        <meta http-equiv="Content-Type" content="text/html; charset=ISO8859_3"/>
        <meta name="viewport" content="width=1343"/> 
        <meta name="viewport" content="height=1243"/>
        <title><?= $pageTitle; ?></title>
        <link rel='shortcut icon' type='image/x-icon' href='/img/favicon.ico' /> 
        <meta name="description" content="Valletta Boat Show 2013 - The boat show in the heart of the Mediterranean"> 
        <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>  
       <?php include_once('inc/analyticstracking.php') ?>  
             <script type="text/javascript" src="js/jquery.min.js"></script> 
        <script type="text/javascript" src="js/slider.js"></script>
        <style>         
<? 
$i = 0;
$slides = array();
$result = $db->query("SELECT * FROM bannerImages WHERE banner_id=2");
while ($row = $db->fetchData($result)) { ?>
#slide<?= $i; ?>{
    width: 100%;
    height: 352px; 
    position: absolute; 
    background: url('<?= $row['bannerImage_imgSrc'] ?>') center top no-repeat; 
} <? 
    $slides[] = $i;
    $i++;
} ?> 
       </style>      
       <script>
          <?
                $java = "var slides = '";
                    foreach($slides as $slide){
                        $java = $java."#slide".$slide.",";
                ?>       
                  <?  }
  echo $java."'.split(',');";
                  ?>
                      </script>
            
    </head>
    <body>
         <?php include ('inc/topMenu.php'); ?> 
             
        <div id="wrapper"> 
            <div class="logo">
                <img src="images/logo.png"/>
            </div>
            <?
                    $i = 0;
                    foreach($slides as $slide){
                        if ($i == 0) {
                                 echo "<div id='slide".$slide."'></div>";
                        }else
                        echo "<div id='slide".$slide."' style='display: none;'></div>";
                   $i++; }
                ?>    
            <div id="header"> 
                <?php include ('inc/menu.php'); ?> 
            </div>   
            <div class="content-wrapper">
                <div id="threesixty"> 
                    
                </div>                 <?
                $result = $db->query("SELECT content_name, content_text FROM content WHERE  page_id=$pageId");
                while ($row = $db->fetchData($result)) {
                    $content = $row["content_text"];
                    $contentName = $row["content_name"];
                    ?>                      <h1 id="home"><?= $contentName; ?></h1>    
                   <? } ?>                        
                    <div id='width'>           
                <?
                    $class = array("left", "right", "center");
                    $count = 0;
                    $result = $db->query("SELECT page_id FROM menuPage WHERE menu_id='5'");
                    while ($ab = $db->fetchData($result)) {
                        $pageID = $ab['page_id'];
                        $a = $db->query("SELECT pageDet_name,content_text, page_link FROM pageDetails INNER JOIN pages,content WHERE pageDetails.page_id=$pageID AND pages.page_id=pageDetails.page_id AND pages.page_id=content.page_id");
                        $row = $db->fetchData($a);
                        $link = $row['page_link'];
                        $pageName = $row['pageDet_name'];
                        $content = $row['content_text'];
                        $content = substr($content, '0', '150');
                    ?> 
                        <div class="<?= $class[$count] ?>"> 
                            <a href="" class="block-link"></a> 
                            <div class="icon"></div>  
                            <h2><a href="<?= $link; ?>?lang=<?= $_SESSION['langCode']; ?>"><?= $pageName ?></a></h2>    
                      <p> <? $showcontent = strtok($content, '.') ?>             <?= $showcontent; ?> </p>
                            <a href="<?= $link; ?>?lang=<?= $_SESSION['langCode']; ?>" class="more">Read More</a> 
                        </div>    <? $count++;
                        }
                ?>                                         
                        <div class="news">   
                           <a href="<?= $link; ?>" style="border-bottom: none;">    
                               <h2 class="icon-rss"><?= $row['pageDet_name']; ?></h2></a>  
                            <div class="clear-both"></div>               
                            <ul>                       
          <?
                            $link = "http://www.vallettaboatshow.com/news/news_item.php";
                            $count = 0;
                            $result = $db->query("SELECT news_id, news_title, news_time, news_content FROM news  ORDER BY news_time  DESC LIMIT 2");
                            while ($row = $db->fetchData($result)) {
                                $id = $row['news_id'];
                                $news_date = $row['news_time'];
                                $yr = substr($news_date, "0", "-15");
                                $month = substr($news_date, "5", "-12");
                                $day = substr($news_date, "8", "-9");
                                $time = substr($news_date, "10");
                                $news_date = "$month" . "/" . $day . "/" . "$yr";
                                $content = substr($row['news_content'], "0", "250");
                                $content = strip_tags($content, "<p>");
                                $monthText = date("M", mktime(0, 0, 0, $month, 10));
                                ?>                                                             <li class="<?php
                                if ($count % 2 == 0) {
                                    $class = "lt";
                                }else
                                    $class = "rt"; echo $class;
                                ?>">                    
                                    <div class="date">    
                                        <span class="month"><?= $monthText; ?></span>  
                                        <span class="day"><?= $day; ?></span> 
                                    </div>                     
                                    <a href="<?= $link . "?id=" . $id ?>&lang=<?= $_SESSION['langCode']; ?>"><?= $row['news_title']; ?></a> 
                                    <p><?= $content; ?></p>             
                                    <a class="more" href="<?= $link . "?id=" . $id ?>&lang=<?= $_SESSION['langCode']; ?>">Read More</a>  
                                </li>                                   
                              <? 
                              $count++;                             
                            }
                ?>      
                            </ul>  
                        </div>      
                    </div>     
                    <span class="block clear-both"></span>    
            </div>        
    <div id="footer">        
      
    </div>   
        </div>
</body>
</html>