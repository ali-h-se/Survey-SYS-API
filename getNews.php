
<?php
    require "db_connection.php";
    $result = mysqli_query($connection,"select * from news");
    $mydate=getdate(date("U"));
    $nowDate = strtotime("$mydate[year]-$mydate[mon]-$mydate[mday]");
    $json_response = array();
    if($result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
        //printf ("%s %s %s %s\n", $row["name"], $row["lname"],$row["meli"],$row["phone"]);
            $voteDate = strtotime($row["date"]);
            if(round(($nowDate - $voteDate) / (60 * 60 * 24)) <= 10){
                $n_id = $row["n_id"];
                $subject = $row["subject"];
                $body = $row["body"];
                $date = $row["date"];
                $pic = $row["pic"];
                $response = array("n_id" => $n_id, "subject" => $subject, "body" => $body, "pic" => $pic, "date" => $date);
                array_push($json_response,$response);
            }
        }
        echo(json_encode($json_response));
    }
    else{
        echo(json_encode(array("response" => "No News")));
    }
?>
