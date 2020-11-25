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
<link href="issuer_upload_css1.css" rel="stylesheet" type="text/css" media="screen" />
<script language="javascript" type="text/javascript" src="web3/node_modules/web3/dist/web3.min.js"></script>
<script src="javascript_sha.js"></script>
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
			<li><a href="issuer.php">Homepage</a></li>
			<li class="current_page_item"><a href="#">Upload</a></li>
			
		</ul>
	</div>
	<!-- end #menu -->
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content">
					<div class="post">
						<h3 id="issuer_main_name" class="title"><?php while($rs=mysqli_fetch_array($data,MYSQLI_ASSOC)) {echo $rs['name']; }?></a></h3>
                        
						<form id="form"  class="file-box">
							<!--檔案名稱-->
							<nobr><input name="textfield" id="filename" class="filename" readonly="readonly">
							<!--上傳按鈕-->
							<input type="button" class="button" value="choose file">
							<!--原按鈕隱藏-->
							<input id="certificate_upload" type="file" name="file" class="file"><nobr>
							<h4 class="title">機構名稱:
								<input type="text" class="form-control" name="issuer_name"></h4>
								
                            <h4 class="title">機構電子郵件:
								 <input type="email" class="form-control" name="issuer_email"></h4>
								 
                            <h4 class="title">機構電話:
								<input type="text" class="form-control" name="TEL" /></h4> 
								
                            <h4 class="title">機構地址:    
								<input type="text" class="form-control" name="issuer_address"/></h4>
								
                            <h4 class="title">機構測驗類別:    
								<input type="text" class="form-control" name="issuer_test"/></h4>
								
                           <h4 class="title">考生名稱:
								<input type="text" class="form-control" name="username"></h4>
								
                            <h4 class="title">考試職業:
								 <input type="text" class="form-control" name="user_work"></h4>
								 
                            <h4 class="title">考試日期與時間:
								<input type="text" class="form-control" name="test_data" placeholder="YYYY/MM/DD H/M/S "/></h4> 
								
                            <h4 class="title">考生信箱:    
								<input type="email" class="form-control" name="user_email"/></h4>
								
                            <h4 class="title">考試類別:    
								<input type="text" class="form-control" name="examtype"/></h4>
								
                            <h4 class="title" >生日:
								<input type="date" class="form-control" name="birth"/></h4>
								
                            <h4 class="title">分數:
								<input type="text" class="form-control" name="score"/></h4>
								
                            <h5 class="title" >判斷結果:
                                <input type="radio" name="pass" value="及格" checked/> 及格
                                <input type="radio" name="pass" value="不及格" />不及格
                                <input type="radio" name="pass" value="無標準"/>無標準</h5>
                            <h5 class="title" >性別:    
                                <input type="radio" name="sex" value="male" checked/> 男
                                <input type="radio" name="sex" value="female"/> 女</h5>
                            
                         
                        </form>
                     
                        <textarea class="size" id="JSONContent" cols="68" rows="10" placeholder="JSON內容" ></textarea><br>
                    </div>
					<input id="userdata" type="submit" value="SUBMIT" class="button2"><br/>
					
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="contract_cho1.js"></script>
</body>
</html>
