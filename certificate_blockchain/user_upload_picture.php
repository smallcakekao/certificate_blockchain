<?php session_start(); //開啟session的語法 要放在檔案最上方?>
<?php
    
    //取得上傳檔案資訊
    //$filename=$_FILES['image']['name'];
    $tmpname=$_FILES['image2']['tmp_name'];
   // $filetype=$_FILES['image']['type'];
   // $filesize=$_FILES['image']['size'];    
    $file=NULL;
    $image = base64_encode(file_get_contents(addslashes($tmpname)));
    if(isset($_FILES['image']['error'])){    
        if($_FILES['image']['error']==0){                                    
            $instr = fopen($tmpname,"rb" );
            $file = addslashes(fread($instr,filesize($tmpname)));        
        }
    }
    $account =  $_SESSION["account"];
    //新增圖片到資料庫
    $conn=mysqli_connect("localhost","root","jasper51401","user");        
    //mysql_select_db("user",$conn);
    //mysql_query("SET NAMES'utf8'");
    $con="DELETE FROM imagedb where account='$account'";
    mysqli_query($conn,$con);
    $data="SELECT * from imagedb where account= '$account'"; 
    $delresult = mysqli_query($conn,$data);
    while($rs=mysqli_fetch_array($delresult,MYSQLI_ASSOC))
    {
        if($delresult["account"]=$account)
        "DELETE FROM imagedb where account='$account'";
    }

    $sql=sprintf("INSERT into imagedb(account,image)values('$account','$image')");
    
    $_SESSION["account"]=$account;        
    mysqli_query($conn,$sql); //若資料成功上傳 sql=true   
    mysqli_close($conn);
    header("refresh:0;url=user.php");
?>