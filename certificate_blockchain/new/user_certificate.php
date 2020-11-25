<?php session_start(); //開啟session的語法 要放在檔案最上方?>
<?php
$account =  $_SESSION["account"];
$con = mysqli_connect("localhost","root","jasper51401","user");//連結伺服器
$data=mysqli_query($con,"SELECT * from user where account= '$account'");//選擇從user資料表中讀取所有的資料
$_SESSION["account"] = $account;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Escalate by TEMPLATED</title>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600' rel='stylesheet' type='text/css' />
<link href="user_certificate_css.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div id="wrapper">
	<div id="header-wrapper">
		<div id="header">
			<div id="logo">
				<h1><a href="#">USER</a></h1>
				<p>Candidates and Students</p>
			</div>
		</div>
	</div>
	<!-- end #header -->
	<div id="menu">
		<ul>
			<li><a href="user.php">Homepage</a></li>
			<li><a href="user_basic.php">Edit</a></li>
			<li class="current_page_item"><a href="#">Certificate</a></li>
			<li><a href="user_verify.php">Verify</a></li>
			
		</ul>
	</div>
	<!-- end #menu -->
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content">
					<div class="post">
						<h3 class="title">Upload  your  certivicate</h3>
						
						<div class="file-box">
							<form method="post" enctype="multipart/form-data">
							<nobr>
							<!--檔案名稱-->
							<input name="textfield" id="textfield" class="filename">
							<!--上傳按鈕-->
							<input type="button" class="button" value="choose file">
							<!--原按鈕隱藏-->
							<input type="file" name="file" class="file" onchange="document.getElementById('textfield').value=this.value">
							<!--nobr不換行--></nobr>
							</form>
						</div>
						<div class="button" >SUBMIT </div>
						</div>
					</div>
					
					
					<div style="clear: both;">&nbsp;</div>
				</div>
				<!-- end #content -->
				
				<div style="clear: both;">&nbsp;</div>
			</div>
		</div>
	</div>
	<!-- end #page --> 
</div>
<div id="footer">
	<p>&copy;  2019-FCU ITES | FAN WEI-HSUAN & KAO CHIH-YUAN</p>
</div>
<!-- end #footer -->
</body>
</html>
