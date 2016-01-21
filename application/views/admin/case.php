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
                        Special
                        <small>Cases</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a
                                href="<?= base_url('index.php/admin/home'); ?>">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Cases
                        </li>
                    </ol>
                </div>
            </div>
            <!--end putted your content here-->

            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">{{ view_data.name }}</h4>
                        </div>
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-md-2">
                                    <label for="name">Photo</label>
                                </div>
                                <div class="col-md-10">
                                    <img src="<?php echo base_url('web/admin/upload') ?>/{{ view_data.file }}"
                                         alt="{{ view_data.file }}" class="img-thumbnail"
                                         style="height:100px; width:100px;"/>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <label for="name">Name</label>
                                </div>
                                <div class="col-md-10">
                                    {{view_data.name}}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <label for="name">State</label>
                                </div>
                                <div class="col-md-10">
                                    {{view_data.state}}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <label for="name">City</label>
                                </div>
                                <div class="col-md-10">
                                    {{view_data.city}}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <label for="name">Address</label>
                                </div>
                                <div class="col-md-10">
                                    {{view_data.address}}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <label for="name">Description</label>
                                </div>
                                <div class="col-md-10">
                                    {{view_data.description}}
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->


            <div class="row">
                <div class="col-md-1">
                    <div class="form-group">
                        <a href="<?php echo base_url('index.php/admin/case_controller/case_add_view') ?>"
                           class="btn btn-sm btn-danger"><i class="fa fa-plus"></i> Add</a>
                    </div>
                </div>

                <div class="col-md-2 col-md-offset-9">
                    <div class="form-group">
                        <input type="text" placeholder="search.." ng-model="search" class="form-control"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-responsive table-striped">
                        <tr>
                            <th>Id</th>
                            <th>name</th>
                            <th>State</th>
                            <th>City</th>
                            <th>Address</th>
                            <th>description</th>
                            <th>Photo</th>
                            <th>Created_at</th>
                            <th>Action</th>
                        </tr>

                        <tr ng-repeat="item in data |filter:search">
                            <td>{{ item.id }}</td>
                            <td>{{ item.name }}</td>
                            <td>{{ item.state }}</td>
                            <td>{{ item.city }}</td>
                            <td>{{ item.address|limitTo:20 }}</td>
                            <td>{{ item.description|limitTo:20 }}</td>
                            <td><img src="<?php echo base_url('web/admin/upload') ?>/{{ item.file }}"
                                     alt="{{ item.file }}" class="img-thumbnail" style="height:100px; width:100px;"/>
                            </td>
                            <td>{{ item.created_at|formatDate }}</td>
                            <td>
                                <button class="btn btn-sm btn-success" ng-click="case_view(item.id)"><i
                                        class="fa fa-eye"></i> View
                                </button>
                                <a href="<?php echo base_url('index.php/admin/case_controller/case_edit_view') ?>/{{ item.id }}"
                                   class="btn btn-sm btn-primary"><i class="fa fa-check-square-o"></i> Edit</a>
                                <button ng-click="delete(item.id)" class="btn btn-sm btn-danger"><i
                                        class="fa fa-close"></i> Delete
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
        $scope.view_data = [];

        //load data controller:case_controller method:case
        $http.get('<?php echo base_url('index.php/admin/case_controller/cases')?>').success(function (data) {
            $scope.data = data;
        }).error(function (data) {
            alert(data);
        })

        // refresh
        $scope.refresh = function () {
            //load data controller:case_controller method:case
            $http.get('<?php echo base_url('index.php/admin/case_controller/cases')?>').success(function (data) {
                $scope.data = data;
            }).error(function (data) {
                alert(data);
            })
        }

        //load data controller:case_controller method:delete parameter:case id
        $scope.delete = function (id) {
            if (confirm('do you really want to delete this case')) {
                $http.post('<?php echo base_url('index.php/admin/case_controller/case_delete')?>/' + id).success(function (data) {
                    $scope.refresh();
                }).error(function (data) {
                    alert(data);
                })
            }
        }

        /*load model to view case*/
        $scope.case_view = function (id) {
            $http.post('<?php echo base_url('index.php/admin/case_controller/case_view')?>/' + id).success(function (data) {
                $scope.view_data = data;
                $('#myModal').modal('show');
            }).error(function (data) {
                alert(data);
            })
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
