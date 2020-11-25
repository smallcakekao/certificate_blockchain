<?php session_start(); //開啟session的語法 要放在檔案最上方?>
<?php
	header('Content-Type: text/html; charset=utf-8');

		$account =  $_SESSION["account"];
		
        $_SESSION["account"] = $account; 
        
		header("refresh:0;url=company_jobseeker.php");//如果成功跳轉至user.html頁面
	
	
?>