
<?php
    require "db_connection.php";
    $v_id = $_GET["v_id"];
    $result = mysqli_query($connection,"select * from option where v_id='$v_id'");
    $json_response = array();
    if($result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
        //printf ("%s %s %s %s\n", $row["name"], $row["lname"],$row["meli"],$row["phone"]);
            $option = $row["option"];
            $participate = mysqli_query($connection,"select count(v_id) as count from voting where v_id='$v_id' and option='$option'");
            $count = 0;
            if($participate->num_rows > 0){
                $countRow = $participate->fetch_assoc();
                $count = $countRow["count"];
            }
            $response = array("option" => $option , "num" => $count);
            array_push($json_response,$response);
        }
        echo(json_encode($json_response));
    }
    else{
        echo(json_encode(array("response" => "No Option")));
    }
?>
