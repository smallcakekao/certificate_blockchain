<?php session_start(); //開啟session的語法 要放在檔案最上方?>
<?php
 header("Content-type:text/html;charset=utf-8");
 $category = $_POST["category"];
 $score = $_POST["score"];
 $pass=$_POST["pass"];
 
 
 require("connect_user.php");
 $sql_query_login="SELECT * FROM certificate where issuer='$category'";


 $result1=mysqli_query($db_link,$sql_query_login) or die("查詢失敗");
 while($rs=mysqli_fetch_array($result1,MYSQLI_ASSOC)){
    echo $rs['account'];
     //header("refresh:0;url=company_user.php");//如果成功跳轉至user.html頁面
     //exit;
     
 }
 
?>