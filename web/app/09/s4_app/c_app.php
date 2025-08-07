<?php
$PAGE['ID'] = 'S4';

if ($varCmd == 'TABLE') {
    include('s4_app/c_app_TABLE.php');
} elseif ($varCmd == 'VIEW') {
    include('s4_app/c_app_VIEW.php');
} elseif ($varCmd == 'UPLOAD') {
    include('s4_app/c_app_UPLOAD.php');
} else {
    include('s4_app/c_app_DEF.php');

    $varPAGE = 'DEF';
}

if ($varPAGE == 'DEF') {
    include('s4_app/v_app.php');
} else if ($varPAGE == 'UP') {
    $PAGE['PAGE']['TITLE'] = 'Upload Applikasi';
    $PAGE['PAGE']['NAME'] = 'Upload Applikasi';
    include('s4_app/v_app_UP.php');
} else if ($varPAGE == 'JSON') {
    header("Content-Type: application/json; charset=UTF-8");
    echo $JSON;
} else if ($varPAGE == 'JUMP') {
    header('Location: ' . $JUMP_location);
}
?>