<?php session_start(); //開啟session的語法 要放在檔案最上方?>
<?php
$account =  $_SESSION["account"];
$con = mysqli_connect("localhost","root","jasper51401","issuer");//連結伺服器
$data=mysqli_query($con,"SELECT * from issuer where account= '$account'");//選擇從user資料表中讀取所有的資料
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
<link href="issuer_css1.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div id="wrapper">
	<div id="header-wrapper">
		<div id="header">
			<div id="logo">
				<h1><a href="#">Issuer</a></h1>
				<p>SCHOOL AND TESTING INSTITUTIONS</p>
			</div>
		</div>
	</div>
	<!-- end #header -->
	<div id="menu">
		<ul>
			<li class="current_page_item"><a href="#">Homepage</a></li>
			<li><a href="issuer_upload.php">Upload</a></li>
			
		</ul>
	</div>
	<!-- end #menu -->
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content">
					<div class="post">
						<h2 class="title"><?php while($rs=mysqli_fetch_array($data,MYSQLI_ASSOC)) {echo $rs['name']; }?></a></h2>
						
						<p><?php $data=mysqli_query($con,"SELECT * from issuer where account= '$account'"); 
							while($rs=mysqli_fetch_array($data,MYSQLI_ASSOC)) 
							{
								echo"機構名稱 : ";
								echo $rs['company'];
								echo "<br/>"; 
								echo"電子郵件 : ";
								echo $rs['email'];
								echo "<br/>";
								echo"電話 : "; 
								echo $rs['phone'];
								echo "<br/>";
								echo"地址 : "; 
								echo $rs['address'];
								echo "<br/>"; 
								echo"測驗類別 : ";
								echo $rs['class'];
								echo "<br/>"; 
							}?></p>
					</div>


					</div><!--content-->
					
				
				
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
