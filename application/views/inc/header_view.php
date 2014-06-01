<?php $data = $this->session->all_userdata();?>
<!-- top header -->
<header class="header header-fixed navbar bg-white">

    <div class="brand bg-success">
        <a href="#" class="fa fa-bars off-left visible-xs" data-toggle="off-canvas" data-move="ltr"></a>

        <a href="<?php echo base_url();?>" class="navbar-brand text-white">
            <i class="fa fa-microphone mg-r-xs"></i>
            <span>Welcome
                <b><?php echo $data['username'];?></b>
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
               <?php echo $data['name'];?>
            </a>
        </li>

        <li class="quickmenu mg-r-md">
            <a href="#" data-toggle="dropdown">
                <img src="<?php echo base_url();?>img/avatar.jpg" class="avatar pull-left img-circle" alt="user" title="user">
                <i class="caret mg-l-xs hidden-xs no-margin"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-right mg-r-xs">
                <li>
                    <a href="#">
                        <div class="pd-t-sm">
                            <?php echo $data['email']?>
                            <br>
                        </div>      
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>account">Settings</a>
                </li>

                <li>
                    <a href="#">Help</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="<?php echo base_url();?>login/log_out">Logout</a>
                </li>
            </ul>
        </li>
    </ul>
</header>
<!-- /top header -->