<?php

$isRun = true;
/**
 * PSEDUO DELETE
 * 1. Hapus data
 */
 if ($isRun) {

    //  Table
    $varProdGrpID = $_REQUEST['id'];
    
    if (funcShareHtml_getInput($oErrMsg, $data['prodgrp_id'], $_REQUEST['iProdGrpId'], 'ALPNUM') == false) {
        $data['status']  = false;
        $data['err_msg'] = 'ID diisi alphanumerik dan tanpa spasi';
        $isRun = false;
    }
    if (funcShareHtml_getInput($oErrMsg, $data['prodgrp_name'], $_REQUEST['iProdGrpName'], 'ALPNUMSPC') == false) {
        $data['status']  = false;
        $data['err_msg'] = 'Nama hanya alphanumerik dan spasi';
        $isRun = false;
    }
    if (funcShareHtml_getInput($oErrMsg, $data['prodgrp_index'], $_REQUEST['iProdGrpIndex'], 'NUM') == false) {
        $data['status']  = false;
        $data['err_msg'] = 'Index hanya angka';
        $isRun = false;
    }
}
	
if ($isRun) {

    //  Table


   // $data['prodgrp_id'] = $_REQUEST['iProdGrpId'];
   // $data['prodgrp_name'] = $_REQUEST['iProdGrpName'];
   // $data['prodgrp_index'] = $_REQUEST['iProdGrpIndex'];
        
    $tmpQueryString = sprintf("
            UPDATE `10sys_rec__prodgrp_id` 
            SET `last_action` = 'UPD', 
                `last_req_timestamp` = NOW(), 
                `last_app_timestamp` = NOW(), 
                `prodgrp_name` = '%s', 
                `prodgrp_index` = '%s'
            WHERE `prodgrp_id` = '%s' ;", 
                $data['prodgrp_name'], 
                $data['prodgrp_index'], 
                $varProdGrpID);
    if ($varMySqli->query($tmpQueryString)) {
        $data['status'] = true;
    } else {
        $data['status']  = false;
        $data['err_msg'] = "Query error: ".$tmpQueryString;
        $isRun = false;
    }
}

if ($isRun) {
    funcSharedLog_WriteLog($varErrMessage, $varMySqli, $_SESSION['user']['id'], 'MOD-PRODGRUP', 'EDIT', 
            'Update PROGGRP_ID = ' . $varProdGrpID);
}

$varPAGE = 'JSON';
$JSON = json_encode($data);
?>