<?php

include('s12_rpt_usrl/c_rpt_usrl_DEF.php');

$varPAGE = 'DEF';
$PAGE['ID'] = 'S12';
$EXCEL['title'] ='LAPORAN LOGIN RIS SALES';

if ($varCmd == 'DOWNLOAD') {
    $varPAGE = 'DOWNLOAD';
} else if ($varCmd == 'REPORT') {
    $varPAGE = 'DEF';
}

if ($varPAGE == 'DEF') {
    include('s12_rpt_usrl/v_rpt_usrl.php');
} else if ($varPAGE == 'DOWNLOAD') {
    include('s12_rpt_usrl/d_rpt_usrl.php');
} else if ($varPAGE == 'JSON') {
    header("Content-Type: application/json; charset=UTF-8");
    echo $JSON;
} else if ($varPAGE == 'JUMP') {
    header('Location: ' . $JUMP_location);
}
?>