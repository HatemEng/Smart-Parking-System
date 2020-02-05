<?php
  session_start();
	include("includes/header.php");
	include("includes/login.php");
  include("includes/register.php");
 ?>

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
      <!-- image 1 -->
        <div class="item active">
          <img src="includes/img/bg1.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
            <div id="login_content">
              <h1>Smart Parking System</h1>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et 
                dolore magna aliqua. Ut enim ad minim veniam</p>
                <p><a class="btn btn-lg btn-success" href="#" role="button" id="btnLogin" name="login">Sign up today</a></p>
            </div>
                
               <!-- login form -->
            <div id="login" class="content-block">
              <a href="" class="glyphicon glyphicon-off pull-right" id="btnClose"> Close</a>
          <h1 class="Link-style">Login To Your Account</h1>
          <h3>Get your spot before somebody else dose!</h3>
          <form method="post" action="<?php $_PHP_SELF ?>">
            <label for="login-username">Username</label>
            <input type="text" id="login-username" name="username" placeholder="John B.Goode">
            
            <label for="login-password">Password</label>
            <input type="password" id="login-password" name="password" placeholder="123456789">
            
            <input type="submit" value="Login">
            <a href="##" name="register" id="btnRegister">Register</a>
            
          </form>
        </div>
            <!-- end the login form -->

                 <!-- register form -->
          <div id="register" class="content-block">
            <a href="" class="glyphicon glyphicon-off pull-right" id="btnClose"> Close</a>
            <h1 class="Link-style">Get New Account Now</h1>
            <form method="post" action="<?php $_PHP_SELF ?>">
                <label for="register-username">Username</label>
                <input type="text" id="register-username" name="username" placeholder="John B.Goode">
                
                <label for="register-email">Email</label>
                <input type="text" id="register-email" name="email" placeholder="Hatem@gmail.com">
                
                <label for="register-password">Password</label>
                <input type="password" id="register-password" name="password" placeholder="123456789">

                <label for="register-phone">Phone</label>
                <input type="text" id="register-phone" name="phone" placeholder="+9641301482423">

                <input type="submit" value="Create Account">
                 <a href="#" name="BackToLogin" id="btnRegister" class="btnBackToLogin">Back To Login</a>
                
            </form>
        </div>
            <!-- end the register form -->

            </div>
          </div>
        </div>

        <!-- image 2 -->
        <div class="item">
          <img src="includes/img/bg2.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Another example headline.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-success" href="#" role="button">Learn more</a></p>
            </div>
          </div>
        </div>
        <!-- image 3 -->
        <div class="item">
          <img src="includes/img/bg3.jpg" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>One more for good measure.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-success" href="#" role="button">Browse gallery</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div><!-- /.carousel -->

<?php include("includes/footer.php"); ?>