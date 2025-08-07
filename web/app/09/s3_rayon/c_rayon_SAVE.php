<?php

$isRun = true;

/**
 * PSEDUO
 * 1. Ambil Input
 * 2. Query Insert
 */

//  Ambil Input
if ($isRun) {
    //  Input
    $data['locArea_id'] = $_REQUEST['iLocAreaId'];
    //$data['rayon_id'] = $_REQUEST['iRayonId'];
    //$data['rayon_name'] = $_REQUEST['iRayonName'];
    //$data['rayon_index'] = $_REQUEST['iRayonIndex'];
	
	if (funcShareHtml_getInput($oErrMsg, $data['rayon_id'], $_REQUEST['iRayonId'], 'ALPNUMDASH') == false) {
        $data['status']  = false;
        $data['err_msg'] = 'ID diisi alphanumerik dan tanpa spasi';
        $isRun = false;
    }
    if (funcShareHtml_getInput($oErrMsg, $data['rayon_name'], $_REQUEST['iRayonName'], 'ALPNUMSPCDASH') == false) {
        $data['status']  = false;
        $data['err_msg'] = 'Nama hanya alphanumerik dan spasi';
        $isRun = false;
    }
    if (funcShareHtml_getInput($oErrMsg, $data['rayon_index'], $_REQUEST['iRayonIndex'], 'NUM') == false) {
        $data['status']  = false;
        $data['err_msg'] = 'Index hanya angka';
        $isRun = false;
    }

    $arrId = explode('-', $data['locArea_id']);
    if (count($arrId) == 2) {
        $data['loc_id']  = $arrId[0];
        $data['area_id'] = $arrId[1];
    } else {
        $isRun = false;
        $data['status'] = false;
       // $data['err_msg'] = "Loc Aree Error";
    }

 //  if (!is_numeric($data['rayon_index'])) {
 //      $isRun = false;
 //       $data['status'] = false;
 //       $data['err_msg'] = "Index Rayon bukan angka ";
 //   }
}

//  Query Insert
if ($isRun) {
    $tmpQueryString = sprintf("
            INSERT INTO `10sys_rec__rayon_id` 
                (`rec_id`, `rec_status`, `last_action`, 
                `last_req_user`, `last_req_timestamp`, `last_app_user`, `last_app_timestamp`, 
                `location_id`, `area_id`, `rayon_id`, `rayon_name`, `rayon_index`) 
            VALUES 
                (NULL, 'OK', 'ADD', 
                'SYS', NOW(), 'SYS', NOW(), 
                '%s', '%s', '%s', '%s', '%s' ); ",
            $data['loc_id'],
            $data['area_id'],
            $data['rayon_id'],
            $data['rayon_name'],
            $data['rayon_index']);
    if ($varMySqli->query($tmpQueryString)) {
        $data['status'] = true;
    } else {
        $data['status']  = false;
        $data['err_msg'] = "Query error " . $tmpQueryString;
        $isRun = false;
    }
}

if ($isRun) {
    funcSharedLog_WriteLog($varErrMessage, $varMySqli, $_SESSION['user']['id'], 'MOD-RAYON', 'ADD', 
            'Add LOC_ID = ' . $data['loc_id'] .
            ' and AREA_ID = ' . $data['area_id'] .
            ' and RAYON_ID = ' . $data['rayon_id']);
}

$varPAGE = 'JSON';
$JSON = json_encode($data);
?>