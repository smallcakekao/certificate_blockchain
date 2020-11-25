<?php session_start(); //開啟session的語法 要放在檔案最上方?>
<?php
   $account =  $_SESSION["account"];
    //從資料庫取得圖片
    $conn=mysqli_pconnect("localhost","root","jasper51401");        
    mysql_select_db("user");
    mysql_query("SET NAMES'utf8'");
               
    $sql=sprintf("SELECT * from imagedb where account='$account'");
    $result=mysql_query($sql);        
    
    //顯示圖片
    if($row=mysql_fetch_assoc($result)){    
        header("Content-type: image/jpeg");     
        print $row['image'];
    }
    mysql_close($conn);
?>