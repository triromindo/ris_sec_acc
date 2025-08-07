<?php


    //  1. Load function
    include ('login/f_login.php');
    
    //  3. Jalankan command
    if ($varCmd == 'LOGIN') {
        include ('login/f_login_LOGIN.php');
        include ('login/c_login_LOGIN.php');
    } else {
        $varPAGE = 'LOGIN';
    }

    //  5. Link ke page
    if ($varPAGE == 'LOGIN') {
        include ('login/v_login.php');
    } else if ($varPAGE == 'JUMP') {
        header('Location: '.$JUMP_location);
    }

?>
