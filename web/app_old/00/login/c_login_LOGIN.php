<?php

$tmpUser = $_POST['iUser'];
$tmpPass = $_POST['iPass'];


// echo 'User'.$tmpUser;

if (funcLogin_3($varErrMessage, $varResultCode, $varDataUser, $varMySqli, $tmpUser, $tmpPass)) {
    switch ($varResultCode) {
        case 0: //  OK
            //  2.1. Berhasil (case = 0)
            //  2.1.1. Set data dari tabel
            $_SESSION['user']['id'] = $tmpUser;
            $_SESSION['user']['last_time'] = $varDataUser['last_time'];
            $_SESSION['user']['last_ip'] = $varDataUser['last_ip'];
            $_SESSION['user']['curr_ip'] = $varDataUser['curr_ip'];

            $tmpMod = 'MOD-GATEWAY';
            $tmpAct = 'LOGIN';
            $tmpMemo = 'Login success';
            funcSharedLog_WriteLog($varErrMessage, $varMySqli, $_SESSION['user']['id'], $tmpMod, $tmpAct, $tmpMemo);

            $varPAGE = 'JUMP';
            $JUMP_location = 'do.php?navcmd=GATEWAY';
            break;
        case 1: //  DB Error
            $varPAGE = 'JUMP';
            $JUMP_location = 'do.php?mod=ERR&msg=DB_ERROR';
            break;
        case 2: //  User and password not same
            $varPAGE = 'LOGIN';
            $varMessage['type'] = 'ERROR';
            $varMessage['message'] = 'Login Failed. ' . $varErrMessage;
            break;
    }
} else {
    $varPAGE = 'LOGIN';
    $varMessage['type'] = 'ERROR';
    $varMessage['message'] = 'Database tidak terhubung. Harap segera hubungi Admin. ' . $varErrMessage;
}

if ($varPAGE == 'LOGIN') {
    if ($varMessage['type'] == 'ERROR') {
        $PAGE['body_message']['show'] = true;
        $PAGE['body_message']['msg_type'] = 'ERROR';
        $PAGE['body_message']['message'] = $varMessage['message'];
    } else {
        $PAGE['body_message']['show'] = false;
    }
}
?>
