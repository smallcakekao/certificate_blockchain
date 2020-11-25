<?php session_start(); //開啟session的語法 要放在檔案最上方?>
<?php
$account =  $_SESSION["account"];
$con = mysqli_connect("localhost","root","jasper51401","company");//連結伺服器
$data=mysqli_query($con,"SELECT * from company where account= '$account'");//選擇從user資料表中讀取所有的資料
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
<link href="company_capability_one_css.css" rel="stylesheet" type="text/css" media="screen" />
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
            <li><a href="company_jobseeker.php">jobseeker</a></li>
            <li class="current_page_item"><a href="#">capability</a></li>
			
		</ul>
	</div>
	<!-- end #menu -->
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content">
					<div class="post">
                        <h2 class="title"><?php while($rs=mysqli_fetch_array($data,MYSQLI_ASSOC)) {echo $rs['name']; }?></a></h2>
                        
                        <form action="company_capability_two.php" method="post" style="text-align:center">
                           <h4 class="title" style="text-align:center">機構機構:
                                <input type="radio" name="category" value="TOEIC" checked/> TOEIC
                                <input type="radio" name="category" value="TOEFL" />TOEFL
                                <input type="radio" name="category" value="IELTS"/>IELTS
                                <input type="radio" name="category" value="全民英檢-初級"/>全民英檢-初級
                                <input type="radio" name="category" value="全民英檢-中級"/>全民英檢-中級
                                <input type="radio" name="category" value="全民英檢-中高級"/>全民英檢-中高級</h4>

                                <h5 class="title" >分數:
							    <input type="text" class="form-control" name="score"/></h5>
								
                            <h5 class="title">判斷結果:
                                <input type="radio" name="pass" value="通過" checked/> 通過
                                <input type="radio" name="pass" value="不通過" />不通過
                                <input type="radio" name="pass" value="無標準"/>無標準</h5>
                         <input type="submit" value="SEARCH" class="button"><br/>
                        
                        </form> 
                      
						
						
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
