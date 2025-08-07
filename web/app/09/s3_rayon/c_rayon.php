<?php

if ($varCmd == 'TABLE') {
    include('s3_rayon/c_rayon_TABLE.php');
} elseif ($varCmd == 'VIEW') {
    include('s3_rayon/c_rayon_VIEW.php');
    } elseif ($varCmd == 'SAVE') {
    include('s3_rayon/c_rayon_SAVE.php');
} elseif ($varCmd == 'UPD') {
    include('s3_rayon/c_rayon_UPD.php');
} elseif ($varCmd == 'DEL') {
    include('s3_rayon/c_rayon_DEL.php');
} else {
    include('s3_rayon/c_rayon_DEF.php');

    $varPAGE = 'DEF';
}

if ($varPAGE == 'DEF') {
    include('s3_rayon/v_rayon.php');
} else if ($varPAGE == 'JSON') {
    header("Content-Type: application/json; charset=UTF-8");
    echo $JSON;
} else if ($varPAGE == 'JUMP') {
    header('Location: ' . $JUMP_location);
}
?>