<?php

$isRun = true;
/**
 * PSEDUO DELETE
 * 1. Hapus data
 */
if ($isRun) {

    //  Table

   // $data['profile_id'] = $_REQUEST['iProfileId'];
   // $data['profile_name'] = $_REQUEST['iProfileName'];
    //$data['profile_note'] = $_REQUEST['iProfileNote'];
    $data['profile_locId'] = $_REQUEST['iProfile_LocId'];
	
	if (funcShareHtml_getInput($oErrMsg, $data['profile_id'], strtoupper($_REQUEST['iProfileId']), 'ALPNUM') == false) {
        $data['status']  = false;
        $data['err_msg'] = 'ID diisi alphanumerik dan tanpa spasi';
        $isRun = false;
    }
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
            INSERT INTO `11sys_rec__profile_id` 
                (`rec_id`, `rec_status`, `last_action`, 
                `last_req_user`, `last_req_timestamp`, `last_app_user`, `last_app_timestamp`, 
                `profile_id`, `profile_name`, `profile_desc`, `location_id`) 
            VALUES 
                (NULL, 'OK', 'ADD', 
                'SYS', NOW(), 'SYS', NOW(), 
                '%s', '%s', '%s', '%s'); ",
            $data['profile_id'],
            $data['profile_name'],
            $data['profile_note'],
            $data['profile_locId']);
    if ($varMySqli->query($tmpQueryString)) {
        $data['status'] = true;
    } else {
        $data['status']  = false;
        $data['err_msg'] = "Query error";
        $isRun = false;
    }
}

if ($isRun) {
    funcSharedLog_WriteLog($varErrMessage, $varMySqli, $_SESSION['user']['id'], 'MOD-PROFILE', 'ADD', 
            'Add PROFILE_ID = ' . $data['profile_id']);
}

$varPAGE = 'JSON';
$JSON = json_encode($data);
?>