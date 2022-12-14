<?php
session_start();
$bal;
$user = $_SESSION['userid'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Account</title>
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
    
    <?php 
 
	if ($_SESSION['validUser'] == "yes"){
        require '../../dbConnect.php';
		$sql = 'SELECT balance FROM bank_user WHERE bank_user_name = :username';
        $query = $conn->prepare($sql);
        $query->bindParam(":username", $user);
        $query->execute();
        while ($row = $query->fetch()){
            $bal = $row['balance'];
        }
        ?>
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
                        <li class="nav-item active">
                           <a class="nav-link" href="services.php">Account Home</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="withDep.php">Withdraw/Deposit</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="logout.php">Log Out</a>
                        </li>>
                     </ul>
                  </div>
               </nav>
            </div>
         </div>
       </div>
    <div class="banner_section layout_padding">
        <h1 class='balance'>Balance: US$
        <?php 
        echo $bal;
        ?>
            </h1>
    </div>
        <?php
    }
	else
	{
		
                ?>
        <h1>Oops you've got to Login</h1>
        <a href="login.php"><h2>Log In</h2></a>
<?php
	}	
        ?>
</body>
</html>