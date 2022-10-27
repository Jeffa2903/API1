<?php

header("Content-Type:application/json");
$method = $_SERVER['REQUEST_METHOD'];
if($method=='PUT'){
    parse_str(file_get_contents("php://input"),$_PUT);
    if(isset($_PUT['id']) AND isset($_PUT['nama']) AND isset($_PUT['jenis_kelamin']) AND isset($_PUT['statuss']) AND isset($_PUT['ortu'])){
        
                
                $nama=$_PUT['nama'];
				$jenis_kelamin=$_PUT['jenis_kelamin'];
				$status=$_PUT['statuss'];	
				$orang_tua=$_PUT['ortu'];
                $id=$_PUT['id'];
    
    $result['status']= [
        "code"=>200,
        "description" => "Update Berhasil"
    ];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "javan";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "UPDATE budi SET
    nama='$nama',
    jenis_kelamin='$jenis_kelamin',
    statuss='$status',
    ortu='$orang_tua' WHERE id='$id'";
    $conn->query($sql);

    $result['status']= [
        "code"=>200,
        "description" => "Data Di Update"
    ];
    $result['results']= [
                "nama"=>$nama,
                "jenis_kelamin"=>$jenis_kelamin,
                "statuss"=>$status,
                "ortu"=>$orang_tua

    ];
}else{
    $result['status']= [
        "code"=>400,
        "description" => "Parametr Failed"
    ];
}
}else{
    $result['status']= [
        "code"=>400,
        "description" => "GAGAL"
    ];
}

echo json_encode($result);
?>