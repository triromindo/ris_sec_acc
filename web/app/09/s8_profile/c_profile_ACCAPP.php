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
            $tmpDataProfile['prof_id'] = $row['profile_id'];
            $tmpDataProfile['prof_name'] = $row['profile_name'];
            $tmpDataProfile['prof_desc'] = $row['profile_desc'];
            $tmpDataProfile['loc_id'] = $row['location_id'];
        } else {
            $isRun = false;
        }
    } else {
        $isRun = false;
    }
}

//  Daftar aplikasi
if ($isRun) {
    //  Table
    $tmpQueryString = sprintf("
            SELECT `app_id`, `app_name`
            FROM `10sys_rec__app_id` 
            ORDER BY `app_index` ;");
    if ($tmpResult = $varMySqli->query($tmpQueryString)) {
        while ($row = $tmpResult->fetch_assoc()) {
            $tmpData['app_id']   = $row['app_id'];
            $tmpData['app_name'] = $row['app_name'];
            $tmpTableAccess[]    = $tmpData;
            unset($tmpData);
        }
    }
}

//  Ambil Aplikasi yang sesuai
if ($isRun) {
    $varProfileID = $_REQUEST['id'];

    //  Table
    $tmpQueryString = sprintf("
            SELECT `app_id`
            FROM `15sys_rec__profile_app_list` 
            WHERE profile_id = '%s'; ",
            $varProfileID);
    if ($tmpResult = $varMySqli->query($tmpQueryString)) {
        while ($row = $tmpResult->fetch_assoc()) {
            $tmpData['app_id']        = 'id_'.$row['app_id'];
            $tmpTableAccessSelected[] = $tmpData;
            unset($tmpData);
        }
    }
}

$PAGE['table']['dataProfile'] = $tmpDataProfile;
$PAGE['form']['profile_id']   = $varProfileID;
$PAGE['selected']             = $tmpTableAccessSelected;
$PAGE['table']['access']      = $tmpTableAccess;
$varPAGE = 'ACCAPP';
?>
