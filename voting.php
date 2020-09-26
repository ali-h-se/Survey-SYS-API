
<?php
    require "db_connection.php";
    $v_id = $_GET["v_id"];
    $u_id = $_GET["u_id"];
    $option = $_GET["option"];
    $insertVoting = mysqli_query($connection,"insert into voting values('$v_id','$u_id','$option')");
    if($insertVoting){
        echo(json_encode(array("response" => "inserted")));
    }
    else{
        echo(json_encode(array("response" => "failed")));
    }
?>
