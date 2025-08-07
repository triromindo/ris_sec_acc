<?php

//  1. Start session
session_start();

//  2. Ambil INI File
$varIni = parse_ini_file('../../conf/settings.ini');
$varAppID = 'SLS'; // Berbeda dengan Applikasi Nav
$varErrPath  = '../../../errlog/err09.log';

//  3. Load common function
include ('../../func/funcSharedDB.php');
include ('../../func/funcSharedLog.php');
include ('../../func/funcSharedHTML.php');

//  2. Buka koneksi database
if (!funcSharedDB_Connect($varErrMessage, $varMySqli,
                $varIni['database_server'], $varIni['database_user'],
                $varIni['database_password'], $varIni['database_database'])) {
    echo "DATABASE not connect";
    exit();
}

//  4. Ambil action
$varNavCmd = explode(',', $_REQUEST['navcmd']);
$varPeriod = explode(',', $_REQUEST['per']);

$varNav = $varNavCmd[0];
$varCmd = $varNavCmd[1];

$varPerLoc = $varPeriod[0];
$varPerYea = $varPeriod[1];
$varPerMon = $varPeriod[2];

//  5. Tentukan file untuk action
if ($varNav == 'S1') {
    // System Lokasi
    include('s1_location/c_location.php');
} else if ($varNav == 'S2') {
    // System Area
    include('s2_area/c_area.php');
} else if ($varNav == 'S3') {
    // System Rayon
    include('s3_rayon/c_rayon.php');
} else if ($varNav == 'S4') {
    // System Rayon
    include('s4_app/c_app.php');
} else if ($varNav == 'S5') {
    // System Rayon
    include('s5_appmod/c_appmod.php');
} else if ($varNav == 'S6') {
    // System Rayon
    include('s6_prodgrp/c_prodgrp.php');
} else if ($varNav == 'S7') {
    // System Rayon
    include('s7_user/c_user.php');
} else if ($varNav == 'S8') {
    // System Rayon
    include('s8_profile/c_profile.php');
} else if ($varNav == 'S9') {
    // System Rayon
    include('s9_link_user_profile/c_link_up.php');
} else if ($varNav == 'S10') {
    // Log
    include('s10_log/c_log.php');
} else if ($varNav == 'S11') {
    // Log
    include('s11_log_ris/c_log_ris.php');
} else if ($varNav == 'ERROR') {
    include('../err/index.html');
} else {
    include('../err/index.html');
}
?>
