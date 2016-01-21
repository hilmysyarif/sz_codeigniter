<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Salaam Zindagi</title>

    <!--Fancy box css-->
    <link href="<?php echo base_url('web/front/css') ?>/jquery.fancybox.css" rel="stylesheet"
          type="text/css">
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
            <h2 class="heading">Gallery</h2>
        </div>
    </div>
</div>

<div class="container content">
    <div class="row category">
        <div class="col-md-12">
            <ul class="list-inline">
                <li ng-repeat="item in album">
                    <div class="heading btn_about" ng-click="album_photos(item.id)">
                        {{ item.name }}
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="title">
                <h2 class="heading">
                    {{ title }}
                </h2>
            </div>
        </div>
    </div>

    <!-- Gallery -->
    <section class="gallery">
        <div class="row" ng-show="enable_show" >

            <div class="col-md-3 col-sm-3 col-xs-6 nopad" ng-repeat="item in photos" style="position:relative;">
                <div class="thumbnail">
                    <a  href="{{ item.url }}" target="_blank"><img class="grow" src="http://img.youtube.com/vi/{{ item.link }}/0.jpg" style="height:217px;" alt="img12"/></a>
                </div>
            </div>
        </div>

    </section>

    <!-- Gallery -->

</div>




<?php $this->load->view('front/footer'); ?>


<!-- jQuery -->
<script src="<?php echo base_url('web/front/') ?>/js/jquery.js"></script>
<!--Fancy box-->
<script src="<?php echo base_url('web/front/') ?>/js/jquery.fancybox.pack.js?v=2.0.5"></script>
<!-- Angular  -->
<script src="<?php echo base_url('web/front/') ?>/js/angular.min.js"></script>
<!-- angular-sanitize.js -->
<script src="<?php echo base_url('web/front/') ?>/js/angular-sanitize.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url('web/front/') ?>/js/bootstrap.min.js"></script>


<!--fancy box-->
<script>
    $(document).ready(function() {
        $(".fancybox").fancybox();
    });
</script>



<script>
    var app = angular.module('MyApp',[]);
    app.controller('MyController', function ($scope, $http) {
        $scope.footer = [];
        $scope.album=[];
        $scope.title='';
        $scope.photos=[];
        $scope.case=[];
        $scope.enable_show=true;


        $http.post('<?php echo base_url('index.php/front/front_controller/video_album')?>').success(function(data){
            $scope.album=data['albums'];
            $scope.title=data['albums'][0].name;
            $scope.photos=data['photos'];
            $scope.enable_show=true;
        }).error(function(data){
            alert(data);
        })

        /**
         * Album Photos
         * */
        $scope.album_photos=function(id){
            $http.post('<?php echo base_url('index.php/front/front_controller/video_list/')?>/'+id).success(function(data){
                $scope.title=data['albums'].name;
                $scope.photos=data['photos'];
                $scope.enable_show=true;
            }).error(function(data){
                alert(data);
            })
        }



        /**
         * Footer
         * */

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

    })
</script>




<!-- CAROSEL SETTING ROTATING TIME -->
<script type="text/javascript">
    $('.carousel').carousel({
        interval: 5000
    });
</script>

</body>
</html>
