<!DOCTYPE html>
<html class="no-js">

    <head>
        <!-- meta -->
        <meta charset="utf-8">
        <meta name="description" content="Flat, Clean, Responsive, admin template built with bootstrap 3">
        <meta name="viewport" content="width=device-width, user-scalable=1, initial-scale=1, maximum-scale=1">

        <title>DigitalMinds | Admin</title>

        <!-- bootstrap -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <!-- /bootstrap -->

        <!-- core styles -->
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="vendor/offline/theme.css">
        <!-- /core styles -->

        <!-- page styles -->
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
                <?php 
 foreach ($account_det as $det){
     echo $det->users_name;
     echo $det->users_email;
 }
 //var_dump($account_det['users_name']);
                ?>
                <!-- main content -->
                <section class="main-content">

                    <header class="header navbar bg-default">
                        <ul class="nav navbar-nav nav-tabs">
                            <li>
                                <a href="#account" data-toggle="tab">Account Settings</a>
                            </li>
                        </ul>
                    </header>

                    <!-- content wrapper -->
                    <div class="content-wrap">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="tab-content ">
                                    <section class="tab-pane-active" id="account">
                                        <form role="form" class="form-horizontal parsley-form" data-parsley-validate>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Name & Surname</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" name="nameSurname" data-parsley-required="true" data-parsley-trigger="change" placeholder="Full Name" >
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Email</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" name="companyEmail" data-parsley-required="true" data-parsley-trigger="change" placeholder="company@email.com">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label"></label>
                                                <div class="col-sm-4">
                                                    <button class="btn btn-primary btn-parsley">Submit</button>	
                                                    <a href="#" class="forgotpass">Change your password</a>												
                                                </div>
                                            </div>
                                        </form>
                                                                                <form role="form" class="form-horizontal parsley-form" data-parsley-validate>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Name & Surname</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" name="nameSurname" data-parsley-required="true" data-parsley-trigger="change" placeholder="Full Name">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Email</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" name="companyEmail" data-parsley-required="true" data-parsley-trigger="change" placeholder="company@email.com">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label"></label>
                                                <div class="col-sm-4">
                                                    <button class="btn btn-primary btn-parsley">Submit</button>	
                                                    <a href="#" class="forgotpass">Change your password</a>												
                                                </div>
                                            </div>
                                        </form>
                                    </section>
                                </div>
                            </div>
                        </div>

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
        <!-- /page scripts -->

        <!-- theme scripts -->
        <script src="js/off-canvas.js"></script>
        <script src="vendor/offline/offline.min.js"></script>
        <script src="js/main.js"></script>
        <!-- /theme scripts -->

    </body>
    <!-- /body -->

</html>
