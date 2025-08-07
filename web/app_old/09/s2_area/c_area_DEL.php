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
        $data['status']  = false;
        $data['err_msg'] = "ID Error";
        $isRun = false;
    }
}

if ($isRun) {

    $tmpQueryString = sprintf("
            DELETE FROM `10sys_rec__area_id` 
            WHERE `location_id` = '%s' 
                AND `area_id` = '%s';",
            $varLocID, $varAreaID);
    if ($varMySqli->query($tmpQueryString)) {
        $data['status'] = true;
    } else {
        $data['status']  = false;
        $data['err_msg'] = "Query error".$tmpQueryString;
        $isRun = false;
    }
}

if ($isRun) {
    funcSharedLog_WriteLog($varErrMessage, $varMySqli, $_SESSION['user']['id'], 'MOD-AREA', 'DELETE', 
            'Delete LOC_ID = ' . $varLocID .
            ' and AREA_ID = ' . $varAreaID);
}

$varPAGE = 'JSON';
$JSON = json_encode($data);
?>