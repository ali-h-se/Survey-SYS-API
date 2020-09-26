
<?php
    require "db_connection.php";
    $v_id = $_GET["v_id"];
    $result = mysqli_query($connection,"select * from option where v_id='$v_id'");
    $json_response = array();
    if($result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
        //printf ("%s %s %s %s\n", $row["name"], $row["lname"],$row["meli"],$row["phone"]);
        $option = $row["option"];
        $response = array("option" => $option);
        array_push($json_response,$response);
        }
    echo(json_encode($json_response));
    }
    else{
        echo(json_encode(array("response" => "No Option")));
    }
?>
