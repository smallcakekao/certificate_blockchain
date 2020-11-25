<?php session_start(); //開啟session的語法 要放在檔案最上方?>
<?php
	header('Content-Type: text/html; charset=utf-8');
	$username=$_POST['user'];
	$password=$_POST['pass'];
	
	require("connect_company.php");
	$sql_query_login="SELECT * FROM company where account='$username' and pass='$password'";


	$result1=mysqli_query($db_link,$sql_query_login) or die("查詢失敗");
	if(mysqli_num_rows($result1)){
		
		$account = $username;
		
    	$_SESSION["account"] = $account; 
		header("refresh:0;url=company.php");//如果成功跳轉至user.html頁面
		exit;
		
	}else{
		echo"登入失敗";
		header("refresh:0;url=home.html");
	}
	
	
?>