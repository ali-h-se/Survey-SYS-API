
<?php
    require "db_connection.php";
    $from = strtotime($_GET["from"]);
    $to = strtotime($_GET["to"]);
    $result = mysqli_query($connection,"select * from news");
    $json_response = array();
    if($result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
        //printf ("%s %s %s %s\n", $row["name"], $row["lname"],$row["meli"],$row["phone"]);
            $newsDate = strtotime($row["date"]);
            if($from <= $newsDate and $newsDate <= $to){
                $v_id = $row["n_id"];
                $subject = $row["subject"];
                $body = $row["body"];
                $tag = $row["tag"];
                $seen = $row["seen"];
                $pic = $row["pic"];
                $date = $row["date"];
                $response = array("n_id" => $n_id, "subject" => $subject, "body"=>$body, "pic" => $pic, "seen" => $seen, "tag" => $tag, "date" => $date);
                array_push($json_response,$response);
            }
        }
        echo(json_encode($json_response));
    }
    else{
        echo(json_encode(array("response" => "No News")));
    }
?>
