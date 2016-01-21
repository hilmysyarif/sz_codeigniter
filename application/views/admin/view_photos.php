<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Index</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url('web/admin') ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= base_url('web/admin') ?>/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?= base_url('web/admin') ?>/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?= base_url('web/admin') ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">
    <!-- Navigation -->
    <?php $this->load->view('admin/navbar') ?>
    <div id="page-wrapper">
        <div class="container-fluid">

            <!--put your content here-->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Album
                        <small><?php echo $album->name; ?></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a
                                href="<?= base_url('index.php/admin/home'); ?>">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Photo list
                        </li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2 col-md-offset-10 text-right">
                    <div class="form-group">
                        <a href="<?php echo base_url('index.php/admin/gallerycontroller/') ?>" class="btn btn-primary">
                            <i class="fa fa-reply"></i> Back</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <?php
                    if ($this->session->flashdata('success')) {
                        ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-success">
                                    <?php
                                    echo $this->session->flashdata('success');
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php

                    }
                    ?>

                    <?php
                    if (count($photos) > 0) {

                        ?>
                        <table class="table table-striped table-responsive">
                            <tr>
                                <td>Id</td>
                                <td>Photo</td>
                                <td>Action</td>
                            </tr>

                            <?php
                            foreach ($photos as $row) {
                                ?>
                                <tr>
                                    <td><?php echo $row->id; ?></td>
                                    <td><img src="<?php echo base_url('web/admin/upload/' . $row->file) ?>"
                                             style="height:100px; width:100px;" alt="<?php echo $row->file; ?>"/></td>
                                    <td>
                                        <a href="<?php echo base_url('index.php/admin/gallerycontroller/edit_photo_view/' . $row->id) ?>"
                                           class="btn btn-success">Edit</a>
                                        <a href="<?php echo base_url('index.php/admin/gallerycontroller/delete_photo/' . $row->id) ?>"
                                           class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>

                        </table>
                    <?php
                    } else {
                        echo "no any data ";
                    }

                    ?>
                </div>
            </div>
            <!--end putted your content here-->

        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url('web/admin') ?>/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?= base_url('web/admin'); ?>/js/bootstrap.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="<?= base_url('web/admin') ?>/js/plugins/morris/raphael.min.js"></script>
<script src="<?= base_url('web/admin') ?>/js/plugins/morris/morris.min.js"></script>
<script src="<?= base_url('web/admin') ?>/js/plugins/morris/morris-data.js"></script>

</body>

</html>
