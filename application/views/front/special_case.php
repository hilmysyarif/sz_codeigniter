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
            <h2 class="heading">Special Case</h2>
        </div>
    </div>
</div>

<div class="container content">

    <div class="row">
        <div class="col-md-12">
            <div class="title">
                <h2 class="heading">
                    #Bring Back Our Kida
                </h2>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <b>Photo</b>
        </div>
        <div class="col-md-4 ">
            <img src="<?php echo base_url('web/admin/upload/' . $case->file) ?>" class="img-responsive img-thumbnail "
                 alt="<?php echo $case->name; ?>"/>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <b>Name</b>
        </div>
        <div class="col-md-4 ">
            <?php echo $case->name; ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <b>State</b>
        </div>
        <div class="col-md-4">
            <?php echo $case->state; ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <b>City</b>
        </div>
        <div class="col-md-4">
            <?php echo $case->city; ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <b>Description</b>
        </div>
        <div class="col-md-10">
            <?php echo $case->description; ?>
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
    var app = angular.module('MyApp', []);
    app.controller('MyController', function ($http, $scope) {
        $scope.footer = [];
        $http.post('<?php echo base_url('index.php/front/front_controller/footer')?>').success(function (data) {
            $scope.footer = data;
        }).error(function (data) {
            alert(data);
        });

        $scope.subscribe=function(){
            if(typeof $scope.email =='undefined' || $scope.email==''  ){
                alert('Enter the email');
            } else {
                $scope.email='';
                alert('Thanks to subscribe');
            }
        }
    });
</script>

<!-- CAROSEL SETTING ROTATING TIME -->
<script type="text/javascript">
    $('.carousel').carousel({
        interval: 5000
    });
</script>

</body>
</html>
