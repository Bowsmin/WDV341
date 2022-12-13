<!DOCTYPE html>
<?php
require '../dbConnect.php'
?>
<html>
<head>
</head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>EVENTS TABLE</title>
<body>
    <h1>WDV341 Events Table</h1>
<?php 
    
try {
    session_start();
    $btnVal;
    $dateUp;
    $theName;
    $theDesc;
    $thePres;
    $theDate;
    $theTime;
    $theInsert;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $_SESSION['idValue'] = $_POST["btnSubmit"];
    }
    $btnVal = $_SESSION['idValue'];

        $sql = "SELECT * FROM wdv341_events WHERE id = :btnV";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":btnV", $btnVal);
        $stmt->execute();
        while($row = $stmt->fetch()) {
            $theName = $row['name'];
            $theDesc = $row['description'];
            $thePres = $row['presenter'];
            $theDate = $row['date'];
            $theTime = $row['time'];
            $theInsert = $row['date_inserted'];
            $dateUp = $row['date_updated'];
    }
    
    if(isset($_GET['updateBtn'])){
        $theName = $_GET['rowName'];
        $theDesc = $_GET['rowDesc'];
        $thePres = $_GET['rowPres'];
        
        $sql = 'UPDATE wdv341_events SET name = :theName, description = :desc, presenter = :pres WHERE id = :btnV'; 
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":theName", $theName);
        $stmt->bindParam(":desc", $theDesc);
        $stmt->bindParam(":pres", $thePres);
        $stmt->bindParam(":btnV", $btnVal);
        $stmt->execute();
        session_unset();
        session_destroy();
        header("Location: https://routejosiah.azurewebsites.net/WDV341/homework/updateEvents.php");
    }
            
        ?>
        <form name="updateF" id="updateF" method="get" ></form>
        <?php
            
            echo 
            "<table border='2'>
            <tr>
            <th>ID</th>
            <th>Name</th>
            <th>description</th>
            <th>presenter</th>
            <th>date</th>
            <th>time</th>
            <th>date_inserted</th>
            <th>date_updated</th>
            </tr>";
            
            echo "<tr>";
            echo "<td>$btnVal</td>";
            echo "<td> <input type='text' value='$theName' name='rowName' form='updateF'></td>";
            echo "<td> <textarea value='$theDesc' name='rowDesc' rows='4' cols='50' form='updateF'>$theDesc</textarea></td>";
            echo "<td> <input type='text' value='$thePres' name='rowPres' form='updateF'></td>";
            echo "<td>$theDate</td>";
            echo "<td>$theTime</td>";
            echo "<td>$theInsert</td>";
            echo "<td>$dateUp</td>";
        ?>
        <button type="submit" value="updateBtn" name="updateBtn" form="updateF">Update</button>
        </tr>
        </table>
        <a href="updateEvents.php"><h3>Back</h3></a>
    
        <?php
    
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}


?>

</body>
</html>