<?php

$isRun = true;
/**
 * PSEDUO DELETE
 * 1. Hapus data
 */
if ($isRun) {
    //  Ambil ID
    $varLocAAreaID = $_REQUEST['id'];
    $arrId = explode('-', $varLocAAreaID);
    if (count($arrId) == 2) {
        $varLocID = $arrId[0];
        $varAreaID = $arrId[1];
    } else {
        $data['status'] = false;
       // $data['err_msg'] = "ID Error";
        $isRun = false;
    }
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
    $data['loc_id'] = $_REQUEST['iLocID'];
   // $data['area_name'] = $_REQUEST['iAreaName'];
   // $data['area_index'] = $_REQUEST['iAreaIndex'];
    
    
    $tmpQueryString = sprintf("
            UPDATE `10sys_rec__area_id` 
            SET `last_action` = 'UPD', 
                `last_req_timestamp` = NOW(), 
                `last_app_timestamp` = NOW(), 
                `location_id` = '%s', 
                `area_name` = '%s', 
                `area_index` = '%s'
            WHERE `location_id` = '%s' 
                AND `area_id` = '%s' ;", 
                $data['loc_id'], 
                $data['area_name'], 
                $data['area_index'], 
                $varLocID, 
                $varAreaID);
    if ($varMySqli->query($tmpQueryString)) {
        $data['status'] = true;
    } else {
        $data['status']  = false;
        $data['err_msg'] = "Query error";
        $isRun = false;
    }
}

if ($isRun) {
    funcSharedLog_WriteLog($varErrMessage, $varMySqli, $_SESSION['user']['id'], 'MOD-AREA', 'EDIT', 
            'Update LOC_ID = ' . $varLocID .
            ' and AREA_ID = ' . $varLocID);
}

$varPAGE = 'JSON';
$JSON = json_encode($data);
?>