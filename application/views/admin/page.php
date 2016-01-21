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
                    <h1 class="page-header" style="text-transform: capitalize;">
                        <?php echo $category->name; ?>
                        <small>Pages</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a
                                href="<?= base_url('index.php/admin/home'); ?>">Dashboard</a>
                        </li>
                        <li class="active" style="text-transform: capitalize;">
                            <i class="fa fa-file"></i> <?php echo $category->name; ?> Page
                        </li>
                    </ol>
                </div>
            </div>
            <!--end putted your content here-->

            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <button ng-click="enable_add=true" class="btn btn-danger btn-sm"><i class="fa fa-plus"></i> Add
                            Category
                        </button>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <a href="<?php echo base_url('index.php/admin/PageController/page_add_view/' . $category->id) ?>"
                           class="btn btn-danger btn-sm"><i class="fa fa-plus"></i> Add Pages</a>
                    </div>
                </div>

                <div class="col-md-2 col-md-offset-6">
                    <div class="form-group">
                        <input type="text" ng-model="search" class="form-control" placeholder="search...  "/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-responsive">
                        <tr>
                            <td>Id</td>
                            <td>Title</td>
                            <td>Total Pages</td>
                            <td>Action</td>
                        </tr>

                        <tr ng-show="enable_add">
                            <td></td>
                            <td><input type="text" class="form-control" ng-model="name" placeholder="program category"/>
                            </td>
                            <td></td>
                            <td>
                                <button class="btn btn-sm btn-success" ng-click="add()"><i class="fa fa-pencil"></i> Add
                                </button>
                                <button class="btn btn-sm btn-danger" ng-click="enable_add=false"><i
                                        class="fa fa-trash-o"></i> Cancel
                                </button>
                            </td>
                        </tr>

                        <tr ng-repeat="item in data|filter:search">
                            <td>{{ item.id }}</td>
                            <td>
                                <div ng-hide="enable_edit">{{ item.name }}</div>
                                <input type="text" class="form-control" value="{{ item.name }}" ng-model="item.name"
                                       ng-show="enable_edit"/>
                            </td>
                            <td>
                                <a href="<?php echo base_url('index.php/admin/PageController/page_list') ?>/{{ item.id }}">{{
                                    item.count }}</a>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-success" ng-hide="enable_edit"
                                        ng-click="enable_edit=true;"><i class="fa fa-pencil"></i> Edit
                                </button>
                                <button class="btn btn-sm btn-danger" ng-click="delete(item.id)" ng-hide="enable_edit">
                                    <i class="fa fa-trash-o"></i> Delete
                                </button>

                                <button class="btn btn-sm btn-success" ng-show="enable_edit" ng-click="update(item)"><i
                                        class="fa fa-pencil"></i> Update
                                </button>
                                <button class="btn btn-sm btn-danger" ng-click="enable_edit=false"
                                        ng-show="enable_edit"><i class="fa fa-close"></i> Cancel
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

<script>
    var app = angular.module('MyApp', []);
    app.controller('MyController', function ($scope, $http) {
        $scope.data = [];
        $scope.enable_edit = false;
        $scope.enable_add = false;


        $http.get('<?php echo base_url('index.php/admin/PageController/page_category/'.$category->id)?>').success(function (data) {
            $scope.data = data;
        }).error(function (data) {
            alert(data);
        })

        $scope.refresh = function () {
            $http.get('<?php echo base_url('index.php/admin/PageController/page_category/'.$category->id)?>').success(function (data) {
                $scope.data = data;
            }).error(function (data) {
                alert(data);
            });
        }

        $scope.add = function () {

            if (typeof $scope.name == 'undefined' && $scope.name == '') {
                alert('enter the category name?');
                return false;
            } else {
                $scope.data = {'parent':<?php echo $category->id?>, 'name': $scope.name};
                $http.post('<?php echo base_url('index.php/admin/PageController/page_category_add')?>', $scope.data).success(function (data) {
                    $scope.enable_add = false;
                    $scope.name = '';
                    $scope.refresh();
                }).error(function (data) {
                    alert(data);
                });
            }
        }

        $scope.delete = function (id) {
            if (confirm('do you really want to delete this')) {
                $http.get('<?php echo base_url('index.php/admin/PageController/page_category_delete')?>/' + id).success(function (data) {
                    $scope.refresh();
                }).error(function (data) {
                    alert(data);
                });
            }
        }

        $scope.update = function (item) {
            if (typeof $scope.name == 'undefined' && $scope.name == '') {
                alert('enter the category name?');
                return false;
            } else {
                $scope.data = {'id': item.id, 'name': item.name};
                $http.post('<?php echo base_url('index.php/admin/PageController/page_category_update')?>', $scope.data).success(function (data) {
                    $scope.enable_edit = false;
                    $scope.name = '';
                    $scope.refresh();
                }).error(function (data) {
                    alert(data);
                });
            }
        }

    })
</script>
</body>

</html>
