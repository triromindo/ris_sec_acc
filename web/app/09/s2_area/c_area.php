<?php



if ($varCmd == 'TABLE') {
    include('s2_area/c_area_TABLE.php');
} elseif ($varCmd == 'VIEW') {
    include('s2_area/c_area_VIEW.php');
    } elseif ($varCmd == 'SAVE') {
    include('s2_area/c_area_SAVE.php');
} elseif ($varCmd == 'UPD') {
    include('s2_area/c_area_UPD.php');
} elseif ($varCmd == 'DEL') {
    include('s2_area/c_area_DEL.php');
} else {
    include('s2_area/c_area_DEF.php');

    $varPAGE = 'DEF';
}

if ($varPAGE == 'DEF') {
    include('s2_area/v_area.php');
} else if ($varPAGE == 'JSON') {
    header("Content-Type: application/json; charset=UTF-8");
    echo $JSON;
} else if ($varPAGE == 'JUMP') {
    header('Location: ' . $JUMP_location);
}
?>