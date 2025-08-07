<?php

if ($varCmd == 'TABLE') {
    include('s9_link_user_profile/c_link_up_TABLE.php');
} elseif ($varCmd == 'VIEW') {
    include('s9_link_user_profile/c_link_up_VIEW.php');
    } elseif ($varCmd == 'SAVE') {
    include('s9_link_user_profile/c_link_up_SAVE.php');
} elseif ($varCmd == 'UPD') {
    include('s9_link_user_profile/c_link_up_UPD.php');
} elseif ($varCmd == 'DEL') {
    include('s9_link_user_profile/c_link_up_DEL.php');
} else {
    include('s9_link_user_profile/c_link_up_DEF.php');

    $varPAGE = 'DEF';
}

if ($varPAGE == 'DEF') {
    include('s9_link_user_profile/v_link_up.php');
} else if ($varPAGE == 'JSON') {
    header("Content-Type: application/json; charset=UTF-8");
    echo $JSON;
} else if ($varPAGE == 'JUMP') {
    header('Location: ' . $JUMP_location);
}
?>