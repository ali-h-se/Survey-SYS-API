
<?php
    require "db_connection.php";
    $username = $_GET["username"];
    $password = $_GET["password"];
    $result = mysqli_query($connection,"select * from users where username='$username'and password='$password'");
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        if($row["status"] == "Active"){
            $u_id = $row["u_id"];
            $name = $row["name"];
            $lname = $row["lname"];
            $meli = $row["code"];
            $phone = $row["phone"];
            $email = $row["email"];
            $response = array("response" => "user is valid", "u_id" => $u_id, "name" => $name, "lname" => $lname, "meli" => $meli, "phone" => $phone, "email" => $email);
            echo(json_encode($response));
        }
        else{
             echo(json_encode(array("response" => "Blocked user")));
        }

    }
    else{
        echo(json_encode(array("response" => "invalid user")));
    }
?>
