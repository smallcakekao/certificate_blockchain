<?php session_start(); //開啟session的語法 要放在檔案最上方?>
<?php
 header("Content-type:text/html;charset=utf-8");
 
 $account =  $_SESSION["account"];//傳入account

 $high_education = $_POST["high_education"];
 $subhigh_education = $_POST["subhigh_education"];
 $language = $_POST["language"];
 $local_language = $_POST["local_language"];
 
 
 $_SESSION["account"] = $account;//傳出account
 $con = mysqli_connect("localhost","root","jasper51401","user");//連結伺服器

 if($high_education!=null){
    $result=mysqli_query($con,"update user set high_education='$high_education' where account ='$account'");}
 if($subhigh_education!=null){
    $result=mysqli_query($con,"update user set subhigh_education='$subhigh_education' where account ='$account'");}
if($language!=null){
    $result=mysqli_query($con,"update user set language='$language' where account ='$account'");}
if($local_language!=null){
    $result=mysqli_query($con,"update user set local_language='$local_language' where account ='$account'");}

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