<?php
 include "inc/functions.php";
 include '../inc/dbConnection.php';
 $dbConn = otterClothes("otterclothes");

 function displayBrand() { 
     global $dbConn;
     
     $sql = "SELECT * FROM oc_brand ORDER BY brand";
     $stmt = $dbConn->prepare($sql);
     $stmt->execute();
     $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
     
     foreach ($records as $record) {
         echo "<option value='".$record['brandId']."'>" . $record['brand'] . "</option>";
     }

 }
 function displayColor() { 
     global $dbConn;
     
     $sql = "SELECT * FROM oc_color ORDER BY color";
     $stmt = $dbConn->prepare($sql);
     $stmt->execute();
     $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
     
     foreach ($records as $record) {
         echo "<option value='".$record['colorId']."'>" . $record['color'] . "</option>";
     }

 }
 function displayGender() { 
     global $dbConn;
     
     $sql = "SELECT * FROM oc_gender ORDER BY gender";
     $stmt = $dbConn->prepare($sql);
     $stmt->execute();
     $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
     
     foreach ($records as $record) {
         echo "<option value='".$record['genderId']."'>" . $record['gender'] . "</option>";
     }

 }
 function display() {
     global $dbConn;

     
     $namedParameters= array();
     $product = $_GET['productName'];
     $sql= "SELECT * FROM oc_product WHERE 1";

  if (!empty($product)){

          $sql .=  " AND productName LIKE :product OR productDescription LIKE :product";

          $namedParameters[':product'] = "%$product%";
          $namedParameters[':order'] = $_GET['order'] ;
     }  
   if (!empty($_GET['brand'])){

          $sql .=  " AND brandId =  :brand";
           $namedParameters[':brand'] = $_GET['brand'] ;
     }
   if (!empty($_GET['color'])){

          $sql .=  " AND colorId =  :color";
           $namedParameters[':color'] = $_GET['color'] ;
     }
   if (!empty($_GET['gender'])){

          $sql .=  " AND genderId =  :gender";
           $namedParameters[':gender'] = $_GET['gender'] ;
     }
     $sql .= " ORDER BY productName " . $_GET["order"];
     
     $stmt = $dbConn->prepare($sql);
     $stmt->execute($namedParameters);
     $records = $stmt->fetchAll(PDO::FETCH_ASSOC);        
     
     foreach ($records as $record) {
         
         echo "<td><img src = '". $record["productImage"] . "'></td>";
         echo "<td><h4>". $record["productName"] . "<br />";
         echo "</a> ";
         echo "<td><h4>".$record['productDescription'] . " $" .  $record['price'] .   "<br>";   
         
     }
 }
 ?>

 <!DOCTYPE html>
 <html>
     <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="css/styles.css" rel="stylesheet" type="text/css"/>
     <link href="css/styles.css" rel="stylesheet" type="text/css"/>
     <style>
         p.ridge {border-style: ridge;}
     </style>
     </head>
     <header>
          <br>
          <br>
          <p class="ridge"> <img src= "img/monte.png"></p>
          <h1>OTTERCLOTHES</h1>
          <?= includeNavBar() ?>
          
         </header>
     <body id= "indexBody">
         
         <form>
             
             Product: <input type="text" name="productName" placeholder="Product keyword" /> <br />

              Brand: 
             <select name="brand">
                <option value=""> Select one </option>  
                <?=displayBrand()?>
             </select>
             Color: 
             <select name="color">
                <option value=""> Select one </option>  
                <?=displayColor()?>
             </select>
             Gender: 
             <select name="gender">
                <option value=""> Select one </option>  
                <?=displayGender()?>
             </select>
             <br>
             Select Order:
             <input type = "radio" name = "order" value = "ASC" > A-Z </input>
             <input type = "radio" name = "order" value = "DESC"> Z-A </input>
            
             <input type="submit" name="searchForm" value="Search"/>
         </form>
         <br>
         <hr>
          <?=display()?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
     </body>
 </html>