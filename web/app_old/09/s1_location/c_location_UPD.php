<?php

$isRun = true;
/**
 * PSEDUO DELETE
 * 1. Hapus data
 */
if ($isRun) {

    //  Table
    $varLocID = $_REQUEST['id'];

   // $data['loc_id']    = $_REQUEST['id'];
   // $data['loc_name']  = $_REQUEST['iLocName'];
   // $data['loc_index'] = $_REQUEST['iLocIndex'];
   
    if (funcShareHtml_getInput($oErrMsg, $data['loc_id'], $_REQUEST['iLocId'], 'ALPNUM') == false) {
        $data['status']  = false;
        $data['err_msg'] = 'ID diisi alphanumerik dan tanpa spasi';
        $isRun = false;
    }
    if (funcShareHtml_getInput($oErrMsg, $data['loc_name'], $_REQUEST['iLocName'], 'ALPNUMSPC') == false) {
        $data['status']  = false;
        $data['err_msg'] = 'Nama hanya alphanumerik dan spasi';
        $isRun = false;
    }
    if (funcShareHtml_getInput($oErrMsg, $data['loc_index'], $_REQUEST['iLocIndex'], 'NUM') == false) {
        $data['status']  = false;
        $data['err_msg'] = 'Index hanya angka';
        $isRun = false;
    }
}
    
if ($isRun) {
    $tmpQueryString = sprintf("
            UPDATE `10sys_rec__location_id` 
            SET `last_action` = 'UPD', 
                `last_req_timestamp` = NOW(), 
                `last_app_timestamp` = NOW(), 
                `location_name` = '%s', 
                `location_index` = '%s'
            WHERE `location_id` = '%s' ;", 
                $data['loc_name'], 
                $data['loc_index'], 
                $varLocID);
    if ($varMySqli->query($tmpQueryString)) {
        $data['status'] = true;
    } else {
        $data['status']  = false;
        $data['err_msg'] = "Query error";
        $isRun = false;
    }
}

if ($isRun) {
    funcSharedLog_WriteLog($varErrMessage, $varMySqli, $_SESSION['user']['id'], 'MOD-LOCATION', 'EDIT', 
            'Update LOC_ID = ' . $varLocID
            . ' with name = '.$data['loc_name']
            . ' and index = '.$data['loc_name']);
}

$varPAGE = 'JSON';
$JSON = json_encode($data);
?>