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
    <link href="<?= base_url('web/admin') ?>/css/redactor.css" rel="stylesheet">


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
                    <h1 class="page-header" style="text-transform: capitalize">
                        <?php echo $page->Title; ?>
                        <small>Admin</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a
                                href="<?= base_url('index.php/admin/home'); ?>">Dashboard</a>
                        </li>
                        <li class="active" style="text-transform:capitalize;">
                            <i class="fa fa-file"></i> Add <?php echo $page->Title; ?>'s page
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

                    <form action="<?php echo base_url('index.php/admin/PageController/page_edit') ?>">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" placeholder="Title"
                                   value="<?php echo $page->Title; ?>" required="required" name="title"/>
                        </div>

                        <div class="form-group">
                            <label for="Description">Description</label>
                            <textarea name="description" id="redactor" cols="30" rows="10" required="required">
                                <?php echo $page->Description; ?>
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label for="category">Select Page Category</label>
                            <select name="category" id="category" class="form-control" required="required">

                                <option value="">select category</option>
                                <?php foreach ($sub_category as $row) {
                                    if ($row->id == $page->c_id) {
                                        ?>
                                        <option value="<?php echo $row->id ?>"
                                                selected="selected"> <?php echo $row->name ?></option>
                                    <?php } else { ?>
                                        <option value="<?php echo $row->id ?>"> <?php echo $row->name ?></option>
                                    <?php
                                    }
                                }
                                ?>

                            </select>

                            <input type="hidden" name="id" value="<?php echo $page->id; ?>"/>
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-floppy-o"></i> Save
                            </button>
                            <a href="<?php echo base_url('index.php/admin/PageController/page_list/' . $page->c_id) ?>"
                               class="btn btn-sm btn-danger"><i class="fa fa-reply"></i> Cancel</a>
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
<script src="<?php echo base_url('web/admin/js') ?>/redactor.min.js"></script>
<script>
    $(document).ready(
        function () {
            $('#redactor').redactor({
                imageUpload: '<?php echo base_url('index.php/admin/PageController/upload')?>'
            });
        }
    );
</script>

</body>

</html>
