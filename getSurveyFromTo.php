
<?php
    require "db_connection.php";
    $generic = $_GET["generic"];
    $from = strtotime($_GET["from"]);
    $to = strtotime($_GET["to"]);
    $result = mysqli_query($connection,"select * from vote where generic='$generic'");
    $json_response = array();
    if($result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
        //printf ("%s %s %s %s\n", $row["name"], $row["lname"],$row["meli"],$row["phone"]);
            $voteDate = strtotime($row["date"]);
            if($from <= $voteDate and $voteDate <= $to){
                $v_id = $row["v_id"];
                $u_id = $row["u_id"];
                $subject = $row["subject"];
                $pic = $row["pic"];
                $participate = mysqli_query($connection,"select count(v_id) as count from voting where v_id='$v_id'");
                $count = 0;
                if($participate->num_rows > 0){
                    $countRow = $participate->fetch_assoc();
                    $count = $countRow["count"];
                }
                $response = array("v_id" => $v_id, "u_id" => $u_id, "subject" => $subject, "pic" => $pic, "number" => $count);
                array_push($json_response,$response);
            }
        }
        echo(json_encode($json_response));
    }
    else{
        echo(json_encode(array("response" => "No Vote")));
    }
?>
