<?php
 $name = $_post['name'];
 $email = $_post['email'];
 $title = $_post['title'];
 $description = $_post['description'];

 //data base connection
 $com = new mysqli('localhost','root','','test');
 if($conn->connct_error){
    die('Connection Failed : '.$conn->connect_error);
 }else{
    $stmt - $conn->prepare("isert into ideas(name, email, title, description)
    values(?, ?, ?, ?)");
    $stmt->bind_param("ssss",$name, $email,$title,$description);
    echo "registration Successfully....";
    $stmt->close();
    $conn->close();
 }
 ?>