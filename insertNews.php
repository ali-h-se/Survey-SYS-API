
<?php
    require "db_connection.php";
    $n_id = uniqid();
    $subject = $_POST["subject"];
    $pic = $_POST["pic"];
    $body = $_POST["body"];
    $mydate=getdate(date("U"));
    $nowDate = "$mydate[year]-$mydate[mon]-$mydate[mday]";
    $bin = base64_decode($pic);
    $im = imagecreatefromstring($bin);
    if($im){
        $img_file = "image/$n_id.png";
        imagepng($im,$img_file,0);
        $insertNews = mysqli_query($connection,"insert into news values('$n_id','$subject','$body','$nowDate','$img_file')");
        if($insertNews){
            echo(json_encode(array("response" => "inserted")));
        }
        else{
            echo(json_encode(array("response" => "failed")));
        }
    }
    else{
        echo(json_encode(array("response" => "base64 is invalid")));
    }

?>
