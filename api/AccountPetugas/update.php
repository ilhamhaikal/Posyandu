<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    // include database and object files
    include_once '../config/database.php';
    include_once '../objects/account.php';
    
    // get database connection
    $database = new Database();
    $db = $database->getConnection();
    
    // prepare account object
    $account = new account($db);

    $func_account = $_POST['func_account'];

    if ($func_account == "update_data_account"){
        $data = $_POST['data_account'];
        $id_login = $_POST['id_login'];

        // $currentPassword = $data['current_password'];
        $newPassword = $data['new_password'];
        $confirmPassword = $data['confirm_password'];
        
        $result = $db->query("SELECT password FROM ref_login WHERE id_login = '$id_login'");
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $passFromDatabase = $row['password'];

        // if (password_verify($currentPassword, $passFromDatabase)){
            if ($newPassword == $confirmPassword){
                $account->id_login = $id_login;
                $account->username = $data['username'];
                $account->password = password_hash($newPassword, PASSWORD_DEFAULT);
                // update the account
                if($account->update()){
                
                    // set response code - 200 ok
                    http_response_code(201);
                
                    // tell the user
                    echo json_encode(array("message" => "account was updated."));
                }
                
                // if unable to update the account, tell the user
                else{
                
                    // set response code - 503 service unavailable
                    http_response_code(503);
                
                    // tell the user
                    echo json_encode(array("message" => "Unable to update account."));
                }
            } else {
                echo json_encode(array("message"=>"new password dan confirm password harus sama"));
            }
        // } else {
        //     echo json_encode(array("message"=>"current password yang dimasukkan salah"));
        // }
    } else if ($func_account == "update_data_account_admin"){
        $data = $_POST['data_account_admin'];
        $id_login = $_POST['id_login'];

        $currentPassword = $data['current_password'];
        $newPassword = $data['new_password'];
        $confirmPassword = $data['confirm_password'];
        
        $result = $db->query("SELECT password FROM ref_login WHERE id_login = '$id_login'");
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $passFromDatabase = $row['password'];

        if (password_verify($currentPassword, $passFromDatabase)){
            if ($newPassword == $confirmPassword){
                $account->id_login = $id_login;
                $account->username = $data['username'];
                $account->password = password_hash($newPassword, PASSWORD_DEFAULT);
                // update the account
                if($account->update()){
                
                    // set response code - 200 ok
                    http_response_code(201);
                
                    // tell the user
                    echo json_encode(array("message" => "account was updated."));
                }
                
                // if unable to update the account, tell the user
                else{
                
                    // set response code - 503 service unavailable
                    http_response_code(503);
                
                    // tell the user
                    echo json_encode(array("message" => "Unable to update account."));
                }
            } else {
                echo json_encode(array("message"=>"new password dan confirm password harus sama"));
            }
        } else {
            echo json_encode(array("message"=>"current password yang dimasukkan salah"));
        }
    }

?>