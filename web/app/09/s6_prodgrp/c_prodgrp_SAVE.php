<?php

$isRun = true;
/**
 * PSEDUO DELETE
 * 1. Hapus data
 */
if ($isRun) {

    //  Table
    $varProdID = $_REQUEST['id'];

   // $data['prodgrp_id'] = $_REQUEST['iProdGrpId'];
   // $data['prodgrp_name'] = $_REQUEST['iProdGrpName'];
   // $data['prodgrp_index'] = $_REQUEST['iProdGrpIndex'];
    
    if (funcShareHtml_getInput($oErrMsg, $data['prodgrp_id'], $_REQUEST['iProdGrpId'], 'ALPNUM') == false) {
        $data['status'] = false;
        $data['err_msg'] = 'ID diisi alphanumerik dan tanpa spasi';
        $isRun = false;
    }
    if (funcShareHtml_getInput($oErrMsg, $data['prodgrp_name'], $_REQUEST['iProdGrpName'], 'ALPNUMSPC') == false) {
        $data['status'] = false;
        $data['err_msg'] = 'Nama hanya alphanumerik dan spasi';
        $isRun = false;
    }
    if (funcShareHtml_getInput($oErrMsg, $data['prodgrp_index'], $_REQUEST['iProdGrpIndex'], 'NUM') == false) {
        $data['status'] = false;
        $data['err_msg'] = 'Index hanya angka';
        $isRun = false;
    }
}

if ($isRun) {
    $tmpQueryString = sprintf("
            INSERT INTO `10sys_rec__prodgrp_id` 
                (`rec_id`, `rec_status`, `last_action`, 
                `last_req_user`, `last_req_timestamp`, `last_app_user`, `last_app_timestamp`, 
                `prodgrp_id`, `prodgrp_name`, `prodgrp_index`) 
            VALUES 
                (NULL, 'OK', 'ADD', 
                'SYS', NOW(), 'SYS', NOW(), 
                '%s', '%s', '%s' ); ",
            $data['prodgrp_id'],
            $data['prodgrp_name'],
            $data['prodgrp_index']);
    if ($varMySqli->query($tmpQueryString)) {
        $data['status'] = true;
    } else {
        $data['status']  = false;
        $data['err_msg'] = "Query error";
        $isRun = false;
    }
}

if ($isRun) {
    funcSharedLog_WriteLog($varErrMessage, $varMySqli, $_SESSION['user']['id'], 'MOD-PRODGRUP', 'ADD', 
            'Add PROGGRP_ID = ' . $data['prodgrp_id']);
}

$varPAGE = 'JSON';
$JSON = json_encode($data);
?>