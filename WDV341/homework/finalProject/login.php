<?php 
require '../../dbConnect.php';
require 'encryption.php';
use Cryptor;
session_cache_limiter('none');
session_start();
$inUser;
$inPass;
$enPass;
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Log In</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="Josiah Anderson">
      <!-- owl carousel style -->
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.2.4/assets/owl.carousel.min.css" />
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
       <link rel="stylesheet" href="css/login.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700&display=swap" rel="stylesheet">
      <!-- owl stylesheets --> 
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesheet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
   <body>
      <!--header section start -->
      <div class="header_section">
         <div class="header_bg">
            <div class="container">
               <nav class="navbar navbar-expand-lg navbar-light bg-light">
                  <a class="logo" href="index.html"><img src="images/logo.png"></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                           <a class="nav-link" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="about.html">About</a>
                        </li>
                        <li class="nav-item active">
                           <a class="nav-link" href="login.php">Log In</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="signUp.php">Sign Up</a>
                        </li>>
                     </ul>
                     <div class="call_section">
                        <ul>
                        </ul>
                     </div>
                  </div>
               </nav>
            </div>
         </div>
       </div>
      <!--header section end -->
      <!-- contact section start -->
      <div class="contact_section layout_padding">
         <div class="container-fluid">
             <div class="row">
                 <div class="theLongBox">
             
                       
<?php   
                     
            
            if ($_SESSION['validUser'] == "yes"){
		      header("Location:https://routejosiah.azurewebsites.net/WDV341/homework/finalProject/services.php");
            }
            else {
                if (isset($_POST['submitLogin']) ){
                $cryptor = new Cryptor($encryption_key);
                $inUser = $_POST['userName'];
                $inPass = $_POST['pass'];
                $pass;
                
                $sql = 'SELECT bank_user_name, bank_user_password FROM bank_user WHERE bank_user_name = :username';	
                $query = $conn->prepare($sql);
			    $query->bindParam(":username",$inUser);
                //$query->bindParam(":password", $pass);
			    $query->execute();
                if (!$query->rowCount() == 1){
                    $_SESSION['validUser'] = "no";					
				    $message = "Incorrect Username or Password";
                    echo "<h1 class='h1Log'>$message</h1>"; 
                    
                     ?>
                     <a href="login.php"><p class="pLog">Try Again</p></a>
                     
                     <?php
                }
                    else{
                        
                    
                    
                    while($row = $query->fetch()) {
                        $enPass = $row['bank_user_password'];
        
                    }
                    $pass = $cryptor->decrypt($enPass);
                
                if ($inPass == $pass ){
				$_SESSION['validUser'] = "yes";	
                $_SESSION['userid']=$inUser; header("Location:https://routejosiah.azurewebsites.net/WDV341/homework/finalProject/services.php");
                }
                else {
                    $_SESSION['validUser'] = "no";					
				$message = "Incorrect Username or Password";
                echo "<h1 class='h1Log'>$message</h1>"; 
                    
                     ?>
                     <a href="login.php"><p class="pLog">Try Again</p></a>
                     
                     <?php
                }
                    $query->close();
			         $conn->close();
                    }
                }
                else {
            
                
        
                     ?>
<div class="login-box">
  <h2>Login</h2>
  <form id='sign-up' name='sign-up' method='post'>
    <div class="user-box">
      <input type="text" name="userName">
      <label>Username</label>
    </div>
    <div class="user-box">
      <input type="password" name="pass">
      <label>Password</label>
    </div>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <p><input name="submitLogin" id="submitLogin" value="Login" type="submit" /> <input name="" id="" type="reset" />&nbsp;</p>
  </form>
</div>
                     <?php 
                }
            }
                     ?>
                 </div>

             </div>
         </div>
      </div>
      <!-- contact section end -->
      <!-- footer section start -->
      <div class="footer_section layout_padding">
         <div class="container">
            <div class="subscribe_bt"><a href="signUp.php">Sign Up</a></div>
            <div class="footer_section_2">
               <div class="row">
                  <div class="col-lg-3 margin_top">
                     <div class="call_text"><a href="#"><img src="images/call-icon1.png"><span class="padding_left_15">Call Now +1-800-capitalt </span></a></div>
                     <div class="call_text"><a href="#"><img src="images/mail-icon1.png"><span class="padding_left_15">capitaltwo@gmail.com</span></a></div>
                  </div>
                  <div class="col-lg-3">
                     <div class="information_main">
                        <h4 class="information_text">Information</h4>
                        <p class="many_text">We Are the bank of your dreams!</p>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                     <div class="information_main">
                        <h4 class="information_text">Helpful Links</h4>
                        <div class="footer_menu">
                           <ul>
                              <li><a href="index.html">Home</a></li>
                              <li><a href="about.html">About</a></li>
                              <li><a href="login.php">Log In</a></li>
                              <li><a href="blog.html">Sign Up</a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3">
                     <div class="information_main">
                        <div class="footer_logo"><a href="index.html"><img src="images/logo.png"></a></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- footer section end -->
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">© 2022 All Rights Reserved. <a href="https://html.design">Josiah Anderson</a></p>
         </div>
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript --> 
      <script src="js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
   </body>
</html>

