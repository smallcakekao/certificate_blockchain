<?php session_start(); //開啟session的語法 要放在檔案最上方?>
<?php
 header("Content-type:text/html;charset=utf-8");
 $username = $_POST["user"];
 $pass = $_POST["pass"];
 $pass2=$_POST["pass2"];
 $email = $_POST["email"];
 $birth = $_POST["birth"];
 $name = $_POST["name"];
 $sex = $_POST["sex"];
 $phone = $_POST["phone"];
 
 $link = mysqli_connect("localhost", "root","jasper51401","user");
 //mysql_select_db("user", $link);
 
 $result = mysqli_query($link,"insert into user(account,pass,email,birth,name,male,phone) values ('$username','$pass','$email','$birth','$name','$sex','$phone')");
 //mysql_query("set names utf8", $link);
 
 
            
  mysqli_query($sql);  
  if ($result && $pass==$pass2) {
    $account = $username;
		
    $_SESSION["account"] = $account; 
    header("refresh:0;url=user.php");//如果成功跳轉至user.html頁面
		exit;
  }
  else{ 
  echo"註冊失敗";
  header("refresh:0;url=home.html");
  /*$r = mysql_query("insert into user values ('{$user}','{$pass}')");
  if ($r) echo "成功" . "<hr>";
  else echo "失败" . "<hr>";*/
 }
?>