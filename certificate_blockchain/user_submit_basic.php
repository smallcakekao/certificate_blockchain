<?php session_start(); //開啟session的語法 要放在檔案最上方?>
<?php
 header("Content-type:text/html;charset=utf-8");
 
 $account =  $_SESSION["account"];//傳入account

 $email = $_POST["email"];
 $birth = $_POST["birth"];
 $name = $_POST["name"];
 $sex = $_POST["sex"];
 $phone = $_POST["phone"];
 $address = $_POST["address"];
 $situation = $_POST["situation"];
 
 $_SESSION["account"] = $account;//傳出account
 $con = mysqli_connect("localhost","root","jasper51401","user");//連結伺服器

 if($email!=null){
    $result=mysqli_query($con,"update user set email='$email' where account ='$account'");}
 if($birth!=null){
    $result=mysqli_query($con,"update user set birth='$birth' where account ='$account'");}
if($name!=null){
    $result=mysqli_query($con,"update user set name='$name' where account ='$account'");}
if($sex!=null){
    $result=mysqli_query($con,"update user set male='$sex' where account ='$account'");}
if($phone!=null){
    $result=mysqli_query($con,"update user set phone='$phone' where account ='$account'");}
if($address!=null){
    $result=mysqli_query($con,"update user set address='$address' where account ='$account'");}
if($situation!=null){
    $result=mysqli_query($con,"update user set situation='$situation' where account ='$account'");}

  //mysqli_query($con);  
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