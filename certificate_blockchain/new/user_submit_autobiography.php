<?php session_start(); //開啟session的語法 要放在檔案最上方?>
<?php
 header("Content-type:text/html;charset=utf-8");
 
 $account =  $_SESSION["account"];//傳入account


 $biography = $_POST["biography"];
 
 $_SESSION["account"] = $account;//傳出account
 $link = mysql_connect("localhost", "yukiiris88","yuki2786599");
 mysql_select_db("user", $link);

 if($biography!=null){
    $result=mysql_query("update autobiography set biography='$biography' where account ='$account'",$link);}
 
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