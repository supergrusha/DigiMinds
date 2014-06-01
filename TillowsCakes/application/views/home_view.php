<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php foreach ($page_title as $title):  echo $title->pageDet_title;   endforeach;  ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet"/>
        <link href="<?php echo base_url();?>css/style.css" rel="stylesheet"/>
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <!-- Navigation -->
        <?php $this->load->view('inc/menu_view', $menu_items); ?>
        <!-- Slider -->
        <?php $this->load->view('inc/slider_view'); ?>

        <div class="container mid">
            <img class="center-block title img-responsive" src="img/popular-cakes.jpg"/>
            <div class="center-block row cakes">
                <?php foreach ($popular_cakes as $cake): ?>
                    <div class="col-md-4"> 
                        <a href="#">
                            
                            <div class="imagehover">
                                <img class="img-responsive center-block" src="<?php echo $cake->cakes_img_src; ?>"/>
                            </div>
                            <h3><?php echo $cake->cakes_name; ?></h3>
                            <p><?php echo $cake->cakes_desc; ?></p>
                            <img class="arrow center-block img-responsive" src="img/cake-button.jpg"/>
                        </a>
                    </div>
                <?php endforeach; ?>  
            </div>

        </div>
        <!-- Footer -->
        <?php $this->load->view('inc/footer_view'); ?>

        <!-- Scripts-->
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/script.js"></script>
        <!-- Scrips End -->
    </body>
</html>