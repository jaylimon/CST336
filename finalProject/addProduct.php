<?php
session_start();

include '../inc/dbConnection.php';
$dbConn = startConnection("otterclothes");
include 'inc/functions.php';
validateSession();

if (isset($_GET['addProduct'])) { //checks whether the form was submitted
    
    
    $productName = $_GET['productName'];
    $description =  $_GET['description'];
    $price =  $_GET['price'];
    $brandId =  $_GET['brandId'];
    $image = $_GET['productImage'];
    $genderId =  $_GET['genderId']; 
    $colorId =  $_GET['colorId'];
    
    $sql = "INSERT INTO oc_product (productName, productDescription, productImage,price, brandId, colorId, genderId ) 
            VALUES (:productName, :productDescription, :productImage, :price, :brandId, :colorId, :genderId);";
    $np = array();
    $np[":productName"] = $productName;
    $np[":productDescription"] = $description;
    $np[":productImage"] = $image;
    $np[":price"] = $price;
    $np[":brandId"] = $brandId;
    $np[":genderId"] = $genderId;
    $np[":colorId"] = $colorId;
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    echo "New Product was added!";
    
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Admin Section: Add New Product </title>
    <style>
         header{
         background-color: #EEEBD9;
         color: #F3D9D4;
         text-align: center;
     }
     h1 {
            border-style: solid;
            border-color: #EEEBD9;
        }
     body{
         background-color:#E88E7D;
         color: #F3D9D4;
         text-align: center;
     }
     </style>
    </head>


    <body>
        
        <h1> Adding New Product </h1>
        
        <form>
           Product name: <input type="text" name="productName"></br></br>
           Description: <textarea name="description" cols="50" rows="4"></textarea></br></br>
           Price: <input type="text" name="price"></br></br>
           Image Url: <input type="text" name="productImage"></br></br>
           
           Gender: 
           <select name="genderId">
              <option value="">Select One</option>
              <?php
              
              $categories = genderCategories();
              
              foreach ($categories as $category) {
                  
                  echo "<option value='".$category['genderId']."'>" . $category['gender'] . "</option>";
                  
              }
              
              ?>
           </select> <br /></br>
           Color: 
           <select name="colorId">
              <option value="">Select One</option>
              <?php
              
              $categories = colorCategories();
              
              foreach ($categories as $category) {
                  
                  echo "<option value='".$category['colorId']."'>" . $category['color'] . "</option>";
                  
              }
              
              ?>
           </select> <br /></br>
           Brand: 
           <select name="brandId">
              <option value="">Select One</option>
              <?php
              
              $categories = brandCategories();
              
              foreach ($categories as $category) {
                  
                  echo "<option value='".$category['brandId']."'>" . $category['brand'] . "</option>";
                  
              }
              
              ?>
           </select> <br /> </br>         
           <input type="submit" name="addProduct" value="Add Product">
        </form>

    </body>
</html>