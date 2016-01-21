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
                        Upload
                        <small>Link</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a
                                href="<?= base_url('index.php/admin/home'); ?>">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Upload link
                        </li>
                    </ol>
                </div>
            </div>
            <!--end putted your content here-->

            <div class="row">
                <div class="col-md-12">
                    <?php if ($this->session->flashdata('success')) {
                        ?>
                        <div class="alert alert-success">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php
                    } ?>

                    <?php if ($this->session->flashdata('failure')) {
                        ?>
                        <div class="alert alert-danger">
                            <?php echo $this->session->flashdata('failure'); ?>
                        </div>
                    <?php
                    } ?>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('index.php/admin/partner_controller/partner_link_add') ?>"
                          method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="link">Link</label>
                            <input type="url" id="link" class="form-control" required="reqquired" name="link"
                                   placeholder="enter link "/>
                        </div>
                        <div class="form-group">
                            <label for="partner">Partner</label>
                            <select class="form-control" required="required" name="partner_id" id="partner">
                                <option value="">select</option>
                                <?php foreach ($partners as $row) {
                                    echo "<option value='" . $row->id . "'>" . $row->name . "</option>";
                                }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="file">Upload logo</label>
                            <input type="file" id="file" name="file" required="reqquired" placeholder="upload logo"
                                   class="form-control"/>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-floppy-o"></i> Save
                            </button>
                            <a href="<?php echo base_url('index.php/admin/partner_controller') ?>"
                               class="btn btn-danger btn-sm"> <i class="fa fa-reply"></i> Cancel </a>
                        </div>
                    </form>
                </div>
            </div>

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
<script src="<?php echo base_url('web/admin/js') ?>/angular.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="<?= base_url('web/admin') ?>/js/plugins/morris/raphael.min.js"></script>
<script src="<?= base_url('web/admin') ?>/js/plugins/morris/morris.min.js"></script>
<script src="<?= base_url('web/admin') ?>/js/plugins/morris/morris-data.js"></script>

</body>

</html>
