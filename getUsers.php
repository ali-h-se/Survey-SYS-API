
<?php
    require "db_connection.php";

    $result = mysqli_query($connection,"select * from users");
    $json_response = array();
    if($result){
        while ($row = $result->fetch_assoc()) {
        //printf ("%s %s %s %s\n", $row["name"], $row["lname"],$row["meli"],$row["phone"]);
        $u_id = $row["u_id"];
        $name = $row["name"];
        $lname = $row["lname"];
        $meli = $row["code"];
        $phone = $row["phone"];
        $email = $row["email"];
        $username = $row["username"];
        $password = $row["password"];
        $response = array("u_id" => $u_id, "name" => $name, "lname" => $lname, "meli" => $meli, "phone" => $phone, "email" => $email, "username" => $username, "password" => $password);
        array_push($json_response,$response);
        }
    echo(json_encode($json_response));
    }
    else{
        echo(json_encode(array("response" => "Not Find Users")));
    }
?>
