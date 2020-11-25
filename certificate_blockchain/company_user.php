<?php session_start(); //開啟session的語法 要放在檔案最上方?>
<?php
$account =  $_SESSION["account"];
$user =  $_SESSION["user"];
$con = mysqli_connect("localhost","root","jasper51401","user");//連結伺服器
$data=mysqli_query($con,"SELECT * from user where account= '$user'");//選擇從user資料表中讀取所有的資料
$_SESSION["account"] = $account;
$_SESSION["user"] = $user;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Escalate by TEMPLATED</title>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600' rel='stylesheet' type='text/css' />
<link href="company_user_css1.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div id="wrapper">
	<div id="header-wrapper">
		<div id="header">
			<div id="logo">
                <h1><a href="#">COMPANY</a></h1>
				<p>Corporations and employees</p>
			</div>
		</div>
	</div>
	<!-- end #header -->
	<div id="menu">
		<ul>
            <li><a href="company.php">Homepage</a></li>
            <li class="current_page_item"><a href="#">jobseeker</a></li>
			<li><a href="company_capability.php">capability</a></li>
			
		</ul>
	</div>
	<!-- end #menu -->
	<div id="sidebar">
					<ul>
						<li>
							<h2>autobiography</h2>
							<ul>
								<li><a href="company_user.php">求職者基本資料</a></li>
								<li><a href="company_user_certi.php">求職者證書</a></li>
							</ul>
						</li>
						
					</ul>
				</div>
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content">
					<div class="post">
						<h2 class="title"><?php while($rs=mysqli_fetch_array($data,MYSQLI_ASSOC)) {echo $rs['name']; }?></a></h2>
						<img src="<?php include('company_user_display.php');?>" class="profile"/>
						<p><?php $data=mysqli_query($con,"SELECT * from user where account= '$user'"); 
						
							while($rs=mysqli_fetch_array($data,MYSQLI_ASSOC)) 
							{
								echo"姓名 : ";
								echo $rs['name'];
								echo "<br/>"; 
								echo"出生日期 : ";
								echo $rs['birth'];
								echo "<br/>";
								echo"性別 : "; 
								echo $rs['male'];
								echo "<br/>";
								echo"聯絡電話 : "; 
								echo $rs['phone'];
								echo "<br/>"; 
								echo"電子郵件 : ";
								echo $rs['email'];
								echo "<br/>"; 
								echo"通訊地址 : ";
								echo $rs['address'];
								echo "<br/>";
								echo"就業狀況 : "; 
								echo $rs['situation'];
								echo "<br/>"; 
							}?></p>
					</div>
					
					<div class="post">
						<h3 class="title"><a>學歷技能</a></h3>
						<p><?php $data=mysqli_query($con,"SELECT * from user where account= '$user'"); 
							while($rs=mysqli_fetch_array($data,MYSQLI_ASSOC)) 
							{
							 echo"最高學歷 : ";
							 echo $rs['high_education'];
							 echo "<br/>"; 
							 echo"次高學歷 : ";
							 echo $rs['subhigh_education'];
							 echo "<br/>"; 
							 echo"外語能力 : ";
							 echo $rs['language'];
							 echo "<br/>"; 
							 echo"方言能力 : ";
							 echo $rs['local_language'];
							 echo "<br/>"; 
							}?></p>
					</div>

					<div class="post">
						<h3 class="title"><a>求職條件</a></h3>
						<p><?php $data=mysqli_query($con,"SELECT * from jobseeker where account= '$user'"); 
							while($rs=mysqli_fetch_array($data,MYSQLI_ASSOC)) 
							{
							 echo"希望職務名稱 : ";
							 echo $rs['job'];
							 echo "<br/>"; 
							 echo"最快可上班日 : ";
							 echo $rs['date'];
							 echo "<br/>"; 
							 echo"希望工作性質 : ";
							 echo $rs['property'];
							 echo "<br/>"; 
							 echo"希望職務類別 : ";
							 echo $rs['category'];
							 echo "<br/>"; 
							 echo"希望從事產業 : ";
							 echo $rs['industry'];
							 echo "<br/>"; 
							 echo"希望工作地點 : ";
							 echo $rs['location'];
							 echo "<br/>"; 
							 echo"希望上班時段 : ";
							 echo $rs['time'];
							 echo "<br/>"; 
							 echo"希望薪資待遇 : ";
							 echo $rs['salary'];
							 echo "<br/>"; 
							 
							}?></p>
					</div>

					<div class="post">
						<h3 class="title"><a></a></h3>
						<p><?php $data=mysqli_query($con,"SELECT * from autobiography where account= '$user'"); 
							while($rs=mysqli_fetch_array($data,MYSQLI_ASSOC)) 
							{
							 echo"自傳 : ";
							 echo "<br/>";
							 echo $rs['biography'];
							 echo "<br/>"; 
							 
							}?></p>
					</div>

					<form action="restart_jobseeker.php" method="post" style="text-align:center">
						<input type="submit" value="RESTART" class="button"><br/>
					</form>
					</div><!--content-->
					
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
