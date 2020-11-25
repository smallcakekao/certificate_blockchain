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
 $link = mysql_connect("localhost", "yukiiris88","yuki2786599");
 mysql_select_db("user", $link);
 
 if($job!=null){
    $result=mysql_query("update jobseeker set job='$job' where account ='$account'",$link);}
 if($date!=null){
    $result=mysql_query("update jobseeker set date='$date' where account ='$account'",$link);}
 if($property!=null){
    $result=mysql_query("update jobseeker set property='$property' where account ='$account'",$link);}
 if($category!=null){
    $result=mysql_query("update jobseeker set category='$category' where account ='$account'",$link);}
 if($industry!=null){
    $result=mysql_query("update jobseeker set industry='$industry' where account ='$account'",$link);}
 if($location!=null){
    $result=mysql_query("update jobseeker set location='$location' where account ='$account'",$link);}
 if($time!=null){
    $result=mysql_query("update jobseeker set time='$time' where account ='$account'",$link);}
if($salary!=null){
    $result=mysql_query("update jobseeker set salary='$salary' where account ='$account'",$link);}
 
  mysql_query($sql);  
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