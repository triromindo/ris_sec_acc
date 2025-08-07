<?php

$isRun = true;

//  Ambil data
if ($isRun) {
    //  Data
    $varProfileID = $_REQUEST['id'];
    $varAppID = $_REQUEST['app'];

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

//  Daftar module
if ($isRun) {
    //  Table
    $tmpQueryString = sprintf("
            SELECT `appmod_id`, `appmod_name`, `appmod_type`, 
                `appmod_note`, `access_type`
            FROM `11sys_rec__appmod_id` 
            WHERE app_id = '%s'
            ORDER BY `appmod_index` ;",
            $varAppID);
    if ($tmpResult = $varMySqli->query($tmpQueryString)) {
        while ($row = $tmpResult->fetch_assoc()) {
            $tmpData['appmod_id']   = $row['appmod_id'];
            $tmpData['appmod_name'] = $row['appmod_name'];
            $tmpData['appmod_type'] = $row['appmod_type'];
            $tmpData['appmod_note'] = $row['appmod_note'];
            $tmpData['access_type'] = $row['access_type'];
            $tmpTableAccess[] = $tmpData;
            unset($tmpData);
        }
    }
}

//  Ambil module yang dipilih
if ($isRun) {
    $varProfileID = $_REQUEST['id'];

    //  Table
    $tmpQueryString = sprintf("
            SELECT `appmod_id`, `access_level`
            FROM `15sys_rec__profile_appmod_list` 
            WHERE profile_id = '%s'
                AND app_id = '%s'; ",
            $varProfileID,
            $varAppID);
    if ($tmpResult = $varMySqli->query($tmpQueryString)) {
        while ($row = $tmpResult->fetch_assoc()) {
            $tmpData['appmod_id']     = $row['appmod_id'];
            $tmpData['access_level']  = $row['access_level'];
            $tmpTableAccessSelected[] = $tmpData;
            unset($tmpData);
        }
    }
}

$PAGE['table']['dataProfile'] = $tmpDataProfile;
$PAGE['form']['profile_id']   = $varProfileID;
$PAGE['form']['app_id']       = $varAppID;
$PAGE['selected']             = $tmpTableAccessSelected;
$PAGE['table']['access']      = $tmpTableAccess;
$varPAGE = 'ACCMOD';
?>
