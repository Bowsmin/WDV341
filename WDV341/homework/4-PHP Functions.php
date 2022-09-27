<?php 
setlocale(LC_MONETARY, "en_US");
function dateMM($theDate){
    $date = date_create($theDate);
    $date = date_format($date, "m/d/y");
    echo $date;
}

function dateDD($theDate){
    $date = date_create($theDate);
    echo date_format($date, "d/m/y");
}

function str($theStr){
    echo "Characters in String: ", strlen($theStr);
    $theStr = trim($theStr);
    echo "<br> Lowercase: ", strtolower($theStr), "<br>";
    
    $find = "dmacc";
    $strF = strpos(strtolower($theStr), $find);
    
    if ($strF == true){
        echo "'$find' was found in '$theStr'";
    }
    else {
        echo "'$find' was not found in '$theStr'";
    }  
}

function phone($phNum){
    
    $phNum = trim($phNum);
    
    if (strlen($phNum) == 10){
        $phNum = trim($phNum);
        $fThree = substr($phNum, 0, 3);
        $mThree = substr($phNum, 3, 3);
        $last = substr($phNum, 6, 4);
        
        $phNum = $fThree.'-'.$mThree.'-'.$last;
    }
    
    echo "Formated Number: $phNum";
    
}

function usCurrency($currency){
    printf("$%01.2f", $currency);
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>PHP Functions</title>
    </head>
    <body>
        <h1>PHP FUNCTIONS</h1>
        <h2>Date: Month Day Year</h2>
        <p><?php dateMM("2022-09-27");; ?></p>
        <h2>Date: Day Month Year</h2>
        <p><?php dateDD("2022-09-27"); ?></p>
        
        <h2>String Function</h2>
        <p><?php str("the DmaCC String"); ?></p>
        
        <h2>Phone</h2>
        <p><?php phone("1234567890"); ?></p>
        
        <h2>Currency</h2>
        <p><?php usCurrency(123456); ?></p>
    </body>
</html>