<?php

function startConnection($dbname="ottermart") {
    //Creating database connection
    $host = "localhost";
//  $dbname = "ottermart";
    $username = "root";
    $password = "";
    
    //checks whether the URL contains "herokuapp" (using Heroku)
    if(strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
       $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
       $host = $url["host"];
       $dbname = substr($url["path"], 1);
       $username = $url["user"];
       $password = $url["pass"];
    }
    
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
}

function startMidterm($dbname="midterm") {
    //Creating database connection
    $host = "localhost";
//  $dbname = "midterm";
    $username = "root";
    $password = "";
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
}
function newMidterm($dbname="midterm2") {
    //Creating database connection
    $host = "localhost";
//  $dbname = "newMidterm";
    $username = "root";
    $password = "";
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
}
function otterShoe($dbname="ottershoe") {
    //Creating database connection
    $host = "localhost";
//  $dbname = "ottersho";
    $username = "root";
    $password = "";
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
}
function otterClothes($dbname="otterclothes") {
    //Creating database connection
    $host = "localhost";
//  $dbname = "ottercloth";
    $username = "root";
    $password = "";
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
}
?>
