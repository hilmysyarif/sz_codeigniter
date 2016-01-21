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
                        <?php echo $category->name; ?>
                        <small>Page</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a
                                href="<?= base_url('index.php/admin/home'); ?>">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> <?php echo $category->name; ?>
                        </li>
                    </ol>
                </div>
            </div>
            <!--end putted your content here-->

            <div class="row">
                <div class="col-md-12">
                    <?php
                    if ($this->session->flashdata('error')) {
                        ?>
                        <div class="alert alert-danger">
                            <?php echo $this->session->flashdata('error') ?>
                        </div>
                    <?php
                    }

                    if ($this->session->flashdata('success')) {
                        ?>
                        <div class="alert alert-success">
                            <?php echo $this->session->flashdata('success') ?>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-responsive">
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>

                        <?php foreach ($pages as $row) {
                            ?>
                            <tr>
                                <td><?php echo $row->id; ?></td>
                                <td><?php echo $row->Title; ?></td>
                                <td>
                                    <a class="btn btn-sm btn-success"
                                       href="<?php echo base_url('index.php/admin/PageController/page_edit_view/' . $row->id) ?>"><i
                                            class="fa fa-check-square-o"></i> Edit</a>
                                    <a class="btn btn-sm btn-primary"
                                       href="<?php echo base_url('index.php/admin/PageController/page_view/' . $row->id) ?>"><i
                                            class="fa fa-eye"></i> View</a>
                                    <a class="btn btn-sm btn-danger"
                                       onclick="if (! confirm('do you want to delete this ?')) { return false; }"
                                       href="<?php echo base_url('index.php/admin/PageController/page_delete/' . $row->id) ?>"><i
                                            class="fa fa-trash-o"></i> Delete</a>
                                </td>
                            </tr>
                        <?php
                        }?>
                    </table>
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
