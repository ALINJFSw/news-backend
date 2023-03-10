<?php

include("connection.php");

 $sql = "select * from news_posts";

$query = $mysqli -> prepare($sql);
$query -> execute();
$query -> store_result();
$num_rows = $query-> num_rows();
$query -> bind_result($id,$title, $image, $date,$p1,$p2,$p3,$author,$comments);
$query -> fetch();
$response = [];

if($num_rows){
    $response["result"] = "succes";
    $response["title"] = $title;
    $response["image"] = $image;
    $response["author"] = $author;
    $response["date"] = $date;
    $response["p1"] = $p1;
    $response["p2"] = $p2;
    $response["p3"] = $p3;
}
else {
    $response["result"] = "error";
}

echo json_encode($response);