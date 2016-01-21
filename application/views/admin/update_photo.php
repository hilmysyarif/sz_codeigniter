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
                        Update
                        <small>Photo</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a
                                href="<?= base_url('index.php/admin/home'); ?>">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Update Photo
                        </li>
                    </ol>
                </div>
            </div>

            <!--flash message-->
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

            <form action="<?php echo base_url('index.php/admin/gallerycontroller/update_photo_done') ?>" method="post"
                  enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" placeholder="album name" id="title"
                                   value="<?php echo $photo->title; ?>" required="required"/>
                        </div>

                        <div class="form-group">
                            <label for="Album">Album</label>
                            <select name="album_id" id="album" class="form-control" required="required">
                                <option value="">select album</option>
                                <?php
                                foreach ($albums as $row) {
                                    $sel = '';
                                    if ($row->name == $album->name) {
                                        $sel = 'selected="selected"';
                                    }
                                    ?>
                                    <option <?php echo $sel; ?>
                                        value="<?php echo $row->id; ?>"><?php echo $row->name ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="Image">Image</label><br/>
                            <img src="<?php echo base_url('web/admin/upload/' . $photo->file) ?>"
                                 alt="<?php echo $photo->file; ?>" style="width:100px; height:100px;"/>
                            <input type="hidden" id="id" name="id" value="<?php echo $photo->id; ?>"/>
                        </div>

                        <div class="form-group">
                            <label for="Upload">Upload Photo</label>
                            <input type="file" name="file" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Save</button>

                            <a href="<?php echo base_url('index.php/admin/gallerycontroller') ?>"
                               class="btn btn-primary"><i class="fa fa-reply"></i> Cancel </a>
                        </div>

                    </div>
                </div>
            </form>
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
