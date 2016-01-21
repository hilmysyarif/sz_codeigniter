<!-- Email Subscribe -->
<section class="subscribe">
    <div class="row">
        <div class="container">
            <div class="col-md-3 col-sm-4 text-center col-xs-12">
                <div class="title">
                    Subscribe Newsletter
                </div>
            </div>

            <div class="col-md-6 col-sm-4 text-center col-xs-12">
                <input type="email" ng-model="email" class="txt_newsletter" placeholder="Email">
            </div>
            <!-- text box -->

            <div class="col-md-3 col-sm-4 text-center col-xs-12">
                <button ng-click="subscribe()" class="btn_newsletter">SUBSCRIBE</button>
            </div>

        </div>
    </div>
</section><!-- Email Subscribe -->

<!-- Footer -->
<section class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12">
                <ul>
                    <li>Quick Links</li>
                    <li><a href="<?php echo base_url('index.php/front/front_controller/about') ?>">About Us</a></li>
                    <li><a href="<?php echo base_url('index.php/front/front_controller/media') ?>">Media</a></li>
                    <li><a href="<?php echo base_url('index.php/front/front_controller/individual') ?>">Join as
                            Individual</a></li>
                    <li><a href="<?php echo base_url('index.php/front/front_controller/organisation') ?>">Join as
                            Organisation</a></li>
                    <li><a href="<?php echo base_url('index.php/front/front_controller/contact') ?>">Contact Us</a></li>
                </ul>
            </div>

            <div class="col-md-3 col-sm-3 col-xs-12">
                <ul>
                    <li>PROGRAMS</li>
                    <li style="text-transform:capitalize;" ng-repeat="item in footer"><a
                            href="<?php echo base_url('index.php/front/front_controller/program') ?>">{{ item.name
                            }}</a></li>
                </ul>
            </div>

            <div class="col-md-3 col-sm-3 col-xs-12">
                <ul>
                    <li>Contact Us</li>
                    <li><a href="#">Helpline Number: +91-9569737309</a></li>
                    <li><a href="#">(Timing 9:00 am to 6:00pm)</a></li>
                    <li><a href="#">Email ID: info@salaamzindagi.org</a></li>
                </ul>
            </div>

            <div class="col-md-3 col-sm-3 col-xs-12">
                <ul>
                    <li>SOCIAL MEDIA</li>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Google Plus</a></li>
                    <li><a href="#">Linked In</a></li>
                </ul>
            </div>

        </div>
    </div>

    <!-- end social links -->
</section>

<section class="copyright">
    <div class="row">
        <div class="col-md-12 text-center">
            <p>&copy; 2015 Salaam Zindagi Inc. All Rights Reserved.</p>
        </div>
    </div>
</section>

