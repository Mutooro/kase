<?php
session_start();

//connect to db

// $db = new mysqli('localhost','root','','kamasa');
include_once("connect.php");


if($_SERVER['REQUEST_METHOD']=='POST'){

    //get the submitted form data

    $username = $_POST['username'];
    $password = $_POST['password'];

    //getting user from the database

    $stmt = $db->prepare("SELECT * FROM add_user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();

    //verify password
    if(password_verify($password,$user['password'])){
        //log the user in
        $_SESSION['username'] = $user['username'];
        header('location:home.php');
        //exit();

    }else{
        //display an error
        echo '<script> alert(message)</script>';
    }
}

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>About - Unisco - Education Website Template for University, College, School</title>

<script src="../../cdn-cgi/apps/head/OkbNSnEV_PNHTKP2_EYPrFNyZ8Q.js"></script><link rel="stylesheet" href="css/bootstrap.min.css">

<link href="https://fonts.googleapis.com/css?family=Lora:400,700" rel="stylesheet">

<link rel="stylesheet" href="css/font-awesome.min.css">

<link rel="stylesheet" href="css/simple-line-icons.css">

<link rel="stylesheet" href="css/slick.css">
<link rel="stylesheet" href="css/slick-theme.css">
<link rel="stylesheet" href="css/owl.carousel.min.css">

<link href="css/style.css" rel="stylesheet">
</head>
<body>

<div class="about_bg">
<div class="container">
<div class="row">
<div class="col-md-12">
<a href="index.html"><img src="images/responsive-logo.png" class="responsive-logo img-fluid" alt="responsive-logo"></a>
</div>
</div>
<div class="row">
<div class="col-md-12">
<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown">
<span class="icon-menu"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNavDropdown">
<ul class="navbar-nav">
<li class="nav-item">
<a class="nav-link" href="about.html">About<span class="sr-only">(current)</span></a>
</li>

<li class="nav-item">
<a class="nav-link" href="academics.html">Academics</a>
</li>
<li class="nav-logo">
<a href="index.html" class="navbar-brand"><img src="images/logo.png" class="img-fluid" alt="logo"></a>
</li>

<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="login.html#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Pages
</a>
<ul class="dropdown-menu">
<li><a class="dropdown-item" href="index-2.html">Home Style Two</a></li>

<li><a class="dropdown-item" href="events.html">Events</a></li>

 <li><a class="dropdown-item" href="campus-life.html">Campus Life</a></li>

<li><a class="dropdown-item" href="gallery.html">Gallery</a></li>

<li class="dropdown">
<a class="dropdown-item dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="login.html#">Others Pages</a>
<ul class="dropdown-menu dropdown-menu1">

<li><a class="dropdown-item" href="chairman-speech.html">Chairman Speech</a></li>

<li><a class="dropdown-item" href="login.php">Login</a></li>
<li><a class="dropdown-item" href="sign-up.html">Sign Up</a></li>

</ul>
</li>
</ul>
</li>
<li class="nav-item">
<a class="nav-link" href="contact.html">Contact</a>
</li>
</ul>
</div>
</nav>
</div>
</div>
<div class="row">
<div class="col-md-12">
<h1>Login</h1>
</div>
</div>
</div>
</div>


<div class="login">
<div class="container">
<div class="row justify-content-center">
<div class="col-md-6">
<div id="login-overlay" class="modal-dialog">
<div class="modal-content">
<div class="modal-body">
<div class="row">
<div class="col-md-12">
<div class="well">
<form id="loginForm" method="POST" action="../kick/" novalidate="novalidate">
<div class="form-group">
<label for="username" class="control-label">Username</label>
<input type="text" class="form-control" id="username" name="username" value="" required="" title="Please enter you username" placeholder="example@gmail.com">
<span class="help-block"></span>
</div>
<div class="form-group">
<label for="password" class="control-label">Password</label>
<input type="password" class="form-control" id="password" name="password" value="" required="" title="Please enter your password">
<span class="help-block"></span>
</div>
<div class="checkbox">
<label>
 <input type="checkbox" name="remember" id="remember"> Remember login
</label>
</div>
<button type="submit" class="btn btn-warning" id="js-subscribe-btn">LOG IN</button> </form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<footer>
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="subscribe">
<h3>Newsletter</h3>
<form id="subscribeform" action="https://demo.web3canvas.com/themeforest/unisco/php/subscribe.php" method="post">
<input class="signup_form" type="text" name="email" placeholder="Enter Your Email Address">
<button type="submit" class="btn btn-warning">SUBSCRIBE</button>
<div id="js-subscribe-result" data-success-msg="Success, Please check your email." data-error-msg="Oops! Something went wrong"></div>

</form>
</div>
</div>
</div>
<div class="row">
<div class="col-md-3">
<div class="foot-logo">
<a href="index.html">
<img src="images/footer-logo.png" class="img-fluid" alt="footer_logo">
</a>
<p>2016 © copyright
<br> All rights reserved.</p>
</div>
</div>
<div class="col-md-2">
<div class="sitemap">
<h3>Navigation</h3>
<ul>
<li><a href="about.html">About</a></li>
<li><a href="admission-form.html">Admissions </a></li>
<li><a href="https://demo.web3canvas.com/themeforest/unisco/admission.html">Academics</a></li>
<li><a href="research.html">Research</a></li>
<li><a href="contact.html">Contact</a></li>
</ul>
</div>
</div>
<div class="col-md-4">
<div class="tweet_box">
<h3>Tweets</h3>
<div class="tweet-wrap">
<div class="tweet"></div>

</div>
</div>
</div>
<div class="col-md-3">
<div class="address">
<h3>Contact us</h3>
<p><span>Address: </span> Unisco university Albany, NY, USA. 11001</p>
<p>Email : <a href="https://demo.web3canvas.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="6801060e07281d06011b0b07460b0705">[email&#160;protected]</a>
<br> Phone : +91 555 668 986</p>
<ul class="footer-social-icons">
<li><a href="login.html#"><i class="fa fa-facebook fa-fb" aria-hidden="true"></i></a></li>
<li><a href="login.html#"><i class="fa fa-linkedin fa-in" aria-hidden="true"></i></a></li>
<li><a href="login.html#"><i class="fa fa-twitter fa-tw" aria-hidden="true"></i></a></li>
</ul>
</div>
</div>
</div>
</div>
</footer>


<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/jquery.min.js"></script>
<script src="js/tether.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script src="js/slick.min.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/counterup.min.js"></script>
<script src="js/instafeed.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/validate.js"></script>
<script src="js/tweetie.min.js"></script>

<script src="js/subscribe.js"></script>

<script src="js/script.js"></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vb26e4fa9e5134444860be286fd8771851679335129114" integrity="sha512-M3hN/6cva/SjwrOtyXeUa5IuCT0sedyfT+jK/OV+s+D0RnzrTfwjwJHhd+wYfMm9HJSrZ1IKksOdddLuN6KOzw==" data-cf-beacon='{"rayId":"7adf4c1b7b99d739","version":"2023.3.0","r":1,"b":1,"token":"1a2187940c214caa9d3fed19b4904902","si":100}' crossorigin="anonymous"></script>
</body>
</html>
