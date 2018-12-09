<?php
include '../../inc/dbConnection.php';
$dbConn = startConnection("otterclothes");

$sql ="SELECT * FROM oc_product WHERE productId = ".$_GET['productId'];
$stmt = $dbConn->prepare($sql);
$stmt->execute();
$record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting just one record

echo json_encode($record);
?>