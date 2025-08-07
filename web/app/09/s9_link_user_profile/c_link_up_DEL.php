<?php

$isRun = true;
/**
 * PSEDUO DELETE
 * 1. Hapus data
 */
if ($isRun) {
    $data['user_id'] = $_REQUEST['iUserId'];
    $data['profile_id'] = $_REQUEST['iProfileId'];
}

if ($isRun) {
    $tmpQueryString = sprintf("
            DELETE FROM 15sys_rec__user_profile_list
            WHERE user_id = '%s' 
                AND profile_id = '%s' ; ",
            $data['user_id'],
            $data['profile_id']);
    if ($varMySqli->query($tmpQueryString)) {
        $data['status'] = true;
        $data['err_msg'] = "Query error".$tmpQueryString;
    } else {
        $data['status'] = false;
        $data['err_msg'] = "Query error".$tmpQueryString;
        $isRun = false;
    }
}

if ($isRun) {
    funcSharedLog_WriteLog($varErrMessage, $varMySqli, $_SESSION['user']['id'], 'MOD-LINK-USER-PROFILE', 'DELETE', 
            'Delete USER_ID = ' . $data['user_id'] .
            ' and PROFILE_ID = ' .$data['profile_id']);
}

$varPAGE = 'JSON';
$JSON = json_encode($data);
?>