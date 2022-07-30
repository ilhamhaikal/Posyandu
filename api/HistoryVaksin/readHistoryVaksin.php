<?php
    header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

	//include database
	include_once '../config/database.php' ;
	include_once '../objects/history.php';

	//inistantiate database and product object
	$database = new Database();
	$db = $database->getConnection();

    $history = new History($db);

    $id_anak = isset($_GET['id_anak']) ? $_GET['id_anak'] : "";    

    $history->id_anak = $id_anak;
        
        $stmt = $history->readHistory();
		$num = $stmt->rowCount();
		//check if more than 0 record found
		if($num>0){

			$history_arr=array();
			$history_arr["records"]=array();

			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

                extract($row);

                $history=array(
                        "tgl_imunisasi"=>$tgl_imunisasi,
                        "id_vaksin"=>$id_vaksin
                );
                array_push($history_arr["records"], $history);
			}
			http_response_code(200);

			echo json_encode($history_arr);

		}
		else{
			echo json_encode(
				array("message" => "500 ERROR")
			);
		}
    
?>