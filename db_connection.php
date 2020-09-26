<?php
    $connection = mysqli_connect("localhost","root","","surveydb");
    if($connection){
        echo(json_encode(array("response" => "connected")));

    }
    else{
        echo(json_encode(array("response" => "failed")));
    }
?>