<?php

//  1. Load function
include('gateway/f_gateway.php'); // isinya kosong
//  Check security
if (isset($_SESSION['user']['id'])) {
    
} else {
    include('../err/index.html');
    exit();
}



    $arrMod['S1'] = 'S1. Daftar Location';
    $arrMod['S2'] = 'S2. Daftar Area';
    $arrMod['S3'] = 'S3. Daftar Rayon';
    $arrMod['S4'] = 'S4. Daftar Aplikasi';
    $arrMod['S5'] = 'S5. Daftar Modul Aplikasi';
    $arrMod['S6'] = 'S6. Daftar Grup Produk';
    $arrMod['S7'] = 'S7. Daftar User';
    $arrMod['S8'] = 'S8. Daftar Profile';
    $arrMod['S9'] = 'S9. Link User dan Profile';
    $arrMod['S10'] = 'S10. Log Aktivitas SysAdmin';
    $arrMod['S11'] = 'S11. Log Aktivitas RIS SALES';
    $arrMod['S12'] = 'S12. Laporan Login User';
    $arrMod['S13'] = 'S13. Laporan Pemakaian Module';
    $arrMod['S14'] = 'S14. Laporan Aktivitas User';
    $arrMod['S15'] = 'S15. Kode Login';

//  4. Jalankan command
if ($varCmd == 'JUMP_APP') {
//  Ambil parameter
    $tmpAppID = $_REQUEST['app'];
    $tmpModID = $_REQUEST['mod'];

    switch ($tmpAppID) {
        case 'SEC':
            if (array_key_exists($tmpModID, $arrMod)) {
                $varPAGE = 'JUMP';
                $JUMP_location = '../09/do.php?navcmd=' . $tmpModID;

                $tmpMod = 'GATEWAY';
                $tmpAct = 'JUMP-'.$tmpModID;
                $tmpMemo = 'User access :' . $tmpAppID . ' Mod: ' . $arrMod[$tmpModID];
                funcSharedLog_WriteLog($varErrMessage, $varMySqli, $_SESSION['user']['id'], $tmpMod, $tmpAct, $tmpMemo);
            } else {
                echo "ERROR";
            }
            break;
        default :
            echo "ERROR";
            break;
    }
} else if ($varCmd == 'LOGOUT') {
//  4b. LOGOUT Command
    include('gateway/f_gateway_LOGOUT.php');
    include('gateway/c_gateway_LOGOUT.php');
} else {
    include('gateway/f_gateway_GATEWAY.php');
    include('gateway/c_gateway_GATEWAY.php');
}

//  5. Link ke page
if ($varPAGE == 'GATEWAY') {
    include('gateway/v_gateway.php');
} else if ($varPAGE == 'JUMP') {
    header('Location: ' . $JUMP_location);
}
