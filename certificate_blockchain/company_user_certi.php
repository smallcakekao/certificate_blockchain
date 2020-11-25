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
<script language="javascript" type="text/javascript" src="web3/node_modules/web3/dist/web3.min.js"></script>
<script src="javascript_sha.js"></script>
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
				<select name="js_file_name" class="js_file_name">
  						<option value="">請選擇</option>
　						<option value="remix_company.js">TOEIC</option>
　						<option value="remix_company2.js">逢甲大學</option>
					</select>
					<div class="post">
						<h2 class="title"><?php while($rs=mysqli_fetch_array($data,MYSQLI_ASSOC)) {echo $rs['name']; }?></a></h2>
						
						<div id="t"><?php include('display_company_user.php');?></div>
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

<!--預覽區塊-->
<img id="demo"/>
<div id="footer">
	<p>&copy;  2019-FCU ITES | FAN WEI-HSUAN & KAO CHIH-YUAN</p>
</div>
<!-- end #footer -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script>

	$('.js_file_name').on('change',function(){
			 const selectedJsName = this.value;
			 const selected = $(this).find("option:selected").text();
  			if(selectedJsName){
			/* selected option的值不為空白時才執行 */
			$.getScript( this.value +'?time='+Math.random() )
			/* this.value 後面帶?time=加隨機數字 是常規避免讀取js檔cache問題的簡單作法 */
			.done(function( script, textStatus ) {
			console.log( '(from htm)'+selectedJsName+' loaded '+textStatus +" "+ selected); /* 若js檔有載入成功會在console顯示'success' */
			})
			.fail(function( jqxhr, settings, exception ) {
			console.log( "Triggered ajaxError handler." );
			});
			}else{
				//$('.loadedJsContent2Txt').html("沒有選擇內容...");
			}
	});

	$("#t img").click(function(){
		//console.log($(this).attr("src"));
		context = $(this).attr("src");
		context=context.replace(/%26/g,"&");///\&/g
		context=context.replace(/%2B/g,"+");
		string_hash = hex_sha256(context);
		//console.log(context);
		transaction.verify_second(string_hash, function (err, result) {
			if(!err){
				if(result == true){
					alert("此證書存在");
					/*transaction.search(string_hash, function (err, result) {
						if(!err){
							alert("證書持有者:"+result[0]+"\n持有者Email:"+result[1]+"\n證書類型:"+result[2]+"\n證書標準:"+result[3]+"\n證書分數:"+result[4]);
						}
					});*/
				}
			}
			else
				alert("無此證書");
		});
	});

	$('#file').change(function() {
  var file = $('#file')[0].files[0];
  var reader = new FileReader;
  reader.onload = function(e) {
    $('#demo').attr('src', e.target.result);
  };
  reader.readAsDataURL(file);
});
	//console.log($("[name='img']:checked").val());
</script>
</body>
</html>
