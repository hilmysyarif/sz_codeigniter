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
                        <small>Photo</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a
                                href="<?= base_url('index.php/admin/home'); ?>">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Upload Photo
                        </li>
                    </ol>
                </div>
            </div>
            <!--end putted your content here-->



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

            if ($this->session->flashdata('failure')) {
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                            <?php
                            echo $this->session->flashdata('failure');
                            ?>
                        </div>
                    </div>
                </div>
            <?php

            }
            ?>


            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('index.php/admin/gallerycontroller/photo_upload') ?>"
                          method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input required="required" type="text" class="form-control" name="title" required="required"
                                   id="title" placeholder="enter the title"/>
                        </div>

                        <div class="form-group">
                            <label for="album">Album</label>
                            <select required="required" name="album_id" id="album" class="form-control">
                                <option value="">Select Album</option>
                                <?php
                                foreach ($album as $row) {
                                    ?>
                                    <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="file">Images</label>
                            <input type="file" class="form-control" name="files[]" id="file" multiple
                                   required="required"/>
                        </div>

                        <div class="form-group">
                            <br/>
                            <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Save</button>
                            <a href="<?php echo base_url('index.php/admin/gallerycontroller/') ?>"
                               class="btn btn-primary"> <i class="fa fa-reply"></i> Cancel</a>
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

<!-- Morris Charts JavaScript -->
<script src="<?= base_url('web/admin') ?>/js/plugins/morris/raphael.min.js"></script>
<script src="<?= base_url('web/admin') ?>/js/plugins/morris/morris.min.js"></script>
<script src="<?= base_url('web/admin') ?>/js/plugins/morris/morris-data.js"></script>

</body>

</html>
