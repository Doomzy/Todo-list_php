<?php

$serverName='localhost';
$dbUsername='root';
$dbPassword='';
$dbName='myDatabase';

$conn=mysqli_connect($serverName,$dbUsername,$dbPassword,$dbName);

if(!$conn){
    die('connection failed:'.mysqli_connect_error());
}