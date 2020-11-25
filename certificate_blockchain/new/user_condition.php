<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<?php session_start(); //開啟session的語法 要放在檔案最上方?>
<?php
$account =  $_SESSION["account"];
$_SESSION["account"] = $account;
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Escalate by TEMPLATED</title>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600' rel='stylesheet' type='text/css' />
<link href="user_education_css.css" rel="stylesheet" type="text/css" media="screen" />
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
			<li class="current_page_item"><a href="#">Edit</a></li>
			<li><a href="user_certificate.php">Certificate</a></li>
			<li><a href="user_verify.php">Verify</a></li>
			
		</ul>
	</div>
	<!-- end #menu -->
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content">
					<div class="post">

					<h3 class="title"><a>求職條件</a></h3>
					<form action="user_submit_condition.php" method="post">	
					<h4 class="subtitle"><a>希望職務名稱</a></h4> 
						<textarea rows="3" cols="45"name="job"></textarea>
                    <h4 class="subtitle"><a>最快可上班日</a></h4> 
						<textarea rows="3" cols="45"name="time"></textarea> 
                    <h4 class="subtitle"><a>希望工作性質</a></h4> 
						<textarea rows="3" cols="45" name="property"></textarea>
					<h4 class="subtitle"><a>希望職務類別</a></h4> 
						<textarea rows="3" cols="45"name="category"></textarea>
					<h4 class="subtitle"><a>希望從事職務</a></h4> 
						<textarea rows="3" cols="45"name="industry"></textarea>
					<h4 class="subtitle"><a>希望工作地點</a></h4> 
						<textarea rows="3" cols="45"name="location"></textarea>
					<h4 class="subtitle"><a>希望上班時段</a></h4> 
						<textarea rows="3" cols="45"name="time"></textarea>
					<h4 class="subtitle"><a>希望薪資待遇</a></h4> 
						<textarea rows="3" cols="45"name="salary"></textarea>
    
                    <input type="submit" value="修改完成" class="button"><br/>
                    </form>
					</div>
					
					<div style="clear: both;">&nbsp;</div>
				</div>
				<!-- end #content -->
				<div id="sidebar">
					<ul>
					
						<li>
							<h2>edit resume</h2>
							<ul>
								<li><a href="user_basic.php">基本資料</a></li>
								<li><a href="user_education.php">學歷技能</a></li>
								<li><a href="user_condition.php">求職條件</a></li>
								<li><a href="user_autobiography.php">自傳特質</a></li>
							</ul>
						</li>
						
					</ul>
				</div>
				<!-- end #sidebar -->
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
