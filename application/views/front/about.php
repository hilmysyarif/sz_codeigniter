<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Salaam Zindagi</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('web/front/') ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url('web/front/') ?>/css/style.css" rel="stylesheet">

    <!-- Full Width Slider  -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('web/front/') ?>/css/full-slider.css">

    <!-- Animate CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('web/front/') ?>/css/animate.css">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url('web/front/') ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet"
          type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet'
          type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body id="page-top" class="index" ng-app="MyApp" ng-controller="MyController">
<!-- Navigation -->
<?php $this->load->view('front/navbar'); ?>


<div class="fix fix_img">
    <img src="<?php echo base_url('web/front/img/fix_img.png') ?>" class="img-responsive" style="width: 100%;" alt=""/>
</div>

<div class="row page-heading">
    <div class="container">
        <div class="page-heading">
            <h2 class="heading">About Us</h2>
        </div>
    </div>
</div>

<div class="">

    <div class="container content">
        <div class="row category">
            <div class="col-md-12">

                <ul class="list-inline">
                    <li ng-repeat="item in category">
                        <div class="heading btn_about" ng-click="about_sub_cat(item.id)">
                            {{ item.name }}
                        </div>
                    </li>
                </ul>

            </div>
        </div>

        <div class="row category" ng-show="enable_category">
            <div class="col-md-12">

                <ul class="list-inline">
                    <li ng-repeat="item in sub_category">
                        <div class="heading btn_about" ng-click="about_category_content($index)">
                            {{ item.Title }}
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="title">
                    <h2 class="heading">
                        {{ content.Title }}
                    </h2>
                </div>
                <div ng-bind-html="content.Description"></div>
            </div>
        </div>
    </div>
</div>




<?php $this->load->view('front/footer'); ?>


<!-- jQuery -->

<script src="<?php echo base_url('web/front/') ?>/js/jquery.js"></script>

<!-- Angular  -->
<script src="<?php echo base_url('web/front/') ?>/js/angular.min.js"></script>
<!-- angular-sanitize.js -->
<script src="<?php echo base_url('web/front/') ?>/js/angular-sanitize.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url('web/front/') ?>/js/bootstrap.min.js"></script>


<script>
    var app = angular.module('MyApp', ['ngSanitize']);
    app.controller('MyController', function ($scope, $http) {

        $scope.enable_category = false;
        $scope.category = [];
        $scope.sub_category = [];
        $scope.data = [];
        $scope.content = '';

        $http.post('<?php echo base_url('index.php/front/front_controller/about_category')?>').success(function (data) {
            $scope.category = data['category'];
            $scope.content = data['content'];
        }).error(function (data) {
            alert(data);
        })

        $scope.about_sub_cat = function (id) {
            $http.post('<?php echo base_url('index.php/front/front_controller/about_sub_cat')?>/' + id).success(function (data) {
                $scope.sub_category = data;
                $scope.enable_category = true;
            }).error(function (data) {
                alert(data);
            })
        }

        $scope.about_category_content = function (index) {
            $scope.content = $scope.sub_category[index];
        }

        $scope.footer = [];
        $http.post('<?php echo base_url('index.php/front/front_controller/footer')?>').success(function (data) {
            $scope.footer = data;
        }).error(function (data) {
            alert(data);
        });

        $scope.subscribe=function(){
            if(typeof $scope.email =='undefined' && $scope.email==''  ){
                alert('Enter the email');
            } else {
                $scope.email='';
                alert('Thanks to subscribe');
            }
        }

    })
</script>






</body>
</html>