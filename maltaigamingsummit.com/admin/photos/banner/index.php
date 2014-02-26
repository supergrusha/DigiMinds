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
        <title>Admin - Edit Banner Items</title>
        <meta name="viewport" content="width=1040"/> 
        <link rel="stylesheet" href="../../css/style.css" type="text/css"/>
        <link rel="stylesheet" href="../../css/demo_table.css" type="text/css"/>
        <link rel='shortcut icon' type='image/x-icon' href='../../images/favicon.ico' />
        <script src="../../js/jquery.js" type="text/javascript"></script>
        <script type="text/javascript"  src="../../js/jquery.dataTables.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
        $('#bannerItems').dataTable( );
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
                <h1>Banners</h1>
                
                <table cellpadding="0" cellspacing="0" border="0" class="display" id="bannerItems">
                    <thead>
                        <tr>
                            <th>Banner Type</th>
                        </tr>
                    </thead>
                    <tbody>               
                        <?php
                        $result = $db->query("SELECT * FROM banners");
                        while ($row = $db->fetchData($result)) {
                            $id = $row['banner_id'];
                            ?>
                            <tr>
                                <td>
                                    <a href="editBanner.php?id=<?= $id; ?>"><span><?=$row['banner_name']; ?></span></a>
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

