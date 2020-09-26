
<?php
    require "db_connection.php";
    $u_id = $_GET["u_id"];
    $v_id = $_GET["v_id"];
    $result = mysqli_query($connection,"select * from voting where v_id = '$v_id' and u_id='$u_id'");
    if($result->num_rows > 0){
        echo(json_encode(array("response" => "participate")));
    }
    else{
        echo(json_encode(array("response" => "did not participate")));
    }
?>
