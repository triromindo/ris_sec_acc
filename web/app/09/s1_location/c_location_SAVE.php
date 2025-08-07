<?php

$isRun = true;
/**
 * PSEDUO DELETE
 * 1. Hapus data
 */
if ($isRun) {

    //  Table
    $varProdID = $_REQUEST['id'];
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


//    $data['loc_id'] = $_REQUEST['iLocId'];     
//    $data['loc_name'] = $_REQUEST['iLocName'];      
//    $data['loc_index'] = $_REQUEST['iLocIndex'];  

}

if ($isRun) {
    $tmpQueryString = sprintf("
            INSERT INTO `10sys_rec__location_id` 
                (`rec_id`, `rec_status`, `last_action`, 
                `last_req_user`, `last_req_timestamp`, `last_app_user`, `last_app_timestamp`, 
                `location_id`, `location_name`, `location_index`, 
                `location_parent_id`, `location_level`) 
            VALUES 
                (NULL, 'OK', 'ADD', 
                'SYS', NOW(), 'SYS', NOW(), 
                '%s', '%s', '%s', 
                'NONE', '0'); ",
            $data['loc_id'],
            $data['loc_name'],
            $data['loc_index']);
    if ($varMySqli->query($tmpQueryString)) {
        $data['status'] = true;
    } else {
        $data['status']  = false;
        $data['err_msg'] = "Query error";
        $tmpErrText = date("Y-m-d H:i:s").' S1 Location - SAVE - Query Error. Mysql = '.$tmpQueryString;
        error_log($tmpErrText . PHP_EOL, 3, $varErrPath);
        $isRun = false;
    }
}

if ($isRun) {
    $tmpMod = 'MOD-LOCATION';
    $tmpAct = 'ADD';
    $tmpMemo = 'Add LOC_ID = ' . $data['loc_id']
            . ' with name = ' . $data['loc_name']
            . ' and index = ' . $data['loc_name'];
    funcSharedLog_WriteLog($varErrMessage, $varMySqli, $_SESSION['user']['id'], $tmpMod, $tmpAct, $tmpMemo);
}

$varPAGE = 'JSON';
$JSON = json_encode($data);
?>