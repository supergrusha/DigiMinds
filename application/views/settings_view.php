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
        <!-- top header -->
     <header class="header header-fixed navbar bg-white">

            <div class="brand bg-success">
                <a href="#" class="fa fa-bars off-left visible-xs" data-toggle="off-canvas" data-move="ltr"></a>

                <a href="index.html" class="navbar-brand text-white">
                    <i class="fa fa-microphone mg-r-xs"></i>
                    <span>Welcome
                        <b>ADMIN</b>
                    </span>
                </a>
            </div>

            <form class="navbar-form navbar-left hidden-xs" role="search">
                <div class="form-group">
                    <button class="btn no-border no-margin bg-none no-pd-l" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                    <input type="text" class="form-control no-border no-padding search" placeholder="Search Workspace">
                </div>
            </form>

            <ul class="nav navbar-nav navbar-right off-right">
                <li class="hidden-xs">
                    <a href="#">
                        +Eric Castillo
                    </a>
                </li>

                <li class="quickmenu mg-r-md">
                    <a href="#" data-toggle="dropdown">
                        <img src="img/avatar.jpg" class="avatar pull-left img-circle" alt="user" title="user">
                        <i class="caret mg-l-xs hidden-xs no-margin"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right mg-r-xs">
                        <li>
                            <a href="#">
                                <div class="pd-t-sm">
                                    gerald@morris.com
                                    <br>
                                </div>      
                            </a>
                        </li>
                        <li>
                            <a href="#">Settings</a>
                        </li>
                
                        <li>
                            <a href="#">Help ?</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="signin.html">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </header>
        <!-- /top header -->

        <section class="layout">
            <!-- sidebar menu -->
            <aside class="sidebar canvas-left bg-dark">
                <!-- main navigation -->
                             <nav class="main-navigation">
                    <ul>
                        <li class="active">
                            <a href="index.html">
                                <i class="fa fa-coffee"></i>
                                <span>Admin Home</span>
                            </a>
                        </li>
                        <li class="dropdown show-on-hover">
                            <a href="#" data-toggle="dropdown">
                                <i class="fa fa-cog fa-fw"></i>
                                <span>Settings</span>
                            </a>
                            <ul class="dropdown-menu">
							<li>
                                    <a href="#">
                                        <span>Company Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>Account Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>User Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>Company Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>Google Analytics</span>
                                    </a>
                                </li>
                                              
                            </ul>
                        </li>

							
							 <li>
                            <a href="#">
                                <i class="fa fa-file"></i>
                                <span>Page Editor</span>               
                            </a>
                        </li>
						
						  <li>
                            <a href="news.html">
                                <i class="fa fa-comment"></i>
                                <span>News Editor</span>
                            </a>
                        </li>
						
						<li class="dropdown show-on-hover">
                            <a href="#" data-toggle="dropdown">
                                <i class="fa fa-camera"></i>
                                <span>Image Editor</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">
                                        <span>Banners</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>Page Images</span>
                                    </a>
                                </li>                                
                            </ul>
                        </li>

                        <li>
                            <a href="mail.html">
                                <i class="fa fa-envelope"></i>
                                <span>Mailbox</span>
                                <div class="badge badge-opac pull-right">8</div>
                            </a>
                        </li>
                                         
                    </ul>
                </nav>
                <!-- /main navigation -->


                <!-- footer -->
                <footer>
                    <div class="about-app pd-md animated pulse">
                        <a href="#">
                            <img src="img/about.png" alt="">
                        </a>
                        <span>
                            <b>DigitalMinds Admin</b>&#32;is a responsive admin template powered by bootstrap 3.
                            <a href="www.digitalminds.com.mt">
                                <b>Find out more</b>
                            </a>
                        </span>
                    </div>

                    <div class="footer-toolbar pull-left">
                        <a href="#" class="pull-left help">
                            <i class="fa fa-question-circle"></i>
                        </a>

                        <a href="#" class="toggle-sidebar pull-right hidden-xs">
                            <i class="fa fa-angle-left"></i>
                        </a>
                    </div>
                </footer>
                <!-- /footer -->
            </aside>
            <!-- /sidebar menu -->

            <!-- main content -->
            <section class="main-content">
			
			<header class="header navbar bg-default">
                    <ul class="nav navbar-nav nav-tabs">
                        <li class="active">
                            <a href="#company" data-toggle="tab">Company Settings</a>
                        </li>
                        <li>
                            <a href="#account" data-toggle="tab">Account Settings</a>
                        </li>
                        <li>
                            <a href="#user" data-toggle="tab">User Settings</a>
                        </li>
                    </ul>
                </header>

                <!-- content wrapper -->
                <div class="content-wrap">
				 <div class="row">
                        <div class="col-lg-12">
                            <div class="tab-content ">
				  <section class="tab-pane active" id="company">
                                    <form role="form" class="form-horizontal parsley-form" data-parsley-validate>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Company Phone</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="companyPhone" data-parsley-required="true" data-parsley-trigger="change" placeholder="Company Phone">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Company Mobile</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="companyMobile" data-parsley-required="true" data-parsley-trigger="change" placeholder="Company Mobile">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Email</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="companyEmail" data-parsley-required="true" data-parsley-trigger="change" placeholder="company@email.com">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">State/Province</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="state" data-parsley-required="true" data-parsley-trigger="change" placeholder="State/Province">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">City</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="city" data-parsley-required="true" data-parsley-trigger="change" placeholder="City">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"></label>
                                            <div class="col-sm-4">
                                                <button class="btn btn-primary btn-parsley">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </section>
								
								  <section class="tab-pane" id="account">
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
