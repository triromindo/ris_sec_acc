<?php

$isRun = true;
/**
 * PSEDUO
 * 1. Ambil ID
 * 2. Ambil Input data
 * 3. Query Update
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

//  Ambil Input data
if ($isRun) {
    //  Input
    $data['locArea_id'] = $_REQUEST['iLocAreaId'];
   // $data['rayon_name'] = $_REQUEST['iRayonName'];
   // $data['rayon_index'] = $_REQUEST['iRayonIndex'];
    
    //  Cek data LocArea
    $arrId = explode('-', $data['locArea_id']);
    if (count($arrId) == 2) {
        $data['loc_id']  = $arrId[0];
        $data['area_id'] = $arrId[1];
    } else {
        $isRun = false;
        $data['status'] = false;
      //  $data['err_msg'] = "Loc Aree Error";
    }

    if (funcShareHtml_getInput($oErrMsg, $data['rayon_id'], $_REQUEST['iRayonId'], 'ALPNUM') == false) {
        $data['status'] = false;
        $data['err_msg'] = 'ID diisi alphanumerik dan tanpa spasi';
        $isRun = false;
    }
    if (funcShareHtml_getInput($oErrMsg, $data['rayon_name'], $_REQUEST['iRayonName'], 'ALPNUMSPC') == false) {
        $data['status'] = false;
        $data['err_msg'] = 'Nama hanya alphanumerik dan spasi';
        $isRun = false;
    }
    if (funcShareHtml_getInput($oErrMsg, $data['rayon_index'], $_REQUEST['iRayonIndex'], 'NUM') == false) {
        $data['status'] = false;
        $data['err_msg'] = 'Index hanya angka';
        $isRun = false;
    }
}

//  Query Update
if ($isRun) {

    $tmpQueryString = sprintf("
            UPDATE `10sys_rec__rayon_id` 
            SET `last_action` = 'UPD', 
                `last_req_timestamp` = NOW(), 
                `last_app_timestamp` = NOW(), 
                `location_id` = '%s', 
                `area_id` = '%s',
                `rayon_name` = '%s', 
                `rayon_index` = '%s'
            WHERE `location_id` = '%s' 
                AND `area_id` = '%s'  
                AND `rayon_id` = '%s' ;",
            $data['loc_id'],
            $data['area_id'],
            $data['rayon_name'],
            $data['rayon_index'],
            $varLocID,
            $varAreaID,
            $varRayonID);
    if ($varMySqli->query($tmpQueryString)) {
        $data['status'] = true;
    } else {
        $data['status']  = false;
        $data['err_msg'] = "Query error";
        $isRun = false;
    }
}

if ($isRun) {
    funcSharedLog_WriteLog($varErrMessage, $varMySqli, $_SESSION['user']['id'], 'MOD-RAYON', 'EDIT', 
            'Update LOC_ID = ' . $varLocID .
            ' and AREA_ID = ' . $varAreaID .
            ' and RAYON_ID = ' . $varRayonID);
}

$varPAGE = 'JSON';
$JSON = json_encode($data);
?>