<!DOCTYPE html>
<html class="no-js">

    <head>
        <!-- meta -->
        <meta charset="utf-8">
        <meta name="description" content="Flat, Clean, Responsive, admin template built with bootstrap 3">
        <meta name="viewport" content="width=device-width, user-scalable=1, initial-scale=1, maximum-scale=1">

        <title>DigitalMinds | Responsive Admin Dashboard</title>

        <!-- bootstrap -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <!-- /bootstrap -->

        <!-- core styles -->
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="vendor/offline/theme.css">
        <!-- /core styles -->

        <!-- page styles -->
        <link rel="stylesheet" href="vendor/bootstrap-select/bootstrap-select.css">
        <link rel="stylesheet" href="vendor/datatables/jquery.dataTables.css">
        <!-- /page styles -->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- load modernizer -->
        <script src="vendor/modernizr.js"></script>
    </head>

    <!-- body -->

    <body>
        <div class="app">
            <?php $this->load->view('inc/header_view'); ?>

            <section class="layout">
                <?php $this->load->view('inc/sidemenu_view'); ?>

                <!-- main content -->
                <section class="main-content">

                    <!-- content wrapper -->
                    <div class="content-wrap">
                        <section class="panel panel-info">
                            <header class="panel-heading">News Editor</header>
                            <div class="panel-body">
                                <div class="table-responsive no-border">
                                    <table class="table table-bordered table-striped mg-t datatable">
                                        <thead>
                                            <tr>
                                                <th>Page Name</th>
                                                <th>Author</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($pages as $page): ?>
                                                <tr>
                                                    <td><a href="<?php echo base_url();?>pages/edit_page" class="pagemenuhover"><?php echo $page->pageDet_name;?></a></td>
                                                    <td><?php echo $page->users_username;?></td>
                                                    <td><?php echo $page->content_edit_date;?></td>
                                                </tr>

                                            <?php endforeach; ?> 
                                                
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Page Name</th>
                                                <th>Author</th>
                                                <th>Date</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </section>
                    </div>
                    <!-- /content wrapper -->
                </section>
                <!-- /main content -->
            </section>

        </div>

        <!-- core scripts -->
        <script src="vendor/jquery-1.11.0.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <!-- /core scripts -->

        <!-- page scripts -->
        <script src="vendor/bootstrap-select/bootstrap-select.js"></script>
        <script src="vendor/datatables/jquery.dataTables.js"></script>
        <!-- /page scripts -->

        <!-- theme scripts -->
        <script src="js/off-canvas.js"></script>
        <script src="vendor/offline/offline.min.js"></script>
        <script src="js/main.js"></script>
        <script src="js/datatables.js"></script>
        <!-- /theme scripts -->

    </body>
    <!-- /body -->

</html>
