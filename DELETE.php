<?php
    

    header("Content-Type:application/json");
    $method = $_SERVER['REQUEST_METHOD'];
    if($method=='DELETE'){
    parse_str(file_get_contents("php://input"),$_DELETE);

    if(isset($_DELETE['id'])){
        $id=$_DELETE['id'];

    $result['status']= [
        "code"=>400,
        "description" => "Data di Hapus"
    ];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "javan";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "DELETE FROM budi WHERE id=$id";
    $conn->query($sql);

    $result['results']= [
        "id"=>$id
    ];
}else{
    $result['status']= [
        "code"=>400,
        "description" => "Parameter Failed"
    ];
}
}
else{
    $result['status']= [
        "code"=>400,
        "description" => "Failed"
    ];
}

echo json_encode($result);
?>

?>