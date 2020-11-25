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
<link href="user_certificate_css1.css" rel="stylesheet" type="text/css" media="screen" />
<script language="javascript" type="text/javascript" src="web3/node_modules/web3/dist/web3.min.js"></script>
<script src="javascript_sha.js"></script>
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
					<select name="js_file_name" class="js_file_name">
  						<option value="">請選擇</option>
　						<option value="remix_user.js">多益</option>
　						<option value="remix_user2.js">逢甲大學</option>
					</select>
					<div class="post">
						<h3 class="title">Upload  your  certivicate</h3>
						
						<div class="file-box">
							<form method="post" enctype="multipart/form-data">
							<nobr>
							<!--檔案名稱-->
							<input name="textfield" id="filename" class="filename" readonly="readonly">
							<!--上傳按鈕-->
							<input type="button" class="button" value="choose file">
							<!--原按鈕隱藏-->
							<input id= "file123" type="file" name="file" class="file" >
							<!--nobr不換行--></nobr>
							</form>
						</div>
						<nobr>
						<div id="verify" class="button" >SUBMIT </div>
						<p id="issuer_name"></p>
						<div id="verify2" class="button" >機構單位</div></nobr>
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
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script>
	

	window.onload = function () {
     document.getElementById('file123').onchange = readFile;
     //document.getElementById('certificate_upload').onchange = readFile;
 };
 
 function readFile() {
   console.log(this.files[0]);
   file = this.files[0];
   document.getElementById('filename').value = file.name;
   var fReader = new FileReader();           
   fReader.onload = function (event) {
     message = event.target.result;
	 var user = JSON.parse(message);
	 //console.log(user.certification.image);
	 context = user.certification.image;
	 issuer = user.certification.issuer.name;
     user_score = user.certification.score;
     user_pass = user.certification.pass;

     
   };
   fReader.readAsText(file);
 }	 
	
	   $('.js_file_name').on('change',function(){
 			const selectedJsName = this.value;
  			if(selectedJsName){
			/* selected option的值不為空白時才執行 */
			$.getScript( this.value +'?time='+Math.random() )
			/* this.value 後面帶?time=加隨機數字 是常規避免讀取js檔cache問題的簡單作法 */
			.done(function( script, textStatus ) {
			console.log( '(from htm)'+selectedJsName+' loaded '+textStatus ); /* 若js檔有載入成功會在console顯示'success' */
			//$('.loadedJsContent2Txt').html(selectedJsName+'載入內容為:<br/>'+script.replace(/\n/gi,"<br/>"));
			})
			.fail(function( jqxhr, settings, exception ) {
			console.log( "Triggered ajaxError handler." );
			});
			}else{
				//$('.loadedJsContent2Txt').html("沒有選擇內容...");
			}
		});
	
	$("#verify").click(function(){
   //console.log(context);
   string_hash = hex_sha256(context);
   
   transaction.verify(string_hash, function (err, result) {
    //console.log(err, result);
	if(!err){console.log(result);
		if(result == true){
			alert("驗證完成");
			
			var len = context.length;
			
			context=context.replace(/\&/g,"%26");
			context=context.replace(/\+/g,"%2B");
			transaction.change_verify(string_hash, function (err, result) {
				//console.log(err, result);
				if(!err){
				}
				});
			$.ajax({
				//告訴程式表單要傳送到哪裡                                         
				url:"test.php",                                                              
				//需要傳送的資料
				data:{value: context, issuer: issuer, user_score: user_score, user_pass: user_pass, No: string_hash },  
				 //使用POST方法     
				type : "POST",                                                                    
				error:function(){                                                                 
				//資料傳送失敗後就會執行這個function內的程式，可以在這裡寫入要執行的程式  
				alert("失敗");
				},
				//傳送成功則跳出成功訊息
				success:function(){                                                           
				//資料傳送成功後就會執行這個function內的程式，可以在這裡寫入要執行的程式  
				alert("成功");
				//console.log(context);
				},
			}); 
			
		}
		else
			alert("無此證書");
    }
	});
	
});

</script>
</body>
</html>
