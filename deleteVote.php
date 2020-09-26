
<?php
    require "db_connection.php";
    $v_id = $_GET["v_id"];
    $deleteVote = "delete from vote where v_id='$v_id';";
    $deleteVote .= "delete from option where v_id='$v_id';";
    $deleteVote .= "delete from voting where v_id='$v_id'";
    $delete = mysqli_multi_query($connection,$deleteVote);
    if($delete){
        echo(json_encode(array("response" => "deleted")));
    }
    else{
        echo(json_encode(array("response" => "No Vote")));
    }
?>
