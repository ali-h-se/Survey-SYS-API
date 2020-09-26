
<?php
    require "db_connection.php";
    $u_id = $_GET["u_id"];
    $result = mysqli_query($connection,"SELECT vote.v_id,vote.subject,voting.option FROM vote JOIN voting ON vote.v_id=voting.v_id WHERE voting.u_id='$u_id'");
    $json_response = array();
    if($result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
        //printf ("%s %s %s %s\n", $row["name"], $row["lname"],$row["meli"],$row["phone"]);
        $v_id = $row["v_id"];
        $subject = $row["subject"];
        $option = $row["option"];
        $response = array("v_id" => $v_id, "subject" => $subject, "option" => $option);
        array_push($json_response,$response);
        }
    echo(json_encode($json_response));
    }
    else{
        echo(json_encode(array("response" => "No Participate")));
    }
?>
