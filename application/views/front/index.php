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
    <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index" ng-app="MyApp" ng-controller="MyController">

<!--<div id="tubular-container" style="overflow: hidden; position: fixed; z-index: 1; width: 100%; height: 100%"><iframe id="tubular-player" style="position: absolute; width: 1509px; height: 849px; left: 0px; top: -293px;" frameborder="0" allowfullscreen="1" title="YouTube video player" width="1526" height="859" src="https://www.youtube.com/embed/ab0TSkLe-E0?controls=0&amp;showinfo=0&amp;modestbranding=1&amp;wmode=transparent&amp;enablejsapi=1&amp;origin=http%3A%2F%2Fwww.seanmccambridge.com"></iframe></div>-->

<!-- Navigation -->
<?php $this->load->view('front/navbar'); ?>

<!-- Full Page Image Background Carousel Header -->
<?php $this->load->view('front/banner'); ?>

<!-- About Us -->
<section id="about_us">
    <div class="about_us">
        <div class="container">
            <div class="row wow slideInUp">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading set_font">Salaam Zindagi,India</h2>
                </div>
            </div>

            <div class="row text-center wow slideInLeft">
                <p>
                    <b>Salaam Zindagi Charitable Trust, an institution,</b> established in 2008 with a vision “Safe, Secure,
                    Protected and Healthy Environment for All”. It was brought into existence to serve as a link between
                    those who have resources to share and those who are deprived of such resources and are in dire need
                    of help. This organisation, through its various unique programs, is serving the humanity in all the
                    possible ways and means. It is actively working in the fields of Health, Education and Community
                    Development. It extends its support for the CAUSE, be it a help to the victims of Natural Disaster,
                    financial support to a poor patient, Women and Child Welfare, Community rehabilitation or awareness
                    campaigns. Till today, we have served many patients suffering from major ailments/disorders who
                    needed support - FINANCIAL OR EMOTIONAL. We are not only providing financial support for major
                    surgeries/treatments/operations but also after surgery.operation medical treatment. Our aim is to
                    outreach the boundaries and extend our support to the needy patients across the world.
                </p>
            </div>

            <div class="row text-center">
                <a href="<?php echo base_url('index.php/front/front_controller/about') ?>"
                   class="btn flat  btn-primary">READ MORE</a>
            </div>
        </div>
    </div>
</section>
<!-- About Us -->

<style>
    #bg_container {
        overflow: hidden;
    }

    #bg {
        width: 100%;
    }
</style>

