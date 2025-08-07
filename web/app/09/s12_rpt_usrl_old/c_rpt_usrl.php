<?php

include('s12_rpt_usrl/c_rpt_usrl_DEF.php');

$varPAGE = 'DEF';
$PAGE['ID'] = 'S12';

if ($varPAGE == 'DEF') {
    include('s12_rpt_usrl/v_rpt_usrl.php');
} else if ($varPAGE == 'JSON') {
    header("Content-Type: application/json; charset=UTF-8");
    echo $JSON;
} else if ($varPAGE == 'JUMP') {
    header('Location: ' . $JUMP_location);
}
?>