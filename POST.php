<?php

header("Content-Type:application/json");
$method = $_SERVER['REQUEST_METHOD'];
if($method=='POST'){

    if(isset($_POST['nama']) AND isset($_POST['jenis_kelamin']) AND isset($_POST['statuss']) AND isset($_POST['ortu'])){
                $nama=$_POST['nama'];
				$jenis_kelamin=$_POST['jenis_kelamin'];
				$status=$_POST['statuss'];	
				$orang_tua=$_POST['ortu'];
    }
    $result['status']= [
        "code"=>200,
        "description" => "Insert Berhasil"
    ];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "javan";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "INSERT INTO budi (nama,jenis_kelamin,statuss,ortu)
    VALUES ('$nama','$jenis_kelamin','$status','$orang_tua')";
    $conn->query($sql);

    $result['results']= [
                "nama"=>$nama,
                "jenis_kelamin"=>$jenis_kelamin,
                "statuss"=>$status,
                "ortu"=>$orang_tua

    ];
}else{
    $result['status']= [
        "code"=>400,
        "description" => "Tidak Valid"
    ];
}

echo json_encode($result);
?>