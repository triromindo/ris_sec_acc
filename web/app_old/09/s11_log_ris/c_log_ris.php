<?php

include('s11_log_ris/c_log_ris_DEF.php');

$varPAGE = 'DEF';
$PAGE['ID'] = 'S11';

if ($varPAGE == 'DEF') {
    include('s11_log_ris/v_log_ris.php');
} else if ($varPAGE == 'JSON') {
    header("Content-Type: application/json; charset=UTF-8");
    echo $JSON;
} else if ($varPAGE == 'JUMP') {
    header('Location: ' . $JUMP_location);
}
?>