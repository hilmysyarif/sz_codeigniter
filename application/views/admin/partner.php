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
    <link href="<?= base_url('web/admin') ?>/css/tablesort.css" rel="stylesheet">

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
                        Partners
                        <!--<small>Admin</small>-->
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a
                                href="<?= base_url('index.php/admin/home'); ?>">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Partner List
                        </li>
                    </ol>
                </div>
            </div>

            <!--add partner and searching btn-->
            <div class="row">
                <div class="col-md-1">
                    <div class="form-group">
                        <button class="btn btn-danger btn-sm" ng-click="enable_add=true;"><i class="fa fa-plus"></i> Add
                        </button>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        <a href="<?php echo base_url('index.php/admin/partner_controller/partner_link_add_view') ?>"
                           class="btn btn-sm btn-danger"><i class="fa fa-plus"></i> Add Links</a>
                    </div>
                </div>

                <div class="col-md-2 col-md-offset-8">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="search" ng-model="search"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-responsive table-striped">
                        <tr>
                            <td>Id</td>
                            <td>Partner</td>
                            <td>Link</td>
                            <td>Action</td>
                        </tr>

                        <tr ng-show="enable_add">
                            <td></td>
                            <td><input type="text" ng-model="name" class="form-control"/></td>
                            <td></td>
                            <td>
                                <button class="btn btn-sm btn-success" ng-click="add()"><i class="fa fa-floppy-o"></i>
                                    Add
                                </button>
                                <button class="btn btn-sm btn-danger" ng-click="enable_add=false"><i
                                        class="fa fa-close"></i> Cancel
                                </button>
                            </td>
                        </tr>

                        <tr ng-repeat="item in data|filter:search">
                            <td>{{ item.id }}</td>
                            <td>
                                <div ng-hide="enable_edit">{{ item.name }}</div>
                                <input type="text" class="form-control" placeholder="enter partner name"
                                       ng-model="item.name" ng-show="enable_edit"/>
                            </td>
                            <td>
                                <a href="<?php echo base_url('index.php/admin/partner_controller/partner_link/') ?>/{{ item.id}}">{{
                                    item.count}}</a></td>
                            <td>
                                <button class="btn btn-sm btn-success" ng-hide="enable_edit"
                                        ng-click="enable_edit=true;"><i class="fa fa-check-square-o"></i> Edit
                                </button>
                                <button class="btn btn-sm btn-danger" ng-hide="enable_edit" ng-click="delete(item.id)">
                                    <i class="fa fa-close"></i> Delete
                                </button>

                                <button class="btn btn-sm btn-success" ng-show="enable_edit"
                                        ng-click="update(item)?enable_edit=false:0"><i class="fa fa-check-square-o"></i>
                                    Update
                                </button>
                                <button class="btn btn-sm btn-danger" ng-show="enable_edit"
                                        ng-click="enable_edit=false;"><i class="fa fa-close"></i> Cancel
                                </button>
                            </td>
                        </tr>
                    </table>
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
<script src="<?php echo base_url('web/admin/js') ?>/angular-tablesort.js"></script>

<!-- Morris Charts JavaScript -->
<script src="<?= base_url('web/admin') ?>/js/plugins/morris/raphael.min.js"></script>
<script src="<?= base_url('web/admin') ?>/js/plugins/morris/morris.min.js"></script>
<script src="<?= base_url('web/admin') ?>/js/plugins/morris/morris-data.js"></script>


<script>
    var app = angular.module('MyApp', []);
    app.controller('MyController', function ($scope, $http) {

        $scope.enable_add = false;
        $scope.enable_edit = false;
        $scope.data = [];


        $http.get('<?php echo base_url('index.php/admin/partner_controller/partner')?>').success(function (data) {
            $scope.data = data;
        }).error(function (data) {
            alert(data);
        });


        /*refresh after every event occurence */
        $scope.refresh = function () {
            $http.get('<?php echo base_url('index.php/admin/partner_controller/partner')?>').success(function (data) {
                $scope.data = data;
            }).error(function (data) {
                alert(data);
            });
        }

        /*add to partner to database*/
        $scope.add = function () {
            if (typeof $scope.name == 'undefined' || $scope.name == '') {
                alert('please enter the partner name');
                return 0;
            }

            /*add to partner table */
            $scope.data = {'name': $scope.name};
            $http.post('<?php echo base_url('index.php/admin/partner_controller/partner_add')?>', $scope.data).success(function (data) {
                $scope.enable_add = false;
                $scope.name='';
                $scope.refresh();
            }).error(function (data) {
                alert(data);
            });
        }

        /*delete function*/
        $scope.delete = function (id) {
            if (confirm('Do you really want to delete this album ?')) {
                $http.post('<?php echo base_url('index.php/admin/partner_controller/partner_delete')?>/' + id).success(function (data) {
                    $scope.refresh();
                }).error(function (data) {
                    alert(data);
                });
            }
        }

        /*updation*/
        $scope.update = function (item) {

            if (item.name == '') {
                alert('please enter the partner name');
                return 0;
            } else {
                $scope.data = {'id': item.id, 'name': item.name};
                $http.post('<?php echo base_url('index.php/admin/partner_controller/partner_edit')?>', $scope.data).success(function (data) {
                    $scope.refresh();
                    return 1;
                }).error(function (data) {
                    alert(data);
                });
            }
        }
    })
</script>


</body>

</html>
