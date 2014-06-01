<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php foreach ($page_title as $title):  echo $title->pageDet_title;   endforeach;  ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <!-- Navigation -->
        <?php $this->load->view( 'inc/menu_view', $menu_items); ?>
        <div class="container mid main">
            <img class="center-block title img-responsive" src="img/about-us.jpg"/>
            <div class="center-block row">
                <div class="col-md-5">
                    <img class="img-responsive center-block" src="img/cake-about.jpg"/>
                </div>
                <?php foreach ($content as $cont):?>
                <div class="col-md-7">
                    <h4 class="about-title"><?php echo $cont->content_name;?></h4>
                    <p class="text"><?php echo $cont->content_text;?> </p>
                </div>
               <?php endforeach;?>
            </div>
        </div>
        <!-- Footer -->
        <?php  $this->load->view('inc/footer_view'); ?>
        <!-- Scripts-->
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/script.js"></script>
        <script src="js/cycle.js"></script>
        <!-- Scrips End -->
    </body>
</html>