<?php

    require "db_connection.php";
    $u_id = $_POST["u_id"];
    $name = $_POST["name"];
    $lname = $_POST["lname"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $code = $_POST["code"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $Change = mysqli_query($connection,"select * from users where u_id='$u_id'");
    $row = $Change->fetch_assoc();
    $validateUserName = TRUE;
    $validateCode = TRUE;
    if($row["username"] != $username){
        $result = mysqli_query($connection,"select * from users where username='$username'");
        if($result->num_rows > 0){
            $validateUserName = FALSE;
        }
    }
    if($row["code"] != $code){
        $result = mysqli_query($connection,"select * from users where code='$code'");
        if($result->num_rows > 0){
            $validateCode = FALSE;
        }
    }
    if($validateUserName and $validateCode){

        $edit = mysqli_query($connection,"update users set name='$name',lname='$lname',username='$username',password='$password',code='$code',phone='$phone',email='$email' where u_id='$u_id'");
        echo(json_encode(array("response" => "user info edited")));
    }
    else{
        if(!$validateUserName){
            echo(json_encode(array("response" => "username is available")));
        }
        else{
            echo(json_encode(array("response" => "code is available")));
        }
    }

?>