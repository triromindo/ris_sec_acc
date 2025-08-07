<?php

$isRun = true;
/**
 * PSEDUO DELETE
 * 1. Hapus data
 */
if ($isRun) {
    $data['user_id']    = $_REQUEST['iUserId'];
    $data['profile_id'] = $_REQUEST['iProfileId'];
    
}
if ($isRun) {
    $tmpQueryString = sprintf("
            INSERT INTO `15sys_rec__user_profile_list` 
                (`user_id`, `profile_id`) 
            VALUES 
                ('%s', '%s'); ",
            $data['user_id'],
            $data['profile_id']);
    if ($varMySqli->query($tmpQueryString)) {
        $data['status'] = true;
    } else {
        $data['status']  = false;
        $data['err_msg'] = "Query error";
        $isRun = false;
    }
}

if ($isRun) {
    funcSharedLog_WriteLog($varErrMessage, $varMySqli, $_SESSION['user']['id'], 'MOD-LINK-USER-PROFILE', 'ADD', 
            'Add USER_ID = ' . $data['user_id'] .
            ' and PROFILE_ID = ' .$data['profile_id']);
}


$varPAGE = 'JSON';
$JSON = json_encode($data);
?>