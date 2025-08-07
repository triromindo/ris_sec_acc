<?php

$isRun = true;
/**
 * PSEDUO DELETE
 * 1. Hapus data
 */
if ($isRun) {
    //  Table
    $varUserID = $_REQUEST['id'];

  // $data['user_id'] = strtoupper($_REQUEST['iUserId']);
  // $data['user_login'] = strtoupper($_REQUEST['iUserLogin']);
  // $data['user_name'] = $_REQUEST['iUserName'];
   
    $data['user_pass_1'] = $_REQUEST['iUserPass_1'];
    $data['user_pass_2'] = $_REQUEST['iUserPass_2'];
	
	if (funcShareHtml_getInput($oErrMsg, $data['user_id'], strtoupper($_REQUEST['iUserId']), 'ALP') == false) {
        $data['status']  = false;
        $data['err_msg'] = 'ID diisi alpha dan tanpa spasi';
        $isRun = false;
    }
    if (funcShareHtml_getInput($oErrMsg, $data['user_login'], strtoupper($_REQUEST['iUserLogin']), 'ALPSPC') == false) {
        $data['status']  = false;
        $data['err_msg'] = 'User login diisi alpha ';
        $isRun = false;
    }
    if (funcShareHtml_getInput($oErrMsg, $data['user_name'], $_REQUEST['iUserName'], 'ALPSPC') == false) {
        $data['status']  = false;
        $data['err_msg'] = 'Nama hanya diisi alpha';
        $isRun = false;
    }

    if ($data['user_pass_1'] <> $data['user_pass_2']) {
        $tmpErr[] = 'Password tidak sama';
        $isRun = false;
    }
}


if ($isRun) {
    $tmpQueryString = sprintf("
            INSERT INTO `10sys_rec__user_id` 
                (`rec_id`, `rec_status`, `last_action`, 
                `last_req_user`, `last_req_timestamp`, `last_app_user`, `last_app_timestamp`, 
                `user_id`, `user_login`, `user_password`, `user_name`,
                `user_last_ip`, `user_last_login`, `user_last_active`, 
                `user_curr_ip`, `user_curr_login`, 
                `user_is_login`, `user_is_locked`, `user_is_deleted`, `user_is_suspend`, 
                `user_try`, `user_change_pass`, `user_type`) 
            VALUES 
                (NULL, 'OK', 'ADD', 
                '%s', NOW(), '%s', NOW(), 
                '%s', '%s', password('%s'), '%s',
                null, null, null, 
                null, null, 
                0, 0, 0, 0,
                3, 0, 'USER'); ",
            $_SESSION['user']['id'],
            $_SESSION['user']['id'],
            $data['user_id'],
            $data['user_login'],
            $data['user_pass_1'],
            $data['user_name']);
    if ($varMySqli->query($tmpQueryString)) {
        $data['status'] = true;
    } else {
        $data['status']  = false;
        $data['err_msg'] = "Query error ".$tmpQueryString;
        $isRun = false;
    }
}

if ($isRun) {
    funcSharedLog_WriteLog($varErrMessage, $varMySqli, $_SESSION['user']['id'], 'MOD-USER', 'ADD', 
            'Add USER_ID = ' . $data['user_id']);
}

$varPAGE = 'JSON';
$JSON = json_encode($data);
?>