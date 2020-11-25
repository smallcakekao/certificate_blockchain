<?php session_start(); //開啟session的語法 要放在檔案最上方?>
<?php
$account =  $_SESSION["account"];
$con = mysqli_connect("localhost","root","jasper51401","user");//連結伺服器
//mysqli_query("set names utf8");//以utf8讀取資料，讓資料可以讀取中文
$data=mysqli_query($con,"SELECT * from user where account= '$account'");//選擇從user資料表中讀取所有的資料
$_SESSION["account"] = $account;
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Light Theme</title>
<link href="user_css2.css" rel="stylesheet" type="text/css">
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
    <div class="column"><!--照片-->

     
      
      </div>
      <div class="column">
     
      <h2><?php $data=mysqli_query($con,"SELECT * from user where account= '$account'"); 
                while($rs=mysqli_fetch_array($data,MYSQLI_ASSOC)) 
                {echo $rs['name'];
                  echo "<br/>"; 
                  echo $rs['birth'];
                  echo "<br/>"; 
                  echo $rs['male'];
                  echo "<br/>"; 
                  echo $rs['phone'];
                  echo "<br/>"; 
                  echo $rs['email'];
                }?> </h2>
    </div>
  </section>
	<!---------->
	<footer id="contact">
    <p class="hero_header">Check User certificate:</p>
	 
        <div class="file-box">
        <form method="post" enctype="multipart/form-data">
        
          <input type="text" class="filename" name="username" placeholder="考生名稱"><br/>
           <input type="email" class="filename" name="user_email"  placeholder="考生信箱"/><br/>
        <!--nobr不換行-->
        </form>
      </div>
      <div id="verify" class="button" >SUBMIT </div>
      
  </footer>

  <!-- Stats Gallery Section -->
<form id="form" >
  <div class="gallery">
    <div class="thumbnail"> <a href="#"><img src="image/pi.jpg" alt="" width="2000" class="cards"/></a>
    </div>
    <div class="thumbnail"> <a href="#"><img src="image/itsa.jpg" alt="" width="2000" class="cards"/></a>
      
    </div>
  
  </div>
  
</form>

  <!-- Footer Section -->
  <!-- Copyrights Section -->
  <div class="copyright">&copy;2019 - <strong>FCU</strong></div>
</div>
<!-- Main Container Ends -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="remix_user1.js"></script>
</body>
</html>
