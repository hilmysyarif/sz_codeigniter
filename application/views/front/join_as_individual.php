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
            <h2 class="heading">Join As Individual</h2>
        </div>
    </div>
</div>

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
                <form method="post" id="demoForm" action="<?php echo base_url('index.php/front/front_controller/form_individual')?>">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" required="required" class="txt_box form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required="required" class="txt_box form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="Qualification">Qualification</label>
                        <select name="qualification" id="Qualification" class="form-control">
                            <option value="">--</option>
                            <option value="Under Graduate"> Under Graduate</option>
                            <option value="Graduate"> Graduate</option>
                            <option value="Master"> Master</option>
                            <option value="Master"> Master</option>
                            <option value="Doctorate r"> Doctorate r</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="other">Other Qualification</label>
                        <input type="text" id="other" name="other" required="required" class="txt_box form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" id="location" name="location" required="required" class="txt_box form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="number" id="phone" name="phone" required="required" class="txt_box form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="mobile">Mobile</label>
                        <input type="number" id="mobile" name="mobile" required="required" class="txt_box form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="capacity">In what capacity you want to join</label>
                        <select name="capacity" id="capacity" class="form-control">
                            <option value="">--</option>
                            <option value="Online Supporter"> Online Supporter</option>
                            <option value="Live Supporter"> Live Supporter</option>
                            <option value="Become A Representative"> Become A Representative</option>
                            <option value="Active Member"> Active Member</option>
                            <option value="Other"> Other</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="remark">Other remarks</label>
                        <input type="text" id="remark" name="remark" required="required" class="txt_box form-control"/>
                    </div>

                    <div class="checkbox">
                        <label for="checkbox">
                            <input type="checkbox" name="checkbox" id="checkbox"/>
                            I personally consent to the declaration and the information provided by me is true and
                            correct. I am aware of the fact that I am not applying for any job or paid services.
                        </label>
                    </div>

                    <input type="submit" class="btn_submit" name="submit" value="submit"/>
                </form>
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

<script>
    document.getElementById('demoForm').onsubmit = function() {
        // get reference to required checkbox
        var terms = this.elements['checkbox'];

        if ( !terms.checked ) { // if it's not checked
            // display error info (generally not an alert these days)
            alert( 'Please signify your agreement with our terms.' );
            return false; // don't submit
        }
        return true; // submit
    };
</script>


<!-- CAROSEL SETTING ROTATING TIME -->
<script type="text/javascript">
    $('.carousel').carousel({
        interval: 5000
    });
</script>

</body>
</html>
