<?php

include('s13_rpt_modu/c_rpt_modu_DEF.php');

$varPAGE = 'DEF';
$PAGE['ID'] = 'S13';

if ($varPAGE == 'DEF') {
    include('s13_rpt_modu/v_rpt_modu.php');
} else if ($varPAGE == 'JSON') {
    header("Content-Type: application/json; charset=UTF-8");
    echo $JSON;
} else if ($varPAGE == 'JUMP') {
    header('Location: ' . $JUMP_location);
}
?>