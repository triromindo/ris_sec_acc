<?php

$isRun = true;

//  Ambil data
if ($isRun) {
    //  Data
    $varProfileID = $_REQUEST['id'];

    $tmpQueryString = sprintf("
            SELECT `profile_id`, `profile_name`, `profile_desc`, `location_id`
            FROM `11sys_rec__profile_id`
            WHERE `profile_id` = '%s' ;", $varProfileID);
    if ($tmpResult = $varMySqli->query($tmpQueryString)) {
        if ($row = $tmpResult->fetch_assoc()) {
            $tmpDataProfile['prof_id']   = $row['profile_id'];
            $tmpDataProfile['prof_name'] = $row['profile_name'];
            $tmpDataProfile['prof_desc'] = $row['profile_desc'];
            $tmpDataProfile['loc_id']    = $row['location_id'];
        } else {
            $isRun = false;
        }
    } else {
        $isRun = false;
    }
}

//  Ambil daftar Lokasi
if ($isRun) {
    //  Table
    $varLocID = $_REQUEST['loc'];

    $tmpQueryString = sprintf("
            SELECT 10sys_rec__rayon_id.location_id,
                10sys_rec__rayon_id.area_id,
                10sys_rec__area_id.area_name,
                10sys_rec__rayon_id.rayon_id,
                10sys_rec__rayon_id.rayon_name
            FROM `10sys_rec__rayon_id` 
            LEFT JOIN 10sys_rec__area_id 
                ON 10sys_rec__area_id.location_id = 10sys_rec__rayon_id.location_id 
                AND 10sys_rec__area_id.area_id = 10sys_rec__rayon_id.area_id 
            WHERE 10sys_rec__area_id.location_id = '%s' 
            ORDER BY 10sys_rec__area_id.area_index, 
                10sys_rec__area_id.area_id, 
                10sys_rec__rayon_id.rayon_index, 
                10sys_rec__rayon_id.rayon_id ;",
            $varLocID);
    if ($tmpResult = $varMySqli->query($tmpQueryString)) {
        while ($row = $tmpResult->fetch_assoc()) {
            $tmpData['location_id'] = $row['location_id'];
            $tmpData['area_id']     = $row['area_id'];
            $tmpData['area_name']   = $row['area_name'];
            $tmpData['rayon_id']    = $row['rayon_id'];
            $tmpData['rayon_name']  = $row['rayon_name'];
            $tmpTableAccess[]       = $tmpData;
            
            $arrArea[$row['area_id']]   = $row['area_id'] .' - '. $row['area_name'];
            $arrRayon[$row['rayon_id']] = $row['rayon_id'] .' - '. $row['rayon_name'];
            $arrDataKey[$row['location_id']][$row['area_id']][$row['rayon_id']] = $row['location_id'].'-'.$row['area_id'].'-'.$row['rayon_id'];
            
            unset($tmpData);
        }
    }
}

//  Ambil selected
if ($isRun) {
    $varProfileID = $_REQUEST['id'];
    
    $tmpQueryString = sprintf("
            SELECT `acc_location_id`
            FROM `15sys_rec__profile_acc_loc_list` 
            WHERE profile_id = '%s'; ",
            $varProfileID);
    if ($tmpResult = $varMySqli->query($tmpQueryString)) {
        while ($row = $tmpResult->fetch_assoc()) {
            $tmpSelectedAccLoc[] = $row['acc_location_id'];
        }
    }
    
    $tmpQueryString = sprintf("
            SELECT `acc_area_id`
            FROM `15sys_rec__profile_acc_area_list` 
            WHERE profile_id = '%s'; ",
            $varProfileID);
    if ($tmpResult = $varMySqli->query($tmpQueryString)) {
        while ($row = $tmpResult->fetch_assoc()) {
            $tmpSelectedAccArea[] = $row['acc_area_id'];
        }
    }
    
    $tmpQueryString = sprintf("
            SELECT `acc_rayon_id`
            FROM `15sys_rec__profile_acc_rayon_list` 
            WHERE profile_id = '%s'; ",
            $varProfileID);
    if ($tmpResult = $varMySqli->query($tmpQueryString)) {
        while ($row = $tmpResult->fetch_assoc()) {
            $tmpSelectedAccRayon[] = $row['acc_rayon_id'];
        }
    }
}

$PAGE['table']['dataProfile'] = $tmpDataProfile;
$PAGE['form']['profile_id']   = $varProfileID;
$PAGE['form']['loc_id']       = $varLocID;
$PAGE['selected']['loc']      = $tmpSelectedAccLoc;
$PAGE['selected']['area']     = $tmpSelectedAccArea;
$PAGE['selected']['rayon']    = $tmpSelectedAccRayon;
$PAGE['table']['access']      = $tmpTableAccess;
$PAGE['table']['data']        = $arrDataKey;
$PAGE['table']['area']        = $arrArea;
$PAGE['table']['rayon']       = $arrRayon;


$varPAGE = 'ACCLOC';
?>
