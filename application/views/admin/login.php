
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <title>Salaam Zindagi</title>
    <link rel="stylesheet" href="<?php echo base_url('web/front')?>/css/login.css">

    <style>
        .forgot a{
            color:#fff;
            text-decoration: none;
            display:block;
            padding-top:10px;
        }

        .forgot a:hover{
            color:#fff;
        }
    </style>
</head>

<body>

<div class="wrapper">
    <div class="container">
        <?php
                if($this->session->flashdata('failure')){
                   ?>
                        <h1><?php echo $this->session->flashdata('failure'); ?></h1>
                <?php
                } else {
                    ?>
                    <h1>Welcome</h1>
                <?php
                }
        ?>

        <form class="form" method="post" action="<?php echo base_url('index.php/admin/LoginController/login')?>">
            <input type="text" name="username" required="required" placeholder="Username">
            <input type="password" name="password" required="required" placeholder="Password">
            <button type="submit" id="login-button">Login</button>
            <br/>
<!--            <div class="forgot">-->
<!--                <a href="#">Forgot Password</a>-->
<!--            </div>-->
        </form>


    </div>


    <ul class="bg-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script>
//    $("#login-button").click(function(event){
//
//
//        $('form').fadeOut(500);
//        $('.wrapper').addClass('form-success');
//    });
</script>




</body>
</html>
