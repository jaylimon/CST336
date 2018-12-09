<?php
include "inc/functions.php";
session_start();
 
  if(isset($_POST['login'])){

    include '../inc/dbConnection.php';
    $dbConn = startConnection("otterclothes");

    $username = $_POST['username'];
    $password = sha1($_POST['password']);

    $sql = "SELECT * FROM oc_admin
                 WHERE username = :username 
                 AND  password = :password ";                 
    $np = array();
    $np[':username'] = $username;
    $np[':password'] = $password;

    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    $record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting just one record


    if (empty($record)) {
    
    echo " <div class = 'errorMessage'> ";
    echo "</br></br></br>Wrong username or password!" ;
    echo "</div>";
    } else {
   
   $_SESSION['adminFullName'] = $record['firstName'] .  "   "  . $record['lastName'];
   header('Location: admin.php'); //redirects to another program
    
  }
 }

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Login </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


    </head>
        <header>
            <style>
         header{
    
         color:#E88E7D;
         text-align: center;
     }
     body{
         color:#E88E7D;
         background-color: #F3D9D4;
         text-align: center;
     }
     </style>
     </br>
     </br>
     <h1> Otterclothes - Admin Login </h1>
     <?= includeNavBar() ?>
     </header>
    <body >

        <form method="post">
          Username:  <input type="text" name="username"/> <br><br>
          Password:  <input type="password" name="password"/> <br><br>
          <input type="submit" value="Login" name = "login" id="b1">
        </form>
    </body>
</html>
