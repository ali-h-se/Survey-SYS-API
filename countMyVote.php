
<?php
    require "db_connection.php";
    $u_id = $_GET["u_id"];
    $result = mysqli_query($connection,"SELECT u_id,COUNT(v_id) as numS FROM vote WHERE u_id = '$u_id'");
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        //printf ("%s %s %s %s\n", $row["name"], $row["lname"],$row["meli"],$row["phone"]);
        $u_id = $row["u_id"];
        $numS = $row["numS"];
        echo(json_encode(array("u_id" => $u_id, "numS" => $numS)));
    }
    else{
        echo(json_encode(array("response" => "No Survey")));
    }
?>
