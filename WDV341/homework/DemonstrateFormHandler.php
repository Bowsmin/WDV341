<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>WDV101 Basic Form Handler Example</title>
</head>

<body>
    <h1>Proccessed Form</h1>
    
    Dear <?php echo $_POST["first_name"]; ?> <?php echo $_POST["last_name"]; ?>,  <br> 
    Thanks for your intrest in <?php  echo $_POST["school_name"]; ?>. <br>
    We have you listed as an <?php  echo $_POST["standing"]; ?> starting this fall. <br>
    You have declared <?php  echo $_POST["selectedMajor"]; ?> as your major. <br>
    Based upon your responses we will provide the following information in our confirmation email to you at <?php  echo $_POST["email"]; ?>. <br>
        
    <?php

        if(isset($_POST['programInfo']) && 
            $_POST['programInfo'] == 'Info') 
        {
            echo "We will contact you with Program Information as soon as possible";
        }
        else
        {
             echo "We will not contact you with Program Information";
        }	 

    ?>
    <br>
    <?php

        if(isset($_POST['programAdvise']) && 
            $_POST['programAdvise'] == 'Advisor') 
        {
            echo "We will put you in touch with a Program Adviser";
        }
        else
        {
             echo "We will not put you in touch with a Program Adviser";
        }	 

    ?>
    <br>
    You have shared the following comments which we will review:<br>
    <?php  echo $_POST["comments"]; ?>
        
        
        
        

</body>
</html>
