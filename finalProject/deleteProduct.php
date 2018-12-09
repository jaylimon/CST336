<?php
session_start();

include '../inc/dbConnection.php';
$dbConn = startConnection("otterclothes");
include 'inc/functions.php';
validateSession();

$sql = "DELETE FROM oc_product WHERE productId = " . $_GET['productId'];
$stmt=$dbConn->prepare($sql);
$stmt->execute();

header("Location: admin.php");



?>