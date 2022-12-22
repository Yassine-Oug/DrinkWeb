<?php


/*
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "Market");
//connect db
$connect = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);
*/

//data base connect

//host,user,pass,database
//$connect =mysqli_connect('localhost','root','root','Market');
//mysql_connect -- mysql_select_db


define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "MyMarket");

    //connect bd
    $connect = mysqli_connect('localhost' , 'root', '', 'MyMarket');


?>
