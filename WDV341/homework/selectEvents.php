<?php
require '../dbConnect.php'
?>
<!DOCTYPE html>
<html>
<head>
</head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>EVENTS TABLE</title>
<body>
    <h1>WDV341 Events Table</h1>
<?php 
    
try {
    
  $stmt = $conn->prepare("SELECT * FROM wdv341_events");
  $stmt->execute();
    
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
    </tr>"
    ;
    while($row = $stmt->fetch()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['description'] . "</td>";
        echo "<td>" . $row['presenter'] . "</td>";  
        echo "<td>" . $row['date'] . "</td>";
        echo "<td>" . $row['time'] . "</td>";
        echo "<td>" . $row['date_inserted'] . "</td>";
        echo "<td>" . $row['date_updated'] . "</td>";
    }
    
    echo "</tr>";
    echo "</table>";
     
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}


?>

</body>
</html>