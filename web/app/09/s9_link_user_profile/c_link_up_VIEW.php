<?php

$isRun = true;
/**
 * PSEDUO
 * 1. Ambil data satu produk
 */


//  Ambil ID
if ($isRun) {
    //  Ambil ID
    $varLocAreaRayID = $_REQUEST['id'];
    $arrId = explode('-', $varLocAreaRayID);
    if (count($arrId) == 2) {
        $varUserID = $arrId[0];
        $varProfileID = $arrId[1];
    } else {
        $data['status']  = false;
        $data['err_msg'] = "ID Error";
        $isRun = false;
    }
}


if ($isRun) {

    $tmpQueryString = sprintf("
        SELECT user_id, profile_id
        FROM `15sys_rec__user_profile_list` 
            WHERE user_id = '%s' 
                AND profile_id = '%s';", 
            $varUserID,
            $varProfileID);
    if ($tmpResult = $varMySqli->query($tmpQueryString)) {
        if ($row = $tmpResult->fetch_assoc()) {
            $data['status'] = true;
            $data['data']['user_id']    = $row['user_id'];
            $data['data']['profile_id'] = $row['profile_id'];
        } else {
            $data['status']  = false;
            $data['err_msg'] = "Data not found";
            $isRun = false;
        }
    } else {
        $data['status']  = false;
        $data['err_msg'] = "Query error";
        $isRun = false;
    }
}
$varPAGE = 'JSON';
$JSON = json_encode($data);
?>