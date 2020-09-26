
<?php
    require "db_connection.php";
    $v_id = uniqid();
    $u_id = $_POST["u_id"];
    $subject = $_POST["subject"];
    $pic = $_POST["pic"];
    $gen = $_POST["gen"];
    $op1 = $_POST["op1"];
    $op2 = $_POST["op2"];
    $region = $_POST["region"];
    $mydate=getdate(date("U"));
    $nowDate = "$mydate[year]-$mydate[mon]-$mydate[mday]";
    $bin = base64_decode($pic);
    $im = imagecreatefromstring($bin);
    if($im){
        $img_file = "image/$v_id.png";
        imagepng($im,$img_file,0);
        $insertVote = mysqli_query($connection,"insert into vote values('$v_id','$u_id','$subject','$img_file','$gen','$region','$nowDate')");
        $insertOp = "insert into option values('$v_id','$op1');";
        $insertOp .= "insert into option values('$v_id','$op2')";
        $insertOption = mysqli_multi_query($connection,$insertOp);
        if($insertOption and $insertVote){
            echo(json_encode(array("response" => "inserted")));
        }
        else{
            echo(json_encode(array("response" => "failed")));
        }
    }
    else{
        echo(json_encode(array("response" => "base64 is invalid")));
    }

?>
