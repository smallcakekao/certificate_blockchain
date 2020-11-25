<?php session_start(); //開啟session的語法 要放在檔案最上方?>
<?php
	header('Content-Type: text/html; charset=utf-8');
	$job_name=$_POST['job_name'];
    $job_account=$_POST['job_account'];
    $job_email=$_POST['job_email'];
	
	require("connect_user.php");
	$sql_query_login="SELECT * FROM user where account='$job_account' and name='$job_name' and email='$job_email'";


	$result1=mysqli_query($db_link,$sql_query_login) or die("查詢失敗");
	if(mysqli_num_rows($result1)){
		$account =  $_SESSION["account"];
		$user=$job_account;
        $_SESSION["account"] = $account; 
        $_SESSION["user"] = $user; 
		header("refresh:0;url=company_user.php");//如果成功跳轉至user.html頁面
		exit;
		
	}else{
		echo"登入失敗";
		header("refresh:0;url=comapny_jobseeker.html");
	}
	
	
?>