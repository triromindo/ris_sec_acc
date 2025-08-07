<?php

//  1. Start session
session_start();

//  2. Ambil INI File
$varIni = parse_ini_file('../../conf/settings.ini');
$varErrPath = '../../../errlog/err00.log';

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

$varNav = $varNavCmd[0];
$varCmd = $varNavCmd[1];

//  5. Tentukan file untuk action
if ($varNav == 'LOGIN') {

    //  Login
    include('login/c_login.php');
} else if ($varNav == 'GATEWAY') {

    //  gateway
    include('gateway/c_gateway.php');
} else if ($varNav == 'LOGOUT') {

    //  Logout
    include('logout/c_logout.php');
} else if ($varNav == 'ERR') {
    include('../err/index.html');
} else {
    //  Login
    include('login/c_login.php');
}
?>
