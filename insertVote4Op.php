
<?php
    require "db_connection.php";
    $v_id = uniqid();
    $u_id = $_POST["u_id"];
    $subject = $_POST["subject"];
    $pic = $_POST["pic"];
    $gen = $_POST["gen"];
    $op1 = $_POST["op1"];
    $op2 = $_POST["op2"];
    $op3 = $_POST["op3"];
    $op4 = $_POST["op4"];
    $mydate=getdate(date("U"));
    $nowDate = "$mydate[year]-$mydate[mon]-$mydate[mday]";
    $insertVote = mysqli_query($connection,"insert into vote values('$v_id','$u_id','$subject','$pic','$gen','$nowDate')");
    $insertOp = "insert into option values('$v_id','$op1');";
    $insertOp .= "insert into option values('$v_id','$op2');";
    $insertOp .= "insert into option values('$v_id','$op3');";
    $insertOp .= "insert into option values('$v_id','$op4')";
    $insertOption = mysqli_multi_query($connection,$insertOp);
    if($insertOption and $insertVote){
        echo(json_encode(array("response" => "inserted")));
    }
    else{
        echo(json_encode(array("response" => "failed")));
    }
?>
