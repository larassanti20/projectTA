<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once '../config/config.php';
    include_once '../class/suhu.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new Nodemcu_log($db);
	
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		// The request is using the POST method
		$data = json_decode(file_get_contents("php://input"));
		$item->suhu = $data->suhu;
		$item->kondisiSuhu = $data->kondisiSuhu;
		$item->getar = $data->getar;
		$item->kondisiGetar = $data->kondisiGetar;
		
	} 
    elseif ($_SERVER['REQUEST_METHOD'] === 'GET'){
		// The request is using the GET method
		$item->suhu = isset($_GET['suhu']) ? $_GET['suhu'] : die('wrong structure!');
		$item->kondisiSuhu = isset($_GET['kondisiSuhu']) ? $_GET['kondisiSuhu'] : die('wrong structure!');
		$item->getar = isset($_GET['getar']) ? $_GET['getar'] : die('wrong structure!');
		$item->kondisiGetar = isset($_GET['kondisiGetar']) ? $_GET['kondisiGetar'] : die('wrong structure!');
		
	}else {
		die('wrong request method');
	}
	
    if($item->createLogData()){
        echo 'Data created successfully.';
    } else{
        echo 'Data could not be created.';
    }

     if($item->createLogData2()){
        echo 'Data created successfully.';
    } else{
        echo 'Data could not be created.';
    }
?>