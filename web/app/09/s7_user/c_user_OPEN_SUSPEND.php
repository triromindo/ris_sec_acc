<?php

$isRun = true;
/**
 * PSEDUO DELETE
 * 1. Hapus data
 */
if ($isRun) {

    //  Table
    $varUserID = $_REQUEST['id'];

    $tmpQueryString = sprintf("
            UPDATE `10sys_rec__user_id` 
            SET `last_action` = 'DEL', 
                `last_req_user` = '%s',
                `last_req_timestamp` = NOW(), 
                `last_app_user` = '%s',
                `last_app_timestamp` = NOW(), 
                `user_is_suspend` = 0,
                `user_change_pass` = 0,
                `user_try` = 3
            WHERE `user_id` = '%s' ;", 
                $_SESSION['user']['id'],
                $_SESSION['user']['id'],
                $varUserID);
    if ($varMySqli->query($tmpQueryString)) {
        $data['status'] = true;
    } else {
        $data['status']  = false;
        $data['err_msg'] = "Query error";
        $isRun = false;
    }
}
$varPAGE = 'JSON';
$JSON = json_encode($data);
?>