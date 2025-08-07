<?php

if ($varCmd == 'TABLE') {
    include('s8_profile/c_profile_TABLE.php');
} elseif ($varCmd == 'VIEW') {
    include('s8_profile/c_profile_VIEW.php');
    } elseif ($varCmd == 'SAVE') {
    include('s8_profile/c_profile_SAVE.php');
} elseif ($varCmd == 'UPD') {
    include('s8_profile/c_profile_UPD.php');
} elseif ($varCmd == 'DEL') {
    include('s8_profile/c_profile_DEL.php');
} elseif ($varCmd == 'MODUL') {
    include('s8_profile/c_profile_MODUL.php');

} elseif ($varCmd == 'ACCPRODGRP') {
    include('s8_profile/c_profile_ACCPRODGRP.php');
    
} elseif ($varCmd == 'ACCPRODGRP_UPD') {
    include('s8_profile/c_profile_ACCPRODGRP_UPD.php');
    
} elseif ($varCmd == 'ACCAPP') {
    include('s8_profile/c_profile_ACCAPP.php');
    
} elseif ($varCmd == 'ACCAPP_UPD') {
    include('s8_profile/c_profile_ACCAPP_UPD.php');
    
} elseif ($varCmd == 'ACCMOD') {
    include('s8_profile/c_profile_ACCMOD.php');
} elseif ($varCmd == 'ACCMOD_UPD') {
    include('s8_profile/c_profile_ACCMOD_UPD.php');
    
    
    
    
} elseif ($varCmd == 'ACCLOC') {
    include('s8_profile/c_profile_ACCLOC.php');
} elseif ($varCmd == 'ACCLOC_UPD') {
    include('s8_profile/c_profile_ACCLOC_UPD.php');

    
} else {
    include('s8_profile/c_profile_DEF.php');

    $varPAGE = 'DEF';
}

if ($varPAGE == 'DEF') {
    include('s8_profile/v_profile.php');
    
} else if ($varPAGE == 'ACCPRODGRP') {
    include('s8_profile/v_profile_ACCPRODGRP.php');
    
} else if ($varPAGE == 'ACCAPP') {
    include('s8_profile/v_profile_ACCAPP.php');
    
} else if ($varPAGE == 'ACCMOD') {
    include('s8_profile/v_profile_ACCMOD.php');
    
} else if ($varPAGE == 'ACCLOC') {
    include('s8_profile/v_profile_ACCLOC.php');
    
} else if ($varPAGE == 'JSON') {
    header("Content-Type: application/json; charset=UTF-8");
    echo $JSON;
    
} else if ($varPAGE == 'JUMP') {
    header('Location: ' . $JUMP_location);
}
?>