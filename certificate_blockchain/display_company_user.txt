<?php if (!isset($_SESSION)) {
    session_start();
} //開啟session的語法 要放在檔案最上方?>
<?PHP 
 //display_.php3
 $account =  $_SESSION["account"];
 $conn=mysqli_connect("localhost","root","jasper51401","user");        
 //mysqli_query("SET NAMES'utf8'"); 
 $result=mysqli_query($conn,"SELECT * from certificate WHERE account='$account'");
 //$row=mysqli_fetch_array($result);

 //Header( "Content-type: image/jpeg");
 
    /*for ( $i=1 ; $i<5 ; $i=$i+2 ) {
        echo '<img src="data:image/jpeg;base64,'.$row[$i]."\">";
    }*/
    while ($row = mysqli_fetch_array($result)) {
        echo "<img src=\"".$row['image_base64']."\""." width=\"1000\" height=\"750\"\>";
    }
 //echo 'data:image/jpeg;base64,'.$row[1];
 
 ?>