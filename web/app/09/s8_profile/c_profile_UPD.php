<?php

$isRun = true;
/**
 * PSEDUO DELETE
 * 1. Hapus data
 */
if ($isRun) {
    //  Table
    $varProfileID = $_REQUEST['id'];
 
    $data['profile']        = $_REQUEST['id'];
 // $data['profile_name']   = $_REQUEST['iProfileName'];
  //  $data['profile_note']   = $_REQUEST['iProfileNote'];
    $data['profile_loc_id'] = $_REQUEST['iProfile_LocId'];	
if (funcShareHtml_getInput($oErrMsg, $data['profile_name'], $_REQUEST['iProfileName'], 'ALPNUMSPC') == false) {
    $data['status']  = false;
    $data['err_msg'] = 'Nama diisi alphanumerik dan spasi';
    $isRun = false;
    }
if (funcShareHtml_getInput($oErrMsg, $data['profile_note'], $_REQUEST['iProfileNote'], 'ALPNUMSPC') == false) {
    $data['status']  = false;
    $data['err_msg'] = 'Nama diisi alphanumerik dan spasi';
    $isRun = false;
    }
}
 
if ($isRun) {
    
    $tmpQueryString = sprintf("
            UPDATE `11sys_rec__profile_id` 
            SET `last_action` = 'UPD', 
                `last_req_timestamp` = NOW(), 
                `last_app_timestamp` = NOW(), 
                `profile_name` = '%s', 
                `profile_desc` = '%s',
                `location_id` = '%s'
            WHERE `profile_id` = '%s' ;",
            $data['profile_name'],
            $data['profile_note'],
            $data['profile_loc_id'],
            $varProfileID);
    if ($varMySqli->query($tmpQueryString)) {
        $data['status'] = true;
    } else {
        $data['status']  = false;
        $data['err_msg'] = "Query error:";
        $isRun = false;
    }
}

if ($isRun) {
    funcSharedLog_WriteLog($varErrMessage, $varMySqli, $_SESSION['user']['id'], 'MOD-PROFILE', 'EDIT',
            'Update PROFILE_ID = ' . $varProfileID);
}

$varPAGE = 'JSON';
$JSON = json_encode($data);
?>