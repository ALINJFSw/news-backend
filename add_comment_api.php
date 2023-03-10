<?php

include("connection.php");

$response = [];

if(isset(
    $_POST["post_id"]) 
    &&
    $_POST["post_text"]) 
    
    
{
    $post_id = $_POST["post_id"];
    $post_text = $_POST["post_text"];
    $sql = "insert into comments (text, post_id) values (?,?)";
    $query = $mysqli -> prepare($sql);
    $query -> bind_param("si", $post_text,$post_id);
    $result = $query -> execute();
    if ($result) {
        $response["result"] = "added succefuly";
    }
    else {
        $response["result"] = "can't add comment";
    }
}

else {
    $response["result"] = "error";
}
echo json_encode($response);