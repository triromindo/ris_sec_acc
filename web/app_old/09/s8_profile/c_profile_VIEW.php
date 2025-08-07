<?php

$isRun = true;
/**
 * PSEDUO
 * 1. Ambil data satu produk
 */
//  Profile
if ($isRun) {

    //  Data
    $varProfileID = $_REQUEST['id'];
    $varLocID = '';

    $tmpQueryString = sprintf("
            SELECT `profile_id`, `profile_name`, `profile_desc`, `location_id`
            FROM `11sys_rec__profile_id`
            WHERE `profile_id` = '%s' ;", $varProfileID);
    if ($tmpResult = $varMySqli->query($tmpQueryString)) {
        if ($row = $tmpResult->fetch_assoc()) {
            $data['status'] = true;
            $data['data']['prof_id']   = $row['profile_id'];
            $data['data']['prof_name'] = $row['profile_name'];
            $data['data']['prof_desc'] = $row['profile_desc'];
            $data['data']['loc_id']    = $row['location_id'];

            $varLocID = $data['data']['loc_id'];
        } else {
            $data['status']  = false;
            $data['err_msg'] = "Data not found";
            $isRun = false;
        }
    } else {
        $data['status'] = false;
        $data['err_msg'] = "Query error" . $tmpQueryString;
        $isRun = false;
    }
}

if ($isRun) {
    //  Daftar Produk Grup
    $tmpQueryString = sprintf("
            SELECT a.profile_id AS profile_id,
                a.prodgrp_id AS prodgrp_id,
                b.prodgrp_name AS prodgrp_name
            FROM 15sys_rec__profile_prodgrp_list a
            LEFT JOIN 10sys_rec__prodgrp_id b
                ON b.prodgrp_id = a.prodgrp_id
            WHERE a.profile_id = '%s' ;", $varProfileID);
    if ($tmpResult = $varMySqli->query($tmpQueryString)) {
        while ($row = $tmpResult->fetch_assoc()) {
            if ($row['prodgrp_id'] == 'ALL') {
            $tmpProdGrpData['val']  = $row['prodgrp_id'];
            $tmpProdGrpData['text'] = $row['prodgrp_id'] . ' - Semua Grup Produk';
            } else {
            $tmpProdGrpData['val']  = $row['prodgrp_id'];
            $tmpProdGrpData['text'] = $row['prodgrp_id'] . ' - ' . $row['prodgrp_name'];
            }
            $tmpProdGrpList[] = $tmpProdGrpData;
        }
        $data['data_prodgrp'] = $tmpProdGrpList;
    } else {
        $data['status'] = false;
        $data['err_msg'] = "Data App error" . $tmpQueryString;
        $isRun = false;
    }
}


if ($isRun) {
    //  Daftar Aplikasi
    $tmpQueryString = sprintf("
            SELECT 15sys_rec__profile_app_list.profile_id AS profile_id,
                15sys_rec__profile_app_list.app_id AS app_id,
                10sys_rec__app_id.app_name AS app_name
            FROM 15sys_rec__profile_app_list
            LEFT JOIN 10sys_rec__app_id
                ON 10sys_rec__app_id.app_id = 15sys_rec__profile_app_list.app_id
            WHERE profile_id = '%s' ;", $varProfileID);
    if ($tmpResult = $varMySqli->query($tmpQueryString)) {
        while ($row = $tmpResult->fetch_assoc()) {
            $tmpAppData['val']  = $row['app_id'];
            $tmpAppData['text'] = $row['app_id'] . ' - ' . $row['app_name'];
            $tmpAppList[] = $tmpAppData;
        }
        $data['data_app'] = $tmpAppList;
    } else {
        $data['status']  = false;
        $data['err_msg'] = "Data App error" . $tmpQueryString;
        $isRun = false;
    }
}


if ($isRun) {
    //  Daftar Location
    $tmpQueryString = sprintf("
            SELECT acc_location_id,
            location_name
            FROM 15sys_rec__profile_acc_loc_list
            LEFT JOIN 10sys_rec__location_id
                ON 10sys_rec__location_id.location_id = 15sys_rec__profile_acc_loc_list.acc_location_id
            WHERE profile_id = '%s' 
            ORDER BY location_name;", $varProfileID);
    if ($tmpResult = $varMySqli->query($tmpQueryString)) {
        while ($row = $tmpResult->fetch_assoc()) {
            $tmpLocData['val'] = $row['acc_location_id'];
            $tmpLocData['text'] = $row['acc_location_id'] . ' - ' . $row['location_name'];
            $tmpLocList[] = $tmpLocData;
        }
        $data['data_loc'] = $tmpLocList;
    } else {
        $data['status']  = false;
        $data['err_msg'] = "Data App error" . $tmpQueryString;
        $isRun = false;
    }
}

if ($isRun) {
    //  Daftar Area
    $tmpQueryString = sprintf("
            SELECT acc_area_id,
                area_name
            FROM 15sys_rec__profile_acc_area_list
            LEFT JOIN 10sys_rec__area_id
                ON 10sys_rec__area_id.area_id = 15sys_rec__profile_acc_area_list.acc_area_id
                AND 10sys_rec__area_id.location_id = '%s'
            WHERE profile_id = '%s' 
             ORDER BY area_name;",
            $varLocID,
            $varProfileID);
    if ($tmpResult = $varMySqli->query($tmpQueryString)) {
        while ($row = $tmpResult->fetch_assoc()) {
            $tmpAreaData['val']  = $row['acc_area_id'];
            $tmpAreaData['text'] = $row['acc_area_id'] . ' - ' . $row['area_name'];
            $tmpAreaList[] = $tmpAreaData;
        }
        $data['data_area'] = $tmpAreaList;
    } else {
        $data['status']  = false;
        $data['err_msg'] = "Data App error" . $tmpQueryString;
        $isRun = false;
    }
}
if ($isRun) {
    //  Daftar Rayon
    $tmpQueryString = sprintf("
            SELECT acc_rayon_id,
            rayon_name
            FROM 15sys_rec__profile_acc_rayon_list
            LEFT JOIN 10sys_rec__rayon_id
                ON 10sys_rec__rayon_id.rayon_id = 15sys_rec__profile_acc_rayon_list.acc_rayon_id
                AND 10sys_rec__rayon_id.location_id = '%s'
            WHERE profile_id = '%s' 
             ORDER BY rayon_name;",
            $varLocID,
            $varProfileID);
    if ($tmpResult = $varMySqli->query($tmpQueryString)) {
        while ($row = $tmpResult->fetch_assoc()) {
            $tmpRayData['val']  = $row['acc_rayon_id'];
            $tmpRayData['text'] = $row['acc_rayon_id'] . ' - ' . $row['rayon_name'];
            $tmpRayList[] = $tmpRayData;
        }
        $data['data_ray'] = $tmpRayList;
    } else {
        $data['status']  = false;
        $data['err_msg'] = "Data App error" . $tmpQueryString;
        $isRun = false;
    }
}

$varPAGE = 'JSON';
$JSON = json_encode($data);
?>