<!-- Programs -->
<section>
    <div class="special_case" style="position:relative; padding:0px;">

        <div id="bg_container">

                        <div id="bg"><iframe    title="YouTube video player"  width="1526" height="859" src="https://www.youtube.com/embed/ab0TSkLe-E0?loop=1&amp;controls=0&amp;showinfo=0&amp;modestbranding=1&amp;wmode=transparent&amp;enablejsapi=1&amp;origin=http%3A%2F%2Fwww.seanmccambridge.com&amp;autoplay=1&amp;disablekb=1&amp;rel=0"></iframe></div>
        </div>

        <div style=" position:absolute; top:15%;  color:#FFF;">
            <div class="container">
                <div class="row wow slideInUp">
                    <div class="col-md-12 text-center">
                        <h2 class="section-heading">Programs</h2>
                    </div>
                </div>
            </div>

            <div id="carousel-example" class="carousel case_slider slide" data-ride="carousel">


                <!-- Wrapper for slides -->
                <div class="row">
                    <div class="col-md-offset-2 col-xs-offset-2 col-md-8 col-xs-8">
                        <!-- bootstrap slider -->
                        <div class="carousel-inner wow slideInRight">

                            <div class="item active ">
                                <div class="carousel-content">
                                    <div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <p class="text-center" style="font-size: 20px;;">Help Nepal
                                                (Earthquake-2015)</p>

                                            <p>We are all just coming to terms with the fact that Nepal has been hit
                                                with
                                                massive, devastating earthquake on 25th April’15. In this traumatic act
                                                of
                                                god; 8.1 million people have been vastly affected according to a UN
                                                report.
                                                However, the true extent of the damage from the earthquake is still
                                                unknown
                                                as reports keep filtering in from remote areas, some of which remain
                                                entirely cut-off.</p>

                                            <p class="text-center">
                                                <a href="<?php echo base_url('index.php/front/front_controller/program') ?>/{{ item.id }}"
                                                   class="btn btn-sm flat btn-success">READ MORE</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="carousel-content">
                                    <div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <p class="text-center" style="font-size: 20px;;">Uttahrakhand
                                                Disaster-2013</p>

                                            <p>Under the banner, We also provided floods rehabilitation to Uttarakhand
                                                victims in 2013. We had a tie-up with startup Room n House. We
                                                approached
                                                people in Dehradun, asked them to list their properties on the startup
                                                site,
                                                and offered to rehabilitate the victims by giving them a place to stay
                                                for
                                                initial few days. Through the collaboration, we were able to provide
                                                accommodation to 153 families. Through other means, we were able to
                                                provide
                                                shelter to 50 families more. This way, we were able to rehabilitate
                                                flood
                                                victims for initial few days</p>

                                            <p class="text-center">
                                                <a href="<?php echo base_url('index.php/front/front_controller/program') ?>/{{ item.id }}"
                                                   class="btn btn-sm flat btn-success">READ MORE</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="carousel-content">
                                    <div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <p class="text-center" style="font-size: 20px;;">Jammu Kashmir Floods</p>

                                            <p>
                                                At the time of Jammu and Kashmir floods. Our Founder-CEO was present
                                                there
                                                and was the witness of the disaster. He came back and built a special
                                                team
                                                to help out the flood victims. With the support of Indian Air Force, we
                                                sent
                                                across the relief material and was distributed by Army Jawans.
                                                Later,Salaam
                                                Zindagi along with the Department of Education, Chandigarh and State NSS
                                                Cell UT has initiated a relief material collection. With the help of
                                                various
                                                Stakeholders like
                                            </p>

                                            <p class="text-center">
                                                <a href="<?php echo base_url('index.php/front/front_controller/program') ?>/{{ item.id }}"
                                                   class="btn btn-sm flat btn-success">READ MORE</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <a class="left  carousel-control" href="#carousel-example" data-slide="prev"><span
                        class="icon-prev black"></span></a>
                <a class="right carousel-control" href="#carousel-example" data-slide="next"><span
                        class="icon-next black"></span></a>
            </div>
        </div>
        <!-- Bootstrap Carousel Slider -->
    </div>
</section>
<!-- Programs -->

<!--Media -->
<section style="background: #f9f9f9; font-size: 16px;;">
    <div class="special_case">
        <div class="container">
            <div class="row wow bounceInLeft">
                <div class="col-md-12 text-center">
                    <h2 class="section-heading">Media</h2>
                    <br/><br/>
                </div>
            </div>

            <div class="row ">
                <div id="example">

                    <ul>
                        <?php foreach ($media as $row) {

                            ?>
                            <li>
                                <div class="news_tkr">
                                    <?php echo $row->description; ?>
                                    <br/>
                                    <?php echo date('d-m-Y ', strtotime($row->created_at)) ?>
                                </div>
                            </li>
                        <?php

                        }?>
                    </ul>


                </div>
            </div>
            <div class="row">
                <div class="container">
                    <p class="text-center"><a href="<?php echo base_url('index.php/front/front_controller/media') ?>"
                                              class="btn btn-sm  flat btn-danger">VIEW ALL</a></p>
                </div>
            </div>

        </div>
    </div>


</section>

<!-- Gallery -->
<section class="gallery wow slideInUp">
    <div class="row">

        <div class="col-md-3 col-sm-3 col-xs-6 nopad" ng-repeat="item in gallery | limitTo: 8 " style="position:relative;">
            <div class="thumbnail" style="position:relative;">
                <a href="<?php echo base_url('index.php/front/front_controller/gallery') ?>">
                    <img class="grow"src="<?php echo base_url('web/admin/upload') ?>/{{ item.file }}" alt="img12"/>
                      <div class="img_hover">View ALL</div>
                </a>
            </div>
        </div>

    </div>
</section>
<!-- Gallery -->

