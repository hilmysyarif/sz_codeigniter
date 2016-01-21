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

<div id="wrapper" ng-app="MyApp" ng-controller="MyController">
    <!-- Navigation -->
    <?php $this->load->view('admin/navbar') ?>
    <div id="page-wrapper">
        <div class="container-fluid">

            <!--put your content here-->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Media
                        <small>Release</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a
                                href="<?= base_url('index.php/admin/home'); ?>">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Media Release
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
                <div class="col-md-2">
                    <div class="form-group">
                        <a href="<?php echo base_url('index.php/admin/mediacontroller/media_add_view') ?>"
                           class="btn btn-sm btn-danger"><i class="fa fa-plus"></i> Add Media</a>
                    </div>
                </div>
                <div class="col-md-2 col-md-offset-8">
                    <input type="text" class="form-control" ng-model="search" placeholder="search..."/>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-responsive table-striped">
                        <tr>
                            <td>Id</td>
                            <td>Description/Title</td>
                            <td>Updated at</td>
                            <td>Action</td>
                        </tr>

                        <tr ng-repeat="item in data|filter:search">
                            <td>{{ item.id }}</td>
                            <td><a target="_blank" href="{{ item.link }}"> {{ item.description|limitTo:30 }} </a></td>
                            <td>{{ item.created_at|formatDate }}</td>
                            <td>
                                <button class="btn btn-sm btn-danger" ng-click="delete(item.id)"><i
                                        class="fa fa-trash-o"></i> Delete
                                </button>
                            </td>

                        </tr>
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
<script>
    var app = angular.module('MyApp', []);
    app.controller('MyController', function ($scope, $http) {

        $scope.data = [];

        /*load data from asynchronous angular request*/
        $http.get('<?php echo base_url('index.php/admin/mediacontroller/media')?>').success(function (data) {
            $scope.data = data;
        }).error(function (data) {
            alert(data);
        });

        /**
         * refresh
         * */

        $scope.refresh = function () {
            $http.get('<?php echo base_url('index.php/admin/mediacontroller/media')?>').success(function (data) {
                $scope.data = data;
            }).error(function (data) {
                alert(data);
            });
        }


        /**
         * Delete data using id of media release news
         * */
        $scope.delete = function (id) {
            if (confirm('Do you really want to delete? ')) {
                $http.post('<?php echo base_url('index.php/admin/mediacontroller/media_delete')?>/' + id).success(function (data) {
                    $scope.refresh();
                }).error(function (data) {
                    alert(data);
                })
            }
        }


    });

    app.filter('formatDate', function ($filter) {
        return function (input) {
            var _date = $filter('date')(new Date(input),
                'MM-dd-yyyy');

            return _date;

        }
    })

</script>

</body>

</html>
