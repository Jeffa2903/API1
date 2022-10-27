<?php

header("Content-Type:application/json");
$method = $_SERVER['REQUEST_METHOD'];
if($method=='GET'){

    $result['status']= [
        "code"=>400,
        "description" => "Valid"
    ];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "javan";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "SELECT * FROM budi";
    $hasil = $conn->query($sql);

    $result['results']= $hasil->fetch_all(MYSQLI_ASSOC);
}else{
    echo "Tidak Valid";
}

echo json_encode($result);
?>