<!-- NGO VIDEO -->
<section class="videos">
    <div class="row">
        <div class="container">
            <div class="col-md-6 wow slideInLeft col-sm-6 col-xs-12">
                <h2 class=" section-heading text-justify">VIDEO</h2>

                <p>Dear Mr. Peace brings together the vibrant voices of refugees in a call-out to action for Peace One
                    Day, a day for individuals to become part of a global commitment toward community action and
                    life-saving activities. The video, starring the Dadaab All Stars and local camp community was made
                    in a record seven days, right from song composition to the final cut.The video, starring the Dadaab
                    All Stars and local camp community was made in a record seven days, right from song composition to
                    the final cut.</p>

                <p>
                    <a href="<?php echo base_url('index.php/front/front_controller/video') ?>"
                       class="btn btn-sm  flat btn-danger">READ MORE</a>
                </p>
            </div>
            <div class="col-md-6 wow slideInRight col-sm-6 col-xs-12 video-wraper">

                <!-- NGO Responsive Iframe Video -->
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" type="text/html" allowfullscreen=""
                            src="http://www.youtube.com/embed/tFvfzsnZpHo?enablejsapi=1&amp;showinfo=0&amp;theme=light&amp;rel=0&amp;modestbranding=1&amp;autohide=1&amp;color=white"
                            frameborder="0"></iframe>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- NGO VIDEO -->

<!-- #bring back out Kids -->
<section class="bring-back">
    <div class="row">
        <div class="container">
            <div class="col-md-8">
                <div class="section-heading title">
                    #BRING BACK OUR KIDS
                </div>
            </div>
        </div>
    </div>
</section>
<!-- #bring back out Kids -->

<?php $this->load->view('front/footer'); ?>

<!-- jQuery -->
<script src="<?php echo base_url('web/front/') ?>/js/jquery.js"></script>
<!-- Angular  -->
<script src="<?php echo base_url('web/front/') ?>/js/angular.min.js"></script>
<!-- angular-sanitize.js -->
<script src="<?php echo base_url('web/front/') ?>/js/angular-sanitize.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url('web/front/') ?>/js/bootstrap.min.js"></script>
<!--<script src="--><?php //echo base_url('web/front/') ?><!--/js/wow.min.js"></script>-->
<script src="<?php echo base_url('web/front/') ?>/js/wow.js"></script>
<script>
    new WOW().init();
</script>
<script src="http://richhollis.github.com/vticker/js/jquery-1.7.2.min.js"></script>
<script src="http://richhollis.github.com/vticker/downloads/jquery.vticker.js?v=1.15"></script>
<script>
    $(function () {
        $('#example').vTicker();
    });

    // This code is called by the YouTube API to create the player object
    function onYouTubeIframeAPIReady(event) {
        player = new YT.Player('youTubePlayer', {
            events: {

            }
        });
    }
</script>

<script>
    var app = angular.module('MyApp', ['ngSanitize']);
    app.controller('MyController', function ($http, $scope) {
        $scope.footer = [];
        $scope.data = [];
        $scope.gallery = [];
        $scope.media = [];
        $scope.program = [];


        /*footer*/
        $http.post('<?php echo base_url('index.php/front/front_controller/footer')?>').success(function (data) {
            $scope.footer = data;
        }).error(function (data) {
            alert(data);
        });

        /**
         * Gallery
         * */

        $http.post('<?php echo base_url('index.php/front/front_controller/gallery_index')?>').success(function (data) {
            $scope.gallery = data;
        }).error(function (data) {
            alert(data);
        });


        /**
         *   special case
         **/
        $http.post('<?php echo base_url('index.php/front/front_controller/special_case')?>').success(function (data) {
            $scope.data = data;
            console.log(data);
        }).error(function (data) {
            alert(data);
        });

        /**
         * media
         * */

        $http.post('<?php echo base_url('index.php/front/front_controller/media_index')?>').success(function (data) {
            $scope.media = data;
            console.log(data);
        }).error(function (data) {
            alert(data);
        });

        /**
         * Program Index
         * */

        $http.post('<?php echo base_url('index.php/front/front_controller/program_index')?>').success(function (data) {
            $scope.program = data;
        }).error(function (data) {
            alert(data);
        });

        $scope.subscribe = function () {
            if (typeof $scope.email == 'undefined' || $scope.email == '') {
                alert('Enter the email');
            } else {
                $scope.email = '';
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