<?php 
session_cache_limiter('none');
session_start();
require '../dbConnect.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
<title>Login</title>

</head>

<body>
    
    <?php 
 
	if ($_SESSION['validUser'] == "yes"){
		$message = "Welcome Back! $inUser";
    }
	else
	{
		if (isset($_POST['submitLogin']) ){
            
			$inUser = $_POST['logUser'];
			$inPass = $_POST['logPass'];	

			$sql = 'SELECT event_user_name, event_user_password FROM event_user WHERE event_user_name = :username AND event_user_password = :password';				
			
			$query = $conn->prepare($sql);
			$query->bindParam(":username",$inUser);
            $query->bindParam(":password", $inPass);
			$query->execute();
			
			if ($query->rowCount() == 1 )
			{
				$_SESSION['validUser'] = "yes";				
				$message = "Welcome Back! $inUser";
                echo "<h1>$message</h1>";
				?>
    
                <h2>Admin System</h2>
		        <h3>Admin Options</h3>
                <p><a href="to be added">Add New Presenter</a></p>
                <p><a href="to be added">List the Presenters</a></p>
                <p><a href="logout.php">Logout</a></p>
    
                <?php
			}
			else
			{
				$_SESSION['validUser'] = "no";					
				$message = "Sorry, there was a problem with your username or password. Please try again.";
                echo "<h1>$message</h1>";
			}			
			
			$query->close();
			$conn->close();
			
		}
		else
		{ 
                ?>
        <h1>Login WDV341</h1>
    <?php
		}//end else submitted
		
	}//end else valid user
	
//turn off PHP and turn on HTML
?> 
<?php
	if ($_SESSION['validUser'] == "yes")	
	{
        echo "<h1>$message</h1>";
?>
        <h2>Admin System</h2>
		<h3>Admin Options</h3>
        <p><a href="to be added">Add New Presenter</a></p>
        <p><a href="to be added">List the Presenters</a></p>
        <p><a href="logout.php">Logout</a></p>	
        					
<?php
	}
	else
	{
?>
			<h2>Please login to the Administrator System</h2>
                <form name="loginForm" id="loginForm" method="post" action="login.php">
                  <p>Username: <input name="logUser" id="logUser" type="text" /></p>
                  <p>Password: <input name="logPass" id="logPass" type="password" /></p>
                  <p><input name="submitLogin" id="submitLogin" value="Login" type="submit" /> <input name="" id="" type="reset" />&nbsp;</p>
                </form>
                
<?php 
	}		
?>
</body>
</html>