<?php

include('s14_rpt_usra/c_rpt_usra_DEF.php');

$varPAGE = 'DEF';
$PAGE['ID'] = 'S14';

if ($varPAGE == 'DEF') {
    include('s14_rpt_usra/v_rpt_usra.php');
} else if ($varPAGE == 'JSON') {
    header("Content-Type: application/json; charset=UTF-8");
    echo $JSON;
} else if ($varPAGE == 'JUMP') {
    header('Location: ' . $JUMP_location);
}
?>