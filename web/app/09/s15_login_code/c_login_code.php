<?php

        $tmpErrText = date("Y-m-d h:i:s").' S15 Login Code - TEST - Query Error. Mysql = '.$tmpQueryString;
        error_log($tmpErrText . PHP_EOL, 3, $varErrPath);

if ($varCmd == 'TABLE') {
    include('s15_login_code/c_login_code_TABLE.php');
} elseif ($varCmd == 'VIEW') {
    include('s15_login_code/c_login_code_VIEW.php');
} elseif ($varCmd == 'SAVE') {
    include('s15_login_code/c_login_code_SAVE.php');
} elseif ($varCmd == 'UPD') {
    include('s15_login_code/c_login_code_UPD.php');
} elseif ($varCmd == 'DEL') {
    include('s15_login_code/c_login_code_DEL.php');
} else {
    include('s15_login_code/c_login_code_DEF.php');

    $varPAGE = 'DEF';
}

if ($varPAGE == 'DEF') {
    include('s15_login_code/v_login_code.php');
} else if ($varPAGE == 'JSON') {
    header("Content-Type: application/json; charset=UTF-8");
    echo $JSON;
} else if ($varPAGE == 'JUMP') {
    header('login_code: ' . $JUMP_location);
}
?>