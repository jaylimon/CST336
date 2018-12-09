<?php
function includeNavBar() {
    echo "<nav class='navbar navbar-default - navbar-fixed-top'>
                <div class='container-fluid'>
                    <ul class='nav navbar-nav'>
                        <li><a href='index.php'>Home</a></li>
                    </ul>
                    <ul class='nav navbar-nav'>
                        <li><a href='adminLogin.php'>Admin Login</a></li>
                    </ul>
                </div>
            </nav>";
}
function validateSession(){
    if (!isset($_SESSION['adminFullName'])) {
        header("Location: adminLogin.php");  //redirects users who haven't logged in 
        exit;
    }
}
function displayAllProducts(){
    global $dbConn;
    
    $sql = "SELECT * FROM oc_product ORDER BY productName";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records

    foreach ($records as $record) {
        echo "Product: " . $record[productName] . "</br>";
        echo "<td><img src = '". $record["productImage"] . "'></br>";
        echo "<a class='btn btn-warning' role='button' href='updateProduct.php?productId=".$record['productId']."'>Update</a>";
        //echo "[<a href='deleteProduct.php?productId=".$record['productId']."'>Delete</a>]";
        echo "<form action='deleteProduct.php' onsubmit='return confirmDelete()'>";
        echo "   <input type='hidden' name='productId' value='".$record['productId']."'>";
        echo "   <button class='btn btn-outline-danger' type='submit'>Delete</button>";
        echo "</form>";
        echo "</br></br>";
        
    }
}
function genderCategories() {
    global $dbConn;
    
    $sql = "SELECT * FROM oc_gender ORDER BY gender";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records   

    return $records;
    
}
function colorCategories() {
    global $dbConn;
    
    $sql = "SELECT * FROM oc_color ORDER BY color";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records   

    
    return $records;
    
}
function brandCategories() {
    global $dbConn;
    
    $sql = "SELECT * FROM oc_brand ORDER BY brand";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records   
    

    return $records;
    
}
function getProductInfo($productId) {
     global $dbConn;
    
    $sql = "SELECT * FROM oc_product WHERE productId = $productId";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting multiple records   
    
    return $record;
     
    
}

?>