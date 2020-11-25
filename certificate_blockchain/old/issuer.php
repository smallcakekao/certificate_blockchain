<?php session_start(); //開啟session的語法 要放在檔案最上方?>
<?php
$account =  $_SESSION["account"];
$con = mysqli_connect("localhost","root","jasper51401","issuer");//連結伺服器
$data=mysqli_query($con,"SELECT * from issuer where account= '$account'");//選擇從user資料表中讀取所有的資料
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Light Theme</title>
<link href="issuer_dete.css" rel="stylesheet" type="text/css">
<script language="javascript" type="text/javascript" src="web3/node_modules/web3/dist/web3.min.js"></script>
<script src="javascript_sha.js"></script>


</head>
<body>
<!-- Main Container -->
<div class="container"> 
  <!-- Header -->
  <header class="header">
    <h4 class="logo"><?php while($rs=mysqli_fetch_array($data,MYSQLI_ASSOC)) {echo $rs['name']; }?></h4>
  </header>
  <!-- Hero Section -->
  <section class="intro">
    <div class="column">
      
      <img src="" alt="" class="profile"> </div>
      <div class="column">
      <p><?php $data=mysqli_query($con,"SELECT * from issuer where account= '$account'"); 
                while($rs=mysqli_fetch_array($data,MYSQLI_ASSOC)) 
                {echo "Account:",$rs['account'];
                  echo "<br/>"; 
                  echo "Password:",$rs['pass'];
                }?> </p>
      <p> </p>
    </div>
  </section>
	<!---------->
	<footer id="contact">
    <p class="hero_header">Upload USER certivicate:</p>
	 
        <div class="file-box">
        <form method="post" enctype="multipart/form-data">
        <nobr>
          <!--檔案名稱-->
          <input name="textfield" id="filename" class="filename" readonly="readonly">
          <!--上傳按鈕-->
          <input type="button" class="button" value="choose file">
          <!--原按鈕隱藏-->
          <input id="certificate_upload" type="file" name="file" class="file">
        <!--nobr不換行--></nobr>
        </form>
      </div>
      
      
  </footer>
   
  <section>
    <h2 class="noDisplay">Main Content</h2>
    
    <div class="columns">
     	 <form  id="form" method="post" class="file-box">
            考生名稱: <input type="text" class="form-control" name="username" ><br/>
            考試職業: <input type="text" class="form-control" name="user_work" /><br/>
          	考試日期與時間: <input type="text" class="form-control" name="test_data" placeholder="YYYY/MM/DD H/M/S "/><br/>
          	考生信箱: <input type="email" class="form-control" name="user_email" /><br/>
            考試類別: <input type="text" class="form-control" name="examtype" ><br/>
            生日: <input type="date" class="form-control" name="birth"/><br/>
            成績類別: <select id="select" name="final">
                        <option value="score">分數</option>
                        <option value="pass_or_not">及格/不及格</option>
                      </select><br/>
            分數: <input type="text" class="form-control" name="score"/><br/>
                  <input type="radio" name="pass" value="pass" checked/> 及格
                  <input type="radio" name="pass" value="no_pass" />不及格<br/>
          	性別: <input type="radio" name="sex" value="male" checked/> 男
                  <input type="radio" name="sex" value="female" /> 女<br/><br>
            <!--證書上傳: <br>
                  <input name="certificate" id="certificate_name"  readonly="readonly">
                  <input id="certificate_upload" type="file" name="certificate_upload" class="file" accept="image/*">
                  <input type="button" class="button" value="上傳檔案">
                  <br>-->
         	 <div id="userdata" type="submit" value="SUBMIT" class="button1">確定送出<br/>
          </form>
	  	</div>
    </section>
    
  <!-- Footer Section -->
  <!-- Copyrights Section -->
  <!--<div class="copyright">&copy;2019 - <strong>FCU</strong></div>--><textarea  class="columns" id="JSONContent" cols="68" rows="10" placeholder="JSON內容 " ></textarea><br>
  <footer class="secondary_header footer">
    <div class="copyright">&copy;2015 - <strong>SIMPLE Theme</strong></div>
  </footer>
</div>

<!-- Main Container Ends -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="remix_issuer.js"></script>

</body>
</html>
