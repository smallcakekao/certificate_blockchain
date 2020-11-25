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
<link href="company_capability_two_css.css" rel="stylesheet" type="text/css" media="screen" />
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
                        <h2 class="title"><?php while($rs=mysqli_fetch_array($data,MYSQLI_ASSOC)) {echo $rs['name']; }?></h2>
                        
                        <li><a href="company.php"> <?php
                            header("Content-type:text/html;charset=utf-8");
                            $category = $_POST["category"];
                            $score = $_POST["score"];
                            $pass=$_POST["pass"];
                            
                            
                            require("connect_user.php");
                            $sql_query_login="SELECT * FROM certificate where issuer='$category'";


                            $result1=mysqli_query($db_link,$sql_query_login) or die("查詢失敗");
                            while($rs=mysqli_fetch_array($result1,MYSQLI_ASSOC)){
                               if($rs['pass']=='通過'||$rs['score']>=$score)
                               {
                                   $account=$rs['account'];
                                    $sql2_query_login="SELECT * FROM user where account='$account'";
                                    $result2=mysqli_query($db_link,$sql2_query_login) or die("查詢失敗");
                                    $rs2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                    echo $rs2['name'];
                                    echo $rs2['email'];
                                    echo "<br/>"; 
                               }
                              
                                //header("refresh:0;url=company_user.php");//如果成功跳轉至user.html頁面
                                //exit;
                                
                            }
                            
                            ?></a></li>
                      
						
						
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
