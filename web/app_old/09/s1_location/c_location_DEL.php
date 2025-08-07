<?php

$isRun = true;
/**
 * PSEDUO DELETE
 * 1. Hapus data
 */
if ($isRun) {

    //  Table
    $varProdID = $_REQUEST['id'];

    $tmpQueryString = sprintf("
            DELETE FROM `10sys_rec__location_id` 
            WHERE `location_id` = '%s' ;", $varProdID);
    if ($varMySqli->query($tmpQueryString)) {
        $data['status'] = true;
    } else {
        $data['status']  = false;
        $data['err_msg'] = "Query error";
        $isRun = false;
    }
}

if ($isRun) {
    funcSharedLog_WriteLog($varErrMessage, $varMySqli, $_SESSION['user']['id'], 'MOD-LOCATION', 'DELETE', 
            'Delete LOC_ID = ' . $varProdID);
}
$varPAGE = 'JSON';
$JSON = json_encode($data);
?>