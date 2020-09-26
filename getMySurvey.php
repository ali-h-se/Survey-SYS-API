
<?php
    require "db_connection.php";
    $u_id = $_GET["u_id"];
    $result = mysqli_query($connection,"select * from vote where u_id='$u_id'");
    $json_response = array();
    if($result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
        //printf ("%s %s %s %s\n", $row["name"], $row["lname"],$row["meli"],$row["phone"]);
        $v_id = $row["v_id"];
        $subject = $row["subject"];
        $pic = $row["pic"];
        $participate = mysqli_query($connection,"select count(v_id) as count from voting where v_id='$v_id'");
        $count = 0;
        if($participate->num_rows > 0){
            $countRow = $participate->fetch_assoc();
            $count = $countRow["count"];
        }
        $response = array("v_id" => $v_id, "subject" => $subject, "pic" => $pic, "number" => $count);
        array_push($json_response,$response);
        }
    echo(json_encode($json_response));
    }
    else{
        echo(json_encode(array("response" => "No Vote")));
    }
?>
