<?php

if ($varCmd == 'TABLE') {
    include('s7_user/c_user_TABLE.php');
} elseif ($varCmd == 'VIEW') {
    include('s7_user/c_user_VIEW.php');
} elseif ($varCmd == 'SAVE') {
    include('s7_user/c_user_SAVE.php');
} elseif ($varCmd == 'UPD') {
    include('s7_user/c_user_UPD.php');
} elseif ($varCmd == 'DEL') {
    include('s7_user/c_user_DEL.php');
} elseif ($varCmd == 'SUSPEND') {
    include('s7_user/c_user_SUSPEND.php');
} elseif ($varCmd == 'OPEN_SUSPEND') {
    include('s7_user/c_user_OPEN_SUSPEND.php');
} elseif ($varCmd == 'UNLOCK') {
    include('s7_user/c_user_UNLOCK.php');
} elseif ($varCmd == 'PASS') {
    include('s7_user/c_user_PASS.php');
} elseif ($varCmd == 'DEL') {
    include('s7_user/c_user_DEL.php');
} else {
    include('s7_user/c_user_DEF.php');

    $varPAGE = 'DEF';
}

if ($varPAGE == 'DEF') {
    include('s7_user/v_user.php');
} else if ($varPAGE == 'JSON') {
    header("Content-Type: application/json; charset=UTF-8");
    echo $JSON;
} else if ($varPAGE == 'JUMP') {
    header('Location: ' . $JUMP_location);
}
?>