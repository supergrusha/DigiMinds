<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login/index.php");
} else {
    require_once ('../classes/DB.php');
    require_once ('../classes/counter.php');
}
?>
<html>
    <head>
        <link rel="stylesheet" href="css/style.css?t=1">
        <link rel="stylesheet" href="css/demo_table.css" type="text/css"/>
        <link class="include" rel="stylesheet" type="text/css" href="css/jquery.jqplot.min.css" />
        <link rel='shortcut icon' type='image/x-icon' href='images/favicon.ico' />
        <meta name="viewport" content="width=1040"/> 
        <script class="include" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script type="text/javascript"  src="js/jquery.dataTables.js"></script>
        <script class="include" type="text/javascript" src="js/jplot/jquery.jqplot.min.js"></script>
        <script class="include" type="text/javascript" src="js/jplot/jqplot.pieRenderer.min.js"></script>
        <script type="text/javascript" >
            $(document).ready(function() {             
                $('#stats').dataTable( );                 
            });
        </script>
    </head>
    <body class="stts" style="overflow: hidden;">
        <div id="main">
            <div id="head">
                <?
                include ('inc/head.php');
                ?>
            </div>

            <div id="content" class="home">
                <h1>Welcome to Admin Panel</h1><br/>
                <table cellpadding="0" cellspacing="0" border="0" class="display" id="stats">
                    <thead>
                        <tr>
                            <th>Page Name</th>
                            <th>Hits</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = new counter();
                        $result = $count->getHits();
                        $totalVists = 0;
                        foreach ($result as $hit) {
                            $pageID = $hit['pageId'];
                            $pageName = $hit['pageName'];
                            $pageHits = $hit['pageHits'];
                            $totalVists = $totalVists + $pageHits;
                            ?>
                            <tr>
                                <td>
                                    <span><?php echo $pageName; ?></span>
                                </td>
                                <td>
                                    <span><?php echo $pageHits; ?></span>                               
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Total Hits</th>
                            <th><?= $totalVists; ?></th>
                        </tr>
                    </tfoot>

                </table>
                <div id="pie5" style="margin-top:20px; margin-left:50px; width:400px; height:240px;"></div>
                <script class="code" type="text/javascript">$(document).ready(function(){  
                    var plot5 = $.jqplot('pie5', [[<?php
                        $result = $count->getHits();

                        foreach ($result as $hit) {
                            $pageName = $hit['pageName'];
                            $pageHits = $hit['pageHits'];
                            ?> 
                                                ["<?= $pageName ?>",<?= $pageHits ?>],
                                                
                        <? }
                    ?> ["total",0] ]], {
                                       seriesDefaults:{ renderer: $.jqplot.PieRenderer },
                                       legend:{ show:true }      
                                   });   
                               });</script>
            </div>
        </div>
    </body>
</html>