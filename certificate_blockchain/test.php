<?php session_start(); //開啟session的語法 要放在檔案最上方?>
<?php
    
    //取得上傳檔案資訊
    //$filename=$_FILES['image']['name'];
    //$tmpname=$_FILES['image2']['tmp_name'];
   // $filetype=$_FILES['image']['type'];
   // $filesize=$_FILES['image']['size'];
   $image = $_POST['value'];
   $issuer = $_POST['issuer'];
   $user_score = $_POST['user_score'];
   $user_pass = $_POST['user_pass'];
   $No = $_POST['No'];
    $file=NULL;
    //echo $issuer,$user_score,$user_pass,$No;
    //$image = base64_encode(file_get_contents(addslashes($tmpname)));
    /*if(isset($_FILES['image']['error'])){    
        if($_FILES['image']['error']==0){                                    
            $instr = fopen($tmpname,"rb" );
            $file = addslashes(fread($instr,filesize($tmpname)));        
        }
    }*/
    $account =  $_SESSION["account"];
    //新增圖片到資料庫
    
    $conn=mysqli_connect("localhost","root","jasper51401","user");        
    //mysql_select_db("user",$conn);
    //mysql_query("SET NAMES'utf8'");
   
    
    $data="SELECT * from certificate where account= '$account'"; 
    $delresult = mysqli_query($conn,$data);
    /*while($rs=mysqli_fetch_array($delresult,MYSQLI_ASSOC))
    {
        if($delresult["account"]=$account)
        "DELETE FROM certificate where account='$account'";
    }*/

    
    
    $_SESSION["account"]=$account;        
    mysqli_query($conn,"INSERT into certificate(account,image_base64,issuer,score,pass,No_ID)values('$account','$image','$issuer','$user_score','$user_pass','$No')"); //若資料成功上傳 sql=true   
    mysqli_close($conn);
    header("refresh:0;url=user_certificate.php");
?>