<?php
session_start();

include '../inc/dbConnection.php';
$dbConn = startConnection("otterclothes");
include 'inc/functions.php';
validateSession();


if (isset($_GET['updateProduct'])){  //user has submitted update form
    
    $np = array();
    $np[":productName"] = $_GET['productName'];
    $np[":productDescription"] = $_GET['description'];
    $np[":price"] = $_GET['price'];
    $np[":genderId"] = $_GET['genderId'];
    $np[":colorId"] = $_GET['colorId'];
    $np[":brandId"] = $_GET['brandId'];
    $np[":productImage"] = $_GET['productImage'];
    
    $sql = "UPDATE oc_product 
            SET productName= :productName,
               productDescription = :productDescription,
               price = :price,
               genderId = :genderId,
               colorId = :colorId,
               brandId = :brandId,
               productImage = :productImage
            WHERE productId = " . $_GET['productId'];
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);       
    
}


if (isset($_GET['productId'])) {

  $productInfo = getProductInfo($_GET['productId']);    
  
 // print_r($productInfo);
    
    
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Update Products! </title>
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

        <h1> Updating a Product </h1>
        
        <form>
            <input type="hidden" name="productId" value="<?=$productInfo['productId']?>">
           Product name: <input type="text" name="productName" value="<?=$productInfo['productName']?>"><br>
           Description: <textarea name="description" cols="50" rows="4"> <?=$productInfo['productDescription']?> </textarea><br>
           Price: <input type="text" name="price" value="<?php echo $productInfo['price']?>"><br>
           
           Gender: 
           <select name="genderId">
              <option value="">Select One</option>
              <?php
              
              $categories = genderCategories();
              
              foreach ($categories as $category) {
                  
                  echo "<option  "; 
                  echo  ($category['genderId']==$productInfo['genderId'])?"selected":"";
                  echo " value='".$category['genderId']."'>" . $category['gender'] . "</option>";
                  
              }
              
              ?>
           </select> <br />
           
           Color: 
           <select name="colorId">
              <option value="">Select One</option>
              <?php
              
              $categories = colorCategories();
              
              foreach ($categories as $category) {
                  
                  echo "<option  "; 
                  echo  ($category['colorId']==$productInfo['colorId'])?"selected":"";
                  echo " value='".$category['colorId']."'>" . $category['color'] . "</option>";
                  
              }
              
              ?>
           </select> <br />

           Brand: 
           <select name="brandId">
              <option value="">Select One</option>
              <?php
              
              $categories = brandCategories();
              
              foreach ($categories as $category) {
                  
                  echo "<option  "; 
                  echo  ($category['brandId']==$productInfo['brandId'])?"selected":"";
                  echo " value='".$category['brandId']."'>" . $category['brand'] . "</option>";
                  
              }
              
              ?>
           </select> <br />
           Set Image Url: <input type="text" name="productImage" value="<?=$productInfo['productImage']?>"><br>
           <input type="submit" name="updateProduct" value="Update Product">
        </form>
        
        
    </body>
</html>