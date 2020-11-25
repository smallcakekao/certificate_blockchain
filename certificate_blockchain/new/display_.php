<?php session_start(); //開啟session的語法 要放在檔案最上方?>
<?PHP 
 //display_.php3
 $account =  $_SESSION["account"];
 $conn=mysql_pconnect("localhost","yukiiris88","yuki2786599");        
    mysql_select_db("user");
    mysql_query("SET NAMES'utf8'");
 $result=mysql_query("SELECT * FROM imagedb WHERE account='$account'");
 $row=mysql_fetch_object($result);
 Header( "Content-type: image/jpeg");
 echo $row->image;
 ?>