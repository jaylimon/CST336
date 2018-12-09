<?php

include '../../../inc/dbConnection.php';
$dbConn = startConnection("c9");

$sql ="SELECT * FROM oc_products WHERE id = ".$_GET['productId'];
$stmt = $dbConn->prepare($sql);
$stmt->execute();
$record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting just one record

//print_r($record);
echo json_encode($record);
?>