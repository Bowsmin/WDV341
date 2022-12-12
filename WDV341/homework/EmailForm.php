<?php
require_once('functions.php');
$problem = false;
$theName;
$theEmail;
$emailSend;
$subject1 = "Contact Email Form";
$subject2 = "Conformation Email"; 
$headers = 'From: phpcontactform@example.com';
$myEmail = "josiah2000anderson@gmail.com";
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>WDV341 Email Form</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <style>
        .visually-hidden {
  border: 0 !important;
  clip: rect(0 0 0 0) !important;
  height: 1px !important;
  margin: -1px !important;
  overflow: hidden !important;
  padding: 0 !important;
  position: absolute !important;
  width: 1px !important;
}
        
        *,:after,:before{-moz-box-sizing:border-box;-webkit-box-sizing:border-box;box-sizing:border-box}body{font:normal 15px/25px 'Open Sans',Arial,Helvetica,sans-serif;color:#444;text-align:left}h1,h2,h3{font-weight:400}h1{font:normal 40px/120px 'Open Sans',Arial,Helvetica,sans-serif;text-align:center;color:#444;margin:0}h1 span{color:#484c9b}h2{font-size:25px;line-height:30px;color:#484c9b;margin:50px 0 10px}h3{font-size:18px;line-height:35px;margin:50px 0 0}a{color:#484c9b;text-decoration:none}a:focus,a:hover{text-decoration:underline}p{margin:0 0 2rem}p span{color:#aaa}header{width:98%;margin:40px auto 0;border-bottom:1px solid #ddd;padding-bottom:40px;text-align:center}header p{margin:0}section{width:95%;max-width:910px;margin:40px auto}pre{background:#f9f9f9;padding:10px;font-size:12px;border:1px solid #eee;white-space:pre-wrap;border-radius:10px}table{border:1px solid #eee;background:#f9f9f9;width:100%;border-collapse:collapse;border-spacing:0;margin-bottom:3rem}thead{background:#5965af;color:#fff}tbody tr td,thead td{padding:.5rem .75rem}tbody tr:nth-child(even){background:#efefef}tbody tr td:first-child{padding-left:1.25rem}tbody tr td:first-child,tbody tr td:nth-child(3),thead td:first-child,thead td:nth-child(3){width:15%}tbody tr td:nth-child(2),thead td:nth-child(2){width:20%}tbody tr td:last-child,thead td:last-child{width:50%}@media only screen and (min-width:768px){body{font-size:20px;line-height:30px}h2{font-size:30px;line-height:45px}h3{font-size:22px;line-height:45px;margin-top:50px}p{margin-bottom:2rem}h1{font-size:60px}pre{padding:20px;font-size:15px}}
    </style>
</head>

<body>
    <header>
        <h1>Email Form</h1>
    </header>

    <section>
        <?php 
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
            
            if ($_POST['honeypot'] == 1) {
                $problem = TRUE;
            }
            
            if ($problem){
                echo "<p>We've recived it</p>";
            }
            else {
                ?>
                    <h1>Thank you we have received your information</h1>
                    <p>We will contact you soon for the reasons you have stated. <br> Thank you.</p>
                <?php
             
                $emailSend = "Thank you we have received your information. We will contact you soon for the reasons stated in the form. Thank you.";
                $theEmail = $_POST['email'];
                mail($theEmail, $subject1, $emailSend, $headers);
                $conEmail = "Received from $theEmail";
                mail($myEmail, $subject12, $conEmail, $headers);
                
            }
        }
        
        else {
            
            ?>
            <h2>Apply Below</h2>
            <form id='email_form' name='email_form' method='post'>
            <label for='name'>Contact Name: </label><input type='text' name='name' id="nm">
            <label for='email'>Email Address: </label><input type='text' name='email' id="em">
            <label for='contactR'>Reasons for contact:</label> <select>
                    <option value="op1">Reason 1</option>
                    <option value="op2">Reason 2</option>
                    <option value="op3">Reason 3</option>
                </select>
            <label for="comments">Comments: </label><textarea id='comments' name='comments' rows='4' cols='50'></textarea>
            <p>
                <input type='submit' name='button' id='button' value='Submit'>
                <input type='reset' name='button2' id='button2' value='Clear Form'>
            </p>
            <label for='honeypot' aria-hidden='true' class='visually-hidden'>Honeypot: <input type='radio' name='honeypot' id='honeypot' style='display:none' value='1'></label>
            </form>
        <?php
        }
        
        ?>
    </section>
</body>

</html>