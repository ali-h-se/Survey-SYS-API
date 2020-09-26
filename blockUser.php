
<?php
    require "db_connection.php";
    $username = $_GET["username"];
    $result = mysqli_query($connection,"update users set status='Block' where username='$username'");
    if($result){
         echo(json_encode(array("response" => "block user")));
    }
    else{
        echo(json_encode(array("response" => "failed")));
    }
?>
