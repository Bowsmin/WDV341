<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>PHP Basics</title>
        <script>
            let jArray = [];
        </script>
    </head>
    <body>
        <?php
        $yourName = "Josiah Anderson";
        $number1 = 42;
        $number2 = 453;
        $total = $number1 + $number2;
        $theArray = array("PHP", "HTML", "Javascript");
        ?>
        <h1>3-1:PHP Basics</h1>
        <h2><?php echo $yourName ?></h2>
        
        <?php
        echo "Number 1: $number1 <br>";
        echo "Number 2: $number2 <br>";
        echo "Total: $total <br>";
        ?>
        <p>PHP<br></p>
            <?php
                foreach ($theArray as $value){
                    echo "$value <br>";
                }
            ?>
            
        <p>JS<br></p>
        <p id="JS"></p>
        <script type="text/javascript">
            jArray = <?php echo json_encode($theArray); ?>;
            let arLen = jArray.length;
            let text = "<br>";
            for (let i = 0; i < arLen; i++){
                text += jArray[i] + "<br>";
            }
            document.getElementById("JS").innerHTML = text;
            
        </script>
        
    </body>
</html>