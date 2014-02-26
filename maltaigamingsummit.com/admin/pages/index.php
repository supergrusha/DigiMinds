<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login/index.php");
}
require ('../../classes/DB.php');
$db = new DB();
?>
<html>
    <head>
        <meta name="author" content="Eric Castillo" />
        <meta http-equiv="Content-Type" content="text/html; charset=ISO8859_3"> 
        <title>Admin - Edit Page Text</title>
        <meta name="viewport" content="width=1040"/> 
        <link rel="stylesheet" href="../css/style.css" type="text/css"/>
        <link rel="stylesheet" href="../css/demo_table.css" type="text/css"/>
        <link rel='shortcut icon' type='image/x-icon' href='../images/favicon.ico' />

        <script src="../js/jquery.js" type="text/javascript"></script>
        <script type="text/javascript"  src="../js/jquery.dataTables.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#pages').dataTable(); 
            });
        </script>

    </head>
    <body class="text">
        <div id="main">
            <div id="head">
<?
include ('../inc/head.php');
?>
            </div>


            <div id="content">
                <h1>Pages</h1>
 
                <div id="pageItems">
                    <table cellpadding="0" cellspacing="0" border="0" class="display" id="pages">
                        <thead>
                            <tr>
                                <th>Page Name</th>
                                <th>Last Edit By</th>
                            </tr>
                        </thead>
                        <tbody>
                            <meta http-equiv="Content-Type" content="text/html; charset=ISO8859_3"> 
                            <?php
                            $db = new DB();
                            $result = $db->query("
                                SELECT 
                                    content.content_id,
                                    pageDetails.pageDet_name,
                                    pageDetails.page_id,
                                    users.users_username
                                FROM content 
                                    INNER JOIN pageDetails ON pageDetails.page_id = content.page_id 
                                    INNER JOIN users ON users.users_id=content.user_id ");
                            while ($row = $db->fetchData($result)) {
                                $id = $row['content_id'];
                                $pageID = $row['page_id'];
                                $pageName = $row['pageDet_name'];
                                ?>
                                <tr id="<?= $id; ?>">
                                    <td>
                                        <a href="editPage.php?id=<?= $id;?>"><span><?= $pageName; ?></span></a>
                                    </td>
                                    <td>
                                        <?=$row['users_username'];?>
                                    </td>
                                </tr>
                                <?
                            }
                            ?>


                        </tbody>
                    </table>    
                </div>
            </div>
        </div>

    </body>
</html>

