<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#"> <img class="main-logo" src="img/main-logo.png" alt="tillow's cake logo"/></a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="#">Home</a></li>
                <?php foreach ($menu_items as $item): ?>
                    <li><a href="<?php echo $item->page_link;?>"><?php  echo $item->pageDet_name;?></a></li>
                <?php endforeach;?>  
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>