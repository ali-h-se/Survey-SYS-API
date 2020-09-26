
<?php
    require "db_connection.php";
    $n_id = $_GET["n_id"];
    $deleteNews = "delete from news where n_id='$n_id'";
    $delete = mysqli_query($connection,$deleteNews);
    if($delete){
        echo(json_encode(array("response" => "deleted")));
    }
    else{
        echo(json_encode(array("response" => "No Vote")));
    }
?>
<?php



?>