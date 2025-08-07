<?php

$isRun = true;
/**
 * PSEDUO
 * 1. Ambil ID
 * 2. Query Table
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

//  Query Select
if ($isRun) {
    $tmpQueryString = sprintf("
            SELECT location_id, area_id, rayon_id, rayon_name, rayon_index
            FROM `10sys_rec__rayon_id`
            WHERE location_id = '%s'
                AND area_id = '%s'
                AND rayon_id = '%s' ;",
            $varLocID, $varAreaID, $varRayonID);
    if ($tmpResult = $varMySqli->query($tmpQueryString)) {
        if ($row = $tmpResult->fetch_assoc()) {
            $data['status'] = true;
            $data['data']['loc_id']      = $row['location_id'];
            $data['data']['area_id']     = $row['area_id'];
            $data['data']['rayon_id']    = $row['rayon_id'];
            $data['data']['rayon_name']  = $row['rayon_name'];
            $data['data']['rayon_index'] = $row['rayon_index'];
            $data['data']['locArea_id']  = $row['location_id'] . '-' . $row['area_id'];
        } else {
            $data['status']  = false;
            $data['err_msg'] = "Data not found" . $tmpQueryString;
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