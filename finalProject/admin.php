



<?php
session_start();

include '../inc/dbConnection.php';
$dbConn = startConnection("otterclothes");

include 'inc/functions.php';
validateSession();

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Main Page </title>
        <style>
            @import url("css/styles.css");
            form {
                display: inline-block;
            }
           
             header{
             background-color:#E88E7D;
             color: #F3D9D4;
             text-align: center;
             }
             body{
                 background-color:#E88E7D;
                 color: #F3D9D4;
                 text-align: center;
             }
     </style>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
        
        <script>
        
            function confirmDelete() {
                
                //alert();
                //prompt();
                return confirm("Are you sure you want to delete this product");
                
            }
            
        </script>
    
    </head>
    <body id= "adminBody">
        
        <h1> Admin - OTTERCLOTHES </h1>
         <!--<h3>Welcome <?= $_SESSION['adminFullName'] ?> </h3> -->

          <form action="addProduct.php">
              <input type="submit" value="Add New Product">
          </form>
       <form action="report.php">
              <input type="submit" value="Information Page">
          </form>
         <form action="logout.php">
              <input type="submit" value="Logout">
          </form>
 

           <br><br>
        
        <?= displayAllProducts() ?>
 
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        
    </body>
</html>