<!DOCTYPE html>
<?php
    require '../dbConnect.php'
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>JSON Event Object</title>
    </head>
    <body>
        <?php 
        
            class Event {
        
        // Needs to be public for JSON to have access. I assume there is a way to set your getFunctions for JSON to use.
                public $ID;
                public $name;
                public $description;
                public $presenter;
                public $date;
                public $time;
        
                public function __construct(){}
        
                function setID($ID){
                    $this->ID = $ID;
                }
                function setName($name){
                    $this->name = $name;
                }
                function setDescription($description){
                    $this->description = $description;
                }
                function setPresenter($presenter){
                    $this->presenter = $presenter;
                }
                function setDate($date){
                    $this->date = $date;
                }
                function setTime($time){
                    $this->time = $time;
                }
        
                function getID(){
                    return $this->ID;
                }
                function getName(){
                    return $this->name;
                }
                function getDescription(){
                    return $this->description;
                }
                function getPresenter(){
                    return $this->presenter;
                }
                function getDate(){
                    return $this->date;
                }
                function getTime(){
                    return $this->time;
                }
            }
            
            $outputObj = new Event();
    
            try {
    
                $stmt = $conn->prepare("SELECT * FROM wdv341_events WHERE name='Danny'");
                $stmt->execute();
                $theEvent = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $outputObj->setID($theEvent['id']);
                $outputObj->setName($theEvent['name']);
                $outputObj->setDescription($theEvent['description']);
                $outputObj->setPresenter($theEvent['presenter']);
                $outputObj->setDate($theEvent['date']);
                $outputObj->setTime($theEvent['time']);
     
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }

            $theJSON = json_encode($outputObj);
            echo $theJSON;


        ?>

    </body>
</html>