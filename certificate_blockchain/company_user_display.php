<?php if (!isset($_SESSION)) {
    session_start();
} //開啟session的語法 要放在檔案最上方?>
<?PHP 
 //display_.php3
 $account =  $_SESSION["account"];
 $user =  $_SESSION["user"];
 $conn=mysqli_connect("localhost","root","jasper51401","user");   
 $result=mysqli_query($conn,"SELECT * FROM imagedb WHERE account='$user'");
 $row=mysqli_fetch_array($result);
 //Header( "Content-type: image/jpeg");
 echo 'data:image/jpeg;base64,'.$row['image'];
 $_SESSION["account"] = $account;
$_SESSION["user"] = $user;
 ?>