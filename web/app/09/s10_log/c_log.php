<?php

include('s10_log/c_log_DEF.php');

$varPAGE = 'DEF';
$PAGE['ID'] = 'S10';

if ($varPAGE == 'DEF') {
    include('s10_log/v_log.php');
} else if ($varPAGE == 'JSON') {
    header("Content-Type: application/json; charset=UTF-8");
    echo $JSON;
} else if ($varPAGE == 'JUMP') {
    header('Location: ' . $JUMP_location);
}
?>