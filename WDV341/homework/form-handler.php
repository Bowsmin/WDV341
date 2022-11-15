<?php
require_once('functions.php');
require '../dbConnect.php';

$name = $description = $presenter = $dateAndTime = $date = $time = "";
$problem = false;

// This is where you'll check if the form has been submitted via the POST method
    // This is where you'll define your variables for your display

// This is where you can send an email to the user
?>
<!DOCTYPE html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Events Table Form</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <style>
        *,:after,:before{-moz-box-sizing:border-box;-webkit-box-sizing:border-box;box-sizing:border-box}body{font:normal 15px/25px 'Open Sans',Arial,Helvetica,sans-serif;color:#444;text-align:left}h1,h2,h3{font-weight:400}h1{font:normal 40px/120px 'Open Sans',Arial,Helvetica,sans-serif;text-align:center;color:#444;margin:0}h1 span{color:#484c9b}h2{font-size:25px;line-height:30px;color:#484c9b;margin:50px 0 10px}h3{font-size:18px;line-height:35px;margin:50px 0 0}a{color:#484c9b;text-decoration:none}a:focus,a:hover{text-decoration:underline}p{margin:0 0 2rem}p span{color:#aaa}header{width:98%;margin:40px auto 0;border-bottom:1px solid #ddd;padding-bottom:40px;text-align:center}header p{margin:0}section{width:95%;max-width:910px;margin:40px auto}pre{background:#f9f9f9;padding:10px;font-size:12px;border:1px solid #eee;white-space:pre-wrap;border-radius:10px}table{border:1px solid #eee;background:#f9f9f9;width:100%;border-collapse:collapse;border-spacing:0;margin-bottom:3rem}thead{background:#5965af;color:#fff}tbody tr td,thead td{padding:.5rem .75rem}tbody tr:nth-child(even){background:#efefef}tbody tr td:first-child{padding-left:1.25rem}tbody tr td:first-child,tbody tr td:nth-child(3),thead td:first-child,thead td:nth-child(3){width:15%}tbody tr td:nth-child(2),thead td:nth-child(2){width:20%}tbody tr td:last-child,thead td:last-child{width:50%}@media only screen and (min-width:768px){body{font-size:20px;line-height:30px}h2{font-size:30px;line-height:45px}h3{font-size:22px;line-height:45px;margin-top:50px}p{margin-bottom:2rem}h1{font-size:60px}pre{padding:20px;font-size:15px}}
    </style>
</head>

<body>
    <section>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = test_input($_POST["name"]);
            $description = test_input($_POST["description"]);
            $presenter = test_input($_POST["presenter"]);
            $dateAndTime = test_input($_POST["date"]);
            
            $migrateDT = new DateTime($dateAndTime);
            $date = $migrateDT->format('Y-m-d');
            $time = $migrateDT->format('H:i:s');
        
            if ($_POST['honeypot'] == 1) {
                    $problem = TRUE;
            }
        
            if ($problem){
                echo "<p>Your presentation has most definitely been submited ;)</p>";
            }
            else {
                try{
                    $sql = "INSERT INTO wdv341_events (name, description, presenter, date, time) VALUES ('$name', '$description', '$presenter', '$date', '$time')";
                    
                    $conn->exec($sql);
                    echo "<header> <h1>Received Your Event</h1>
                    <p>Thank you</p>
                    </header>";
                    echo "<h2>Your Event has been saved</h2>";
                    echo "Presentation Name: " . $name;
                    echo "<br>";
                    echo "Description: " . $description;
                    echo "<br>";
                    echo "Presenter: " . $presenter;
                    echo "<br>";
                    echo "Date: " . $date;
                    echo "<br>";
                    echo "Time: " . $time;
                    
                } catch (PDOException $e){
                    echo $sql . "<br>" . $e->getMessage();
                }
                
            }
        }
        ?>

        
    </section>
</body>

</html>