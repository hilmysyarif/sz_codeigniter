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
            <h2 class="heading">Contact Us</h2>
        </div>
    </div>
</div>

<div class="row">
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <div style="overflow:hidden;height:300px;width:100%;">
        <div id="gmap_canvas" style="height:300px;width:100%;"></div>
        <style>#gmap_canvas img {
                max-width: none !important;
                background: none !important
            }</style>
    </div>
    <script type="text/javascript"> function init_map() {
            var myOptions = {zoom: 14, center: new google.maps.LatLng(30.7399738, 76.7567368), mapTypeId: google.maps.MapTypeId.ROADMAP};
            map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
            marker = new google.maps.Marker({map: map, position: new google.maps.LatLng(30.7399738, 76.7567368)});
            infowindow = new google.maps.InfoWindow({content: "<b>Salaam Zindagi</b><br/>Chandigarh<br/>" });
            google.maps.event.addListener(marker, "click", function () {
                infowindow.open(map, marker);
            });
            infowindow.open(map, marker);
        }
        google.maps.event.addDomListener(window, 'load', init_map);</script>
</div>


<div class="container content">


    <div class="row">
        <div class="col-md-5 col-sm-12 col-xs-12">
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
            <div class="title">
                <h2>Contact Us</h2>
                <form action="<?php echo base_url('index.php/front/front_controller/contact_form')?>" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" required="required" class="txt_box form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required="required" class="txt_box form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="mobile">Mobile</label>
                        <input type="text" id="mobile" name="mobile" required="required" class="txt_box form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" name="message" required="required" cols="30" rows="5"
                                  class="form-control"></textarea>
                    </div>

                    <input type="submit" class="btn_submit" name="submit" value="submit"/>
                </form>
            </div>
        </div>

        <div class="col-md-5 col-sm-offset-2  col-sm-12 col-xs-12 col-md-offset-2">
            <br/><br/><br/><br/>
            <p>Helpline Number: +91-9569737309</p>
            <p>(Timing 9:00 Am To 6:00pm)</p>
            <p>Email ID: Info@Salaamzindagi.Org</p>
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
            if(typeof $scope.email =='undefined' && $scope.email==''  ){
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
