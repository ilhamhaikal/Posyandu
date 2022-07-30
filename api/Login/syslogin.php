<?php
    //required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../config/database.php';
    include_once '../objects/login.php';
    include_once '../objects/petugas.php';
    
    $database = new Database();
    $db = $database->getConnection();

    $login = new Login($db);

    $data = $_POST['data_login'];

    $login->username = $data['username'];
    $login->password = $data['password'];
     
    $query = $login->login();
    $row = $query->fetch(PDO::FETCH_ASSOC);
	
    if ($row['id_login'] != 1 && password_verify($login->password, $row['password'])){
        if ($query->rowCount() > 0){
            session_start();
            $_SESSION['username_petugas'] = $login->username;
            $_SESSION['profile_id'] = $row['id_petugas_login'];
            $_SESSION['id_login'] = $row['id_login'];
            echo json_encode(array("message" => "petugas berhasil login"));
        }
    } else if (password_verify($login->password, $row['password'])){
        if ($query->rowCount() > 0){
            session_start();
            $_SESSION['username_admin'] = $login->username;
            $_SESSION['id_login_admin'] = $row['id_login'];
            echo json_encode(array("message" => "admin berhasil login"));
        }
    } else {
        echo json_encode(array("message" => "username dan password tidak sesuai"));
    }
    
?>
