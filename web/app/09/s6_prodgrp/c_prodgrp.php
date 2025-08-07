<?php

if ($varCmd == 'TABLE') {
    include('s6_prodgrp/c_prodgrp_TABLE.php');
} elseif ($varCmd == 'VIEW') {
    include('s6_prodgrp/c_prodgrp_VIEW.php');
    } elseif ($varCmd == 'SAVE') {
    include('s6_prodgrp/c_prodgrp_SAVE.php');
} elseif ($varCmd == 'UPD') {
    include('s6_prodgrp/c_prodgrp_UPD.php');
} elseif ($varCmd == 'DEL') {
    include('s6_prodgrp/c_prodgrp_DEL.php');
} else {
    include('s6_prodgrp/c_prodgrp_DEF.php');

    $varPAGE = 'DEF';
}

if ($varPAGE == 'DEF') {
    include('s6_prodgrp/v_prodgrp.php');
} else if ($varPAGE == 'JSON') {
    header("Content-Type: application/json; charset=UTF-8");
    echo $JSON;
} else if ($varPAGE == 'JUMP') {
    header('Location: ' . $JUMP_location);
}
?>