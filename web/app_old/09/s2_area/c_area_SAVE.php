<?php

$isRun = true;

if ($isRun) {
    //  Input
    $data['loc_id'] = $_REQUEST['iLocID'];
   // $data['area_id'] = $_REQUEST['iAreaId'];
   // $data['area_name'] = $_REQUEST['iAreaName'];
   // $data['area_index'] = $_REQUEST['iAreaIndex'];

    if (funcShareHtml_getInput($oErrMsg, $data['area_id'], $_REQUEST['iAreaId'], 'ALPNUM') == false) {
        $data['status']  = false;
        $data['err_msg'] = 'ID diisi alphanumerik dan tanpa spasi';
        $isRun = false;
    }
    if (funcShareHtml_getInput($oErrMsg, $data['area_name'], $_REQUEST['iAreaName'], 'ALPNUMSPC') == false) {
        $data['status']  = false;
        $data['err_msg'] = 'Nama hanya alphanumerik dan spasi';
        $isRun = false;
    }
    if (funcShareHtml_getInput($oErrMsg, $data['area_index'], $_REQUEST['iAreaIndex'], 'NUM') == false) {
        $data['status']  = false;
        $data['err_msg'] = 'Index hanya angka';
        $isRun = false;
    }
}

if ($isRun) {
    $tmpQueryString = sprintf("
            INSERT INTO `10sys_rec__area_id` 
                (`rec_id`, `rec_status`, `last_action`, 
                `last_req_user`, `last_req_timestamp`, `last_app_user`, `last_app_timestamp`, 
                `location_id`, `area_id`, `area_name`, `area_index`) 
            VALUES 
                (NULL, 'OK', 'ADD', 
                'SYS', NOW(), 'SYS', NOW(), 
                '%s', '%s', '%s', '%s' ); ",
            $data['loc_id'],
            $data['area_id'],
            $data['area_name'],
            $data['area_index']);
    if ($varMySqli->query($tmpQueryString)) {
        $data['status'] = true;
    } else {
        $data['status']  = false;
        $data['err_msg'] = "Query error ".$tmpQueryString;
        $isRun = false;
    }
}

if ($isRun) {
    funcSharedLog_WriteLog($varErrMessage, $varMySqli, $_SESSION['user']['id'], 'MOD-AREA', 'ADD', 
            'Add LOC_ID = ' . $data['loc_id'] .
            ' and AREA_ID = ' . $data['area_id']);
}

$varPAGE = 'JSON';
$JSON = json_encode($data);
?>