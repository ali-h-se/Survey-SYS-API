
<?php
    require "db_connection.php";
    $u_id = uniqid();
    $name = $_POST["name"];
    $lname = $_POST["lname"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $code = $_POST["code"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $region = $_POST["region"];
    $status = "Active";
    $result = mysqli_query($connection,"select * from users where username='$username' or code='$code'");
    if($result->num_rows > 0){
        echo(json_encode(array("response" => "user was signed up")));
    }
    else{
        $insert = mysqli_query($connection,"insert into users values('$u_id','$name','$lname','$username','$password','$code','$phone','$email','$region','$status')");
        echo(json_encode(array("response" => "user signing up")));
    }
?>
