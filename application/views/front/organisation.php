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
            <h2 class="heading">Join As Organisation</h2>
        </div>
    </div>
</div>

<!-- Join As Organisation form -->
<div class="container content">

    <div class="row">
        <div class="col-md-5">


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
                <form  method="post" action="<?php echo base_url('index.php/front/front_controller/form_organisation')?>">
                    <div class="form-group">
                        <label for="name">Name of The Organisation</label>
                        <input type="text" id="name" name="name" required="required" class="txt_box form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="type">Type Of Organisation</label>
                        <select name="type" id="type" name="organisation" class="form-control">
                            <option value="">--</option>
                            <option value="School"> School</option>
                            <option value="College"> College</option>
                            <option value="University"> University</option>
                            <option value="Non Profit Organisation"> Non Profit Organisation</option>
                            <option value="Company"> Company</option>
                            <option value="Group Of People"> Group Of People</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="year">Establishment Year</label>
                        <input type="text" id="year" name="year" required="required" class="txt_box form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="functionary">Chief Functionary</label>
                        <input type="text" id="functionary" name="chief" required="required" class="txt_box form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="website">Website Address</label>
                        <input type="url" id="website" name="address" required="required" class="txt_box form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="social">Social Media Address</label>
                        <input type="text" id="social" name="social" required="required" class="txt_box form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="person_name">Name (Contact Person)</label>
                        <input type="text" id="person_name" name="pname" required="required" class="txt_box form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="Designation">Designation</label>
                        <input type="text" id="Designation" name="designation" required="required"
                               class="txt_box form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="number" id="phone" name="phone" required="required" class="txt_box form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="Mobile">Mobile Number</label>
                        <input type="number" id="Mobile" name="mobile" required="required"
                               class="txt_box form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required="required" class="txt_box form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="capacity">In what capacity you want to join</label>
                        <select name="capacity" id="capacity" class="form-control">
                            <option value="">--</option>
                            <option value="Partership"> Partership</option>
                            <option value="Participant"> Participant</option>
                            <option value="Financial Support"> Financial Support</option>
                            <option value="Open A Chapeter"> Open A Chapeter</option>
                        </select>
                    </div>

                    <input type="submit" class="btn_submit" name="submit" value="submit"/>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Join As Organisation form -->




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
