<?php

$isRun = true;
/**
 * PSEDUO
 * 1. Ambil ID
 * 2. Query Deletes
 */

//  Ambil ID
if ($isRun) {
    //  Ambil ID
    $varLocAreaRayID = $_REQUEST['id'];
    $arrId = explode('-', $varLocAreaRayID);
    if (count($arrId) == 3) {
        $varLocID   = $arrId[0];
        $varAreaID  = $arrId[1];
        $varRayonID = $arrId[2];
    } else {
        $data['status']  = false;
        $data['err_msg'] = "ID Error";
        $isRun = false;
    }
}

//  Query Delete
if ($isRun) {

    $tmpQueryString = sprintf("
            DELETE FROM `10sys_rec__rayon_id` 
            WHERE `location_id` = '%s' 
                AND `area_id` = '%s' 
                AND `rayon_id` = '%s';",
            $varLocID, $varAreaID, $varRayonID);
    if ($varMySqli->query($tmpQueryString)) {
        $data['status'] = true;
    } else {
        $data['status']  = false;
        $data['err_msg'] = "Query error";
        $isRun = false;
    }
}

if ($isRun) {
    funcSharedLog_WriteLog($varErrMessage, $varMySqli, $_SESSION['user']['id'], 'MOD-RAYON', 'DELETE', 
            'Delete LOC_ID = ' . $varLocID .
            ' and AREA_ID = ' . $varAreaID .
            ' and RAYON_ID = ' . $varRayonID);
}

$varPAGE = 'JSON';
$JSON = json_encode($data);
?>