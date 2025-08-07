<?php

$isRun = true;
/**
 * PSEDUO
 * 1. Ambil data satu produk
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
            SELECT location_id, area_id, area_name, area_index
            FROM `10sys_rec__area_id`
            WHERE location_id = '%s'
                AND area_id = '%s'; ", 
            $varLocID, $varAreaID);
    if ($tmpResult = $varMySqli->query($tmpQueryString)) {
        if ($row = $tmpResult->fetch_assoc()) {
            $data['status'] = true;
            $data['data']['loc_id']     = $row['location_id'];
            $data['data']['area_index'] = $row['area_index'];
            $data['data']['area_id']    = $row['area_id'];
            $data['data']['area_name']  = $row['area_name'];
        } else {
            $data['status'] = false;
            $data['err_msg'] = "Data not found".$tmpQueryString;
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