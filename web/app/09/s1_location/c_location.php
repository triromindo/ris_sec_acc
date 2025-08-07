<?php

        $tmpErrText = date("Y-m-d h:i:s").' S1 Location - TEST - Query Error. Mysql = '.$tmpQueryString;
        error_log($tmpErrText . PHP_EOL, 3, $varErrPath);

if ($varCmd == 'TABLE') {
    include('s1_location/c_location_TABLE.php');
} elseif ($varCmd == 'VIEW') {
    include('s1_location/c_location_VIEW.php');
} elseif ($varCmd == 'SAVE') {
    include('s1_location/c_location_SAVE.php');
} elseif ($varCmd == 'UPD') {
    include('s1_location/c_location_UPD.php');
} elseif ($varCmd == 'DEL') {
    include('s1_location/c_location_DEL.php');
} else {
    include('s1_location/c_location_DEF.php');

    $varPAGE = 'DEF';
}

if ($varPAGE == 'DEF') {
    include('s1_location/v_location.php');
} else if ($varPAGE == 'JSON') {
    header("Content-Type: application/json; charset=UTF-8");
    echo $JSON;
} else if ($varPAGE == 'JUMP') {
    header('Location: ' . $JUMP_location);
}
?>