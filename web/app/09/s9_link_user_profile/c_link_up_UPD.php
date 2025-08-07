<?php

$isRun = true;
/**
 * PSEDUO DELETE
 * 1. Hapus data
 */

if ($isRun) {
    //  Ambil ID
    $varLocAreaRayID = $_REQUEST['id'];
    $arrId = explode('-', $varLocAreaRayID);
    if (count($arrId) == 2) {
        $varUserID = $arrId[0];
        $varProfileID = $arrId[1];
    } else {
        $data['status']  = false;
        $data['err_msg'] = "ID Error";
        $isRun = false;
    }
}


if ($isRun) {
    $data['user_id']    = $_REQUEST['iUserId'];
    $data['profile_id'] = $_REQUEST['iProfileId'];
    
    
    $tmpQueryString = sprintf("
            UPDATE `15sys_rec__user_profile_list` 
            SET `user_id` = '%s', 
                `profile_id` = '%s'
            WHERE `user_id` = '%s' 
                AND `profile_id` = '%s' ;", 
                $data['user_id'], 
                $data['profile_id'], 
                $varUserID, 
                $varProfileID);
    if ($varMySqli->query($tmpQueryString)) {
        $data['status'] = true;
    } else {
        $data['status']  = false;
        $data['err_msg'] = "Query error ".$tmpQueryString;
        $isRun = false;
    }
}

if ($isRun) {
    funcSharedLog_WriteLog($varErrMessage, $varMySqli, $_SESSION['user']['id'], 'MOD-LINK-USER-PROFILE', 'EDIT', 
            'Update USER_ID = ' . $varUserID .
            ' and PROFILE_ID = ' .$varProfileID);
}

$varPAGE = 'JSON';
$JSON = json_encode($data);
?>