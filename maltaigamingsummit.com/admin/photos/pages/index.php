<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../../login/index.php");
}
require ('../../../classes/DB.php');
$db = new DB();
?>
<html>
    <head>
        <meta name="author" content="Eric Castillo" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Admin - Edit Page Pics</title>
        <meta name="viewport" content="width=1040"/> 
        <link rel="stylesheet" href="../../css/style.css" type="text/css"/>
        <link rel="stylesheet" href="../../css/demo_table.css" type="text/css"/>
        <link rel='shortcut icon' type='image/x-icon' href='../../images/favicon.ico' />
        <script src="../../js/jquery.js" type="text/javascript"></script>
        <script type="text/javascript"  src="../../js/jquery.dataTables.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#pagesItems').dataTable( );
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
                <h1>Page Pictures</h1>
               
                <table cellpadding="0" cellspacing="0" border="0" class="display" id="pagesItems">
                    <thead>
                        <tr>
                            <th>Page</th>
                        </tr>
                    </thead>
                    <tbody>               
                        <?php
                        $result = $db->query("SELECT pagePics_id, pageDet_name, pageDetails.page_id FROM pagesPics JOIN pageDetails WHERE pagesPics.page_id=pageDetails.page_id AND pageDetails.lang_id=1");
                        while ($row = $db->fetchData($result)) {
                            $id = $row['pagePics_id'];
                            ?>
                            <tr>
                                <td>
                                    <a href="editPage.php?id=<?= $id; ?>"><span><?= $row['pageDet_name']; ?></span></a>
                                </td>
                            </tr>
                            <?
                        }
                        ?>
                    </tbody>
                   


                </table>
                <br/>
            </div>
        </div>
    </body>
</html>

