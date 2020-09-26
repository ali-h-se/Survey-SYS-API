<?php

    require "db_connection.php";
    $n_id = $_POST["n_id"];
    $Change = mysqli_query($connection,"select * from news where n_id='$u_id'");
    if($Change->num_rows == 1){
        mysqli_query($connection,"update news set count = count + 1 where n_id='$u_id'");
        echo(json_encode(array("response" => "added")));
    }
    else{
        echo(json_encode(array("response" => "dont added")));
    }
?>