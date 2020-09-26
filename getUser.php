<?php

    require "db_connection.php";
    $u_id = $_GET["u_id"];
    $result = mysqli_query($connection,"select * from users where u_id='$u_id'");
    if($result){
        $u_id = $row["u_id"];
        $name = $row["name"];
        $lname = $row["lname"];
        $meli = $row["code"];
        $phone = $row["phone"];
        $email = $row["email"];
        $username = $row["username"];
        $password = $row["password"];
        $response = array("u_id" => $u_id, "name" => $name, "lname" => $lname, "meli" => $meli, "phone" => $phone, "email" => $email, "username" => $username, "password" => $password);
        echo(json_encode($response)); 
    }

    else{
        echo(json_encode(array("response" => "User Not Find")));
    }

?>