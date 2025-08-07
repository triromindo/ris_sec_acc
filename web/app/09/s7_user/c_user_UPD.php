<?php

$isRun = true;
/**
 * PSEDUO DELETE
 * 1. Hapus data
 */
if ($isRun) {
	     //  Table
    $varUserID = $_REQUEST['id'];

    $data['user_id'] = $_REQUEST['id'];
   // $data['user_name'] = $_REQUEST['iUserName'];
    if (funcShareHtml_getInput($oErrMsg, $data['user_name'], $_REQUEST['iUserName'], 'ALPSPC') == false) {
        $data['status']  = false;
        $data['err_msg'] = 'Nama hanya alpha';
        $isRun = false;
    }
 }
 
if ($isRun) {

    
    $tmpQueryString = sprintf("
            UPDATE `10sys_rec__user_id` 
            SET `last_action` = 'UPD', 
                `last_req_user` = '%s',
                `last_req_timestamp` = NOW(), 
                `last_app_user` = '%s',
                `last_app_timestamp` = NOW(), 
                `user_name` = '%s'
            WHERE `user_id` = '%s' ;", 
                $_SESSION['user']['id'],
                $_SESSION['user']['id'],
                $data['user_name'], 
                $varUserID);
    if ($varMySqli->query($tmpQueryString)) {
        $data['status'] = true;
    } else {
        $data['status']  = false;
        $data['err_msg'] = "Query error";
        $isRun = false;
    }
}

if ($isRun) {
    funcSharedLog_WriteLog($varErrMessage, $varMySqli, $_SESSION['user']['id'], 'MOD-USER', 'EDIT', 
            'Update USER_ID = ' . $varUserID);
}

$varPAGE = 'JSON';
$JSON = json_encode($data);
?>