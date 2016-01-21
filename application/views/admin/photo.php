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

<body ng-app="MyApp" ng-controller="MyController">

<div id="wrapper">
    <!-- Navigation -->
    <?php $this->load->view('admin/navbar') ?>
    <div id="page-wrapper">
        <div class="container-fluid">

            <!--put your content here-->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Photo
                        <small>Albums</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a
                                href="<?= base_url('index.php/admin/home'); ?>">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Albums
                        </li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-1">
                    <div class="form-group">
                        <button class="btn btn-sm btn-danger" ng-click="add_enable=true;"><i class="fa fa-plus"></i> Add
                        </button>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        <a href="<?php echo base_url('index.php/admin/gallerycontroller/load_photo_page') ?>"
                           class="btn btn-sm btn-danger"><i class="fa fa-plus"></i> Add Photo</a>
                    </div>
                </div>

                <div class="col-md-2 col-md-offset-8">
                    <input type="text" ng-model="search" class="form-control" placeholder="search...."/>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped responsive">

                        <tr>
                            <td>Id</td>
                            <td>Album name</td>
                            <td>Total Photos</td>
                            <td>Action</td>
                        </tr>


                        <tr ng-show="add_enable">
                            <td></td>
                            <td>
                                <input placeholder=" album name" type="text" ng-model="name" class="form-control"/>
                            </td>
                            <td></td>
                            <td>
                                <button class="btn btn-sm btn-success" ng-click="add()"><i class="fa fa-plus"></i> Add
                                </button>
                                <button class="btn btn-sm btn-danger" ng-click="add_enable=false;"><i
                                        class="fa fa-times"></i> Cancel
                                </button>
                            </td>
                        </tr>


                        <tr ng-repeat="item in data|filter:search">
                            <td>{{item.id}}</td>
                            <td>
                                <div ng-hide="edit_enable">{{item.name}}</div>
                                <input type="text" class="form-control" ng-model="item.name" ng-show="edit_enable"/>
                            </td>
                            <td>
                                <a href="<?php echo base_url('index.php/admin/gallerycontroller/view_photos/{{item.id}}') ?>">{{item.count}}</a>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-success" ng-hide="edit_enable"
                                        ng-click="edit_enable=true;"><i class="fa fa-check-square-o"></i> Edit
                                </button>
                                <button class="btn btn-sm btn-danger" ng-hide="edit_enable" ng-click="delete(item.id)">
                                    <i class="fa fa-times"></i> Delete
                                </button>

                                <button class="btn btn-sm btn-success" ng-show="edit_enable"
                                        ng-click="update(item.id,item.name)"><i class="fa fa-check"></i> Update
                                </button>
                                <button class="btn btn-sm btn-danger" ng-show="edit_enable"
                                        ng-click="edit_enable=false;"><i class="fa fa-times"></i> Cancel
                                </button>
                            </td>
                        </tr>


                    </table>
                </div>
            </div>

            <div class="row" ng-show="show_status">
                <div class="col-md-12 text-center">
                    No any record
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
<script src="<?php echo base_url('web/admin/js') ?>/angular.min.js"></script>
<!-- Morris Charts JavaScript -->
<script src="<?= base_url('web/admin') ?>/js/plugins/morris/raphael.min.js"></script>
<script src="<?= base_url('web/admin') ?>/js/plugins/morris/morris.min.js"></script>
<script src="<?= base_url('web/admin') ?>/js/plugins/morris/morris-data.js"></script>


<script>
    var app = angular.module('MyApp', []);
    app.controller('MyController', function ($scope, $http) {

        $scope.show_status = false;
        $scope.add_enable = false;
        $scope.data = [];
        $scope.edit_enable = false;

        $http.get('<?= base_url('index.php/admin/gallerycontroller/getalbum')?>').success(function (data) {
            if (data.status == "empty") {
                $scope.show_status = true;
            } else {
                $scope.data = data;
            }
        }).error(function (data) {
            alert(data);
        });

        /**
         * refresh
         * */
        $scope.refresh = function () {
            $http.get('<?= base_url('index.php/admin/gallerycontroller/getalbum')?>').success(function (data) {
                if (data.status == "empty") {
                    $scope.show_status = true;
                } else {
                    $scope.data = data;
                }
            }).error(function (data) {
                alert(data);
            });
        }


        /**
         * add
         * */
        $scope.add = function () {
            if (typeof $scope.name == 'undefined' || $scope.name == '') {
                alert('enter album name');
                return;
            }

            $scope.data = {'name': $scope.name};
            $http.post('<?= base_url('index.php/admin/gallerycontroller/createalbum')?>', $scope.data).success(function (data) {
                $scope.add_enable = false;
                $scope.name = '';
                $scope.refresh();
            }).error(function (data) {
                alert(data);
            });

        };
        /*end add function*/

        /**
         * delete
         * */

        $scope.delete = function (id) {
            if (confirm('Do you really want to delete this album ?')) {

                $scope.data = {'id': id}
                $http.post('<?php echo base_url('index.php/admin/gallerycontroller/album_delete')?>', $scope.data).success(function (data) {
                    $scope.refresh();
                }).error(function (data) {
                    alert(data);
                });
            }

        }


        /**
         * update album name
         * */

        $scope.update = function (id, name) {
            if (typeof name == 'undefined' || name == '') {
                alert('enter album name');
                return false;
            }
            $scope.data = {'id': id, 'name': name};
            $http.post('<?php echo base_url('index.php/admin/gallerycontroller/update_album')?>', $scope.data).success(function (data) {
                $scope.edit_enable = false;
                $scope.refresh();
            }).error(function (data) {
                alert(data);
            });
        }

    });
</script>


</body>

</html>
