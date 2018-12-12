<?php
session_start();
include '../inc/dbConnection.php';
$dbConn = startConnection("otterclothes");
function getAllProducts(){
    global $dbConn;
    $sql= "SELECT productId, productName from oc_product ORDER BY productName";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records 
 
    return $records;
}
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
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>   
        <style>
       
     body{
         background-color: #F3D9D4;
         color: #E88E7D;
         text-align: center;
         
         
     }
     #productModal{
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
   
	  <script>
	      $('document').ready(function() {
	          $('.productLink').click(function() {
	              $('#productModal').modal("show");
	              $.ajax({
                    type: "GET",
                    url: "api/getProduct.php",
                    dataType: "json",
                    data: {"productId": $(this).attr('id')},
                    success: function(data, status) {
                        $("#productName").html(data.productName);
                        $("#price").html('$' +data.price);
                        $('#productImage').html('<img src=' + data.productImage + '" height="200" width= "200" />');
                        $("#container").html("");
                    },
	          }); // ajax closing
	          
	         
	          }); // productlink click
	          
	      }); // doc end
	  </script>
    <?php
        $products = getAllProducts();
        foreach($products as $product) {
            echo "<p>Product: " ."<a href='#' class = 'productLink' id = '". $product['productId']. "'>".$product['productName']."</a>". "</p><br>";
        }
    ?>
    <div>

        
    </div>
	  <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="productName">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div id="container"></div>
        <div>
            <center>
    	    <p id= "productName" text-align= "center">
            <p id= "productImage">
            <h1 id= "price">
    	    </center>
	      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    </body>
</html>