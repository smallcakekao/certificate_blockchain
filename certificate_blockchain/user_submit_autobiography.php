<?php session_start(); //開啟session的語法 要放在檔案最上方?>
<?php
 header("Content-type:text/html;charset=utf-8");
 
 $account =  $_SESSION["account"];//傳入account


 $biography = $_POST["biography"];
 
 $_SESSION["account"] = $account;//傳出account
 $con = mysqli_connect("localhost","root","jasper51401","user");//連結伺服器

 if($biography!=null){
    $result=mysqli_query($con,"update autobiography set biography='$biography' where account ='$account'");}
 
  //mysql_query($sql);  
  if ($result) {
    $_SESSION["account"] = $account; 
    header("refresh:0;url=user.php");//如果成功跳轉至user.html頁面
	exit;
  }
  else{ 
  echo"註冊失敗";
  header("refresh:0;url=user_basic.php");
  
 }
?>