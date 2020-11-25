<?php session_start(); //開啟session的語法 要放在檔案最上方?>
<?php
 header("Content-type:text/html;charset=utf-8");
 
 $account =  $_SESSION["account"];//傳入account

 $job = $_POST["job"];
 $date = $_POST["date"];
 $property = $_POST["property"];
 $category = $_POST["category"];
 $industry = $_POST["industry"];
 $location = $_POST["location"];
 $time = $_POST["time"];
 $salary = $_POST["salary"];
 
 $_SESSION["account"] = $account;//傳出account
 $con = mysqli_connect("localhost","root","jasper51401","user");//連結伺服器
 
 if($job!=null){
    $result=mysqli_query($con,"update jobseeker set job='$job' where account ='$account'");}
 if($date!=null){
    $result=mysqli_query($con,"update jobseeker set date='$date' where account ='$account'");}
 if($property!=null){
    $result=mysqli_query($con,"update jobseeker set property='$property' where account ='$account'");}
 if($category!=null){
    $result=mysqli_query($con,"update jobseeker set category='$category' where account ='$account'");}
 if($industry!=null){
    $result=mysqli_query($con,"update jobseeker set industry='$industry' where account ='$account'");}
 if($location!=null){
    $result=mysqli_query($con,"update jobseeker set location='$location' where account ='$account'");}
 if($time!=null){
    $result=mysqli_query($con,"update jobseeker set time='$time' where account ='$account'");}
if($salary!=null){
    $result=mysqli_query($con,"update jobseeker set salary='$salary' where account ='$account'");}
 
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