<?php

$isRun = true;
/**
 * PSEDUO DELETE
 * 1. Hapus data
 */
if ($isRun) {

    //  Table
    $varProfileID = $_REQUEST['id'];
    
    //  AppMod
    $tmpQueryString = sprintf("
        DELETE FROM 15sys_rec__profile_appmod_list
        WHERE profile_id = '%s' ; ",
            $varProfileID);
    if ($varMySqli->query($tmpQueryString)) {
        $data['status'] = true;
    } else {
        $data['status']  = false;
        $data['err_msg'] = "Query error";
        $isRun = false;
    }
    
    //  App
    $tmpQueryString = sprintf("
        DELETE FROM 15sys_rec__profile_app_list
        WHERE profile_id = '%s'; ",
            $varProfileID);
    if ($varMySqli->query($tmpQueryString)) {
        $data['status'] = true;
    } else {
        $data['status']  = false;
        $data['err_msg'] = "Query error";
        $isRun = false;
    }
    
    //  Loc
    $tmpQueryString = sprintf("
        DELETE FROM 15sys_rec__profile_acc_loc_list
        WHERE profile_id = '%s'; ",
            $varProfileID);
    if ($varMySqli->query($tmpQueryString)) {
        $data['status'] = true;
    } else {
        $data['status']  = false;
        $data['err_msg'] = "Query error";
        $isRun = false;
    }
    
    //  Area
    $tmpQueryString = sprintf("
        DELETE FROM 15sys_rec__profile_acc_area_list
        WHERE profile_id = '%s'; ",
            $varProfileID);
    if ($varMySqli->query($tmpQueryString)) {
        $data['status'] = true;
    } else {
        $data['status']  = false;
        $data['err_msg'] = "Query error";
        $isRun = false;
    }
    
    //  Rayon
    $tmpQueryString = sprintf("
        DELETE FROM 15sys_rec__profile_acc_rayon_list
        WHERE profile_id = '%s'; ",
            $varProfileID);
    if ($varMySqli->query($tmpQueryString)) {
        $data['status'] = true;
    } else {
        $data['status']  = false;
        $data['err_msg'] = "Query error";
        $isRun = false;
    }
    
    //  ProdGrp
    $tmpQueryString = sprintf("
        DELETE FROM 15sys_rec__profile_prodgrp_list
        WHERE profile_id = '%s'; ",
            $varProfileID);
    if ($varMySqli->query($tmpQueryString)) {
        $data['status'] = true;
    } else {
        $data['status']  = false;
        $data['err_msg'] = "Query error";
        $isRun = false;
    }
    
    //  Profile
    $tmpQueryString = sprintf("
            DELETE FROM `11sys_rec__profile_id` 
            WHERE `profile_id` = '%s' ;", $varProfileID);
    if ($varMySqli->query($tmpQueryString)) {
        $data['status'] = true;
    } else {
        $data['status']  = false;
        $data['err_msg'] = "Query error:".$tmpQueryString;
        $isRun = false;
    }
}

if ($isRun) {
    funcSharedLog_WriteLog($varErrMessage, $varMySqli, $_SESSION['user']['id'], 'MOD-PROFILE', 'DELETE', 
            'Delete PROFILE_ID = ' . $varProfileID);
}

$varPAGE = 'JSON';
$JSON = json_encode($data);
?>