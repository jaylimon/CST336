
<?php
session_start();

include '../inc/dbConnection.php';
$dbConn = startConnection("otterclothes");


function displayAvg(){
    global $dbConn;
    
    $sql = "SELECT round(avg(price)) avg_price FROM oc_product";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records

    foreach ($records as $record) {
        
        echo " $ " . $record['avg_price'] . "<br>";
        
    }
}
function displaySum(){
    global $dbConn;
    
    $sql = "SELECT round(sum(price)) avg_price FROM oc_product";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records

    foreach ($records as $record) {
        
        echo " $ " . $record['avg_price'] . "<br>";
        
    }
}
function displayMax(){
    global $dbConn;
    
    $sql = "SELECT max(price) avg_price FROM oc_product";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records

    foreach ($records as $record) {
        
        echo " $ " . $record['avg_price'] . "<br>";
        
    }
}
function displayMin(){
    global $dbConn;
    
    $sql = "SELECT min(price) avg_price FROM oc_product";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records

    foreach ($records as $record) {
        
        echo " $ " . $record['avg_price'] . "<br>";
        
    }

}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">

        <style>
       
     body{
         background-color: #F3D9D4;
         color: #E88E7D;
         text-align: center;
         
     }
     header{
         text-shadow: 2px 2px #9D8A54;
     }
    h1 {
            border-style: solid;
            border-color: #EEEBD9;
    }
        </style>
     </head>
        
    <header>
        <h1>OTTERCLOTHES INFORMATION PAGE</h1>
        </header>
    <body>
        <h1>Average Product Price: <?= displayAvg() ?></h1>
        <h1>Sum of all Products: <?= displaySum() ?></h1>
        <h1>Highest Product Price: <?= displayMax() ?></h1>
        <h1>Lowest Product Price: <?= displayMin() ?></h1>
        
    <form>


    </form>
    </body>
</html>