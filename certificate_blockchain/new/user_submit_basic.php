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
 $link = mysql_connect("localhost", "yukiiris88","yuki2786599");
 mysql_select_db("user", $link);

 if($email!=null){
    $result=mysql_query("update user set email='$email' where account ='$account'",$link);}
 if($birth!=null){
    $result=mysql_query("update user set birth='$birth' where account ='$account'",$link);}
if($name!=null){
    $result=mysql_query("update user set name='$name' where account ='$account'",$link);}
if($sex!=null){
    $result=mysql_query("update user set male='$sex' where account ='$account'",$link);}
if($phone!=null){
    $result=mysql_query("update user set phone='$phone' where account ='$account'",$link);}
if($address!=null){
    $result=mysql_query("update user set address='$address' where account ='$account'",$link);}
if($situation!=null){
    $result=mysql_query("update user set situation='$situation' where account ='$account'",$link);}

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