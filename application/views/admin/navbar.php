<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand  and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span cl ass="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">Admin</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Admin <b
                    class="caret"></b></a>
            <ul class="dropdown-menu">

                <li>
                    <a href="<?php echo base_url('index.php/admin/LoginController/change')?>">Change Password</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="<?php echo base_url('index.php/admin/LoginController/logout')?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>


    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">

            <li class="active"><a href="<?= base_url('index.php/admin/home') ?>"><i class="fa fa-fw fa-dashboard"></i>
                    Dashboard</a></li>
            <li><a href="<?= base_url('index.php/admin/gallerycontroller') ?>"><i class="fa fa-fw fa-picture-o"></i>
                    Photos</a></li>
            <li><a href="<?php echo base_url('index.php/admin/videocontroller') ?>"><i class="fa fa-video-camera"></i>
                    Videos</a></li>
            <li><a href="<?php echo base_url('index.php/admin/partner_controller/') ?>"><i
                        class="fa fa-fw fa-group"></i> Partner</a></li>
            <li><a href="<?php echo base_url('index.php/admin/case_controller/') ?>""><i class="fa fa-fw fa-wrench"></i>
                Special Case</a></li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i>
                    Media<i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo" class="collapse">
                    <li>
                        <a href="<?php echo base_url('index.php/admin/mediacontroller') ?>">Media Release</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('index.php/admin/NewsController') ?>">Salaam Zindagi News</a>
                    </li>
                </ul>
            </li>


            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#pages"><i class="fa fa-fw fa-file"></i>
                    Pages<i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="pages" class="collapse">
                    <li>
                        <a href="<?php echo base_url('index.php/admin/PageController/page/1') ?>">Programs</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('index.php/admin/PageController/page/2') ?>">About</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>