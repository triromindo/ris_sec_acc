<?php
$varFolderName = 's5_appmod';
$varFileName = 'appmod';

$PAGE['ID'] = 'S5';

include('../../func/funcSharedCrypt.php');


if ($varCmd == 'TABLE') {
    include($varFolderName . '/c_' . $varFileName . '_TABLE.php');
} elseif ($varCmd == 'VIEW') {
    include($varFolderName . '/c_' . $varFileName . '_VIEW.php');
} elseif ($varCmd == 'UPLOAD') {
    include($varFolderName . '/c_' . $varFileName . '_UPLOAD.php');
} else {
    include($varFolderName . '/c_' . $varFileName . '_DEF.php');

    $varPAGE = 'DEF';
}

if ($varPAGE == 'DEF') {
    include($varFolderName . '/v_' . $varFileName . '.php');
} else if ($varPAGE == 'UP') {
    $PAGE['PAGE']['TITLE'] = 'Upload Modul Applikasi';
    $PAGE['PAGE']['NAME'] = 'Upload Modul Applikasi';
    include($varFolderName . '/v_' . $varFileName . '_UP.php');
} else if ($varPAGE == 'JSON') {
    header("Content-Type: application/json; charset=UTF-8");
    echo $JSON;
} else if ($varPAGE == 'JUMP') {
    header('Location: ' . $JUMP_location);
}
?>