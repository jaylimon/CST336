<?php

function startConnection($dbname="ottermart") {
    //Creating database connection
    $host = "";
//  $dbname = "ottermart";
    $username = "root";
    $password = "";
    
    if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
        $url = parse_url(getenv("mysql://bb092d0f2db1ff:77f97df8@us-cdbr-iron-east-01.cleardb.net/heroku_dddcf515622bfb0?reconnect=true"));
        $host = $url["us-cdbr-iron-east-01.cleardb.net"];
        $dbname = substr($url["path"], 1);
        $username = $url["bb092d0f2db1ff"];
        $password = $url["77f97df8"];
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
?>