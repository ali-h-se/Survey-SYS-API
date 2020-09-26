
<?php
    require "db_connection.php";
    $username = $_GET["username"];
    $password = $_GET["password"];
    $userIsSignUp = mysqli_query($connection,"select * from users where username='$username'and password='$password'");
    if($userIsSignUp->num_rows > 0){
        $result = mysqli_query($connection,"delete from users where username='$username' and password='$password'");
        echo(json_encode(array("response" => "user deleted")));
    }
    else{
        echo(json_encode(array("response" => "Not Find Users")));
    }
?>
