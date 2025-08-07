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

//  Daftar Product Grup
if ($isRun) {
    //  Table
    $tmpQueryString = sprintf("
            SELECT `prodgrp_id`, `prodgrp_name`
            FROM `10sys_rec__prodgrp_id` 
            ORDER BY `prodgrp_index` ;");
    if ($tmpResult = $varMySqli->query($tmpQueryString)) {
        while ($row = $tmpResult->fetch_assoc()) {
            $tmpData['prodgrp_id']   = $row['prodgrp_id'];
            $tmpData['prodgrp_name'] = $row['prodgrp_name'];
            $tmpTableAccess[] = $tmpData;
            unset($tmpData);
        }
    }
}

//  Ambil Product Grup yang dipilih
if ($isRun) {
    $varProfileID = $_REQUEST['id'];

    //  Table
    $tmpQueryString = sprintf("
            SELECT `prodgrp_id`
            FROM `15sys_rec__profile_prodgrp_list` 
            WHERE profile_id = '%s'; ",
            $varProfileID);
    if ($tmpResult = $varMySqli->query($tmpQueryString)) {
        while ($row = $tmpResult->fetch_assoc()) {
            $tmpData['prodgrp_id']    = $row['prodgrp_id'];
            $tmpTableAccessSelected[] = $tmpData;
            unset($tmpData);
        }
    }
}

$PAGE['table']['dataProfile'] = $tmpDataProfile;
$PAGE['form']['profile_id']   = $varProfileID;
$PAGE['selected']             = $tmpTableAccessSelected;
$PAGE['table']['access']      = $tmpTableAccess;
$varPAGE = 'ACCPRODGRP';
?>
