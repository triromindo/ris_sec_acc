<?php

$isRun = true;
/**
 * PSEDUO DELETE
 * 1. Hapus data
 */
if ($isRun) {

    //  Table
    $varProdGrpID = $_REQUEST['id'];

    $tmpQueryString = sprintf("
            DELETE FROM `10sys_rec__prodgrp_id` 
            WHERE `prodgrp_id` = '%s' ;", $varProdGrpID);
    if ($varMySqli->query($tmpQueryString)) {
        $data['status'] = true;
    } else {
        $data['status']  = false;
        $data['err_msg'] = "Query error";
        $isRun = false;
    }
}

if ($isRun) {
    funcSharedLog_WriteLog($varErrMessage, $varMySqli, $_SESSION['user']['id'], 'MOD-PRODGRUP', 'DELETE', 
            'Delete PROGGRP_ID = ' . $varProdGrpID);
}

$varPAGE = 'JSON';
$JSON = json_encode($data);
?>