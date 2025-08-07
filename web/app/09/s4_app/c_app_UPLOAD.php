<?php
include('../../func/funcSharedCrypt.php');


$isRun = true;

$varToStep = $_REQUEST['toStep'];

if ($varToStep == 3) {
    //  Step 3
    //  Data dipilih yang akan diupload

    if ($isRun) {
        //  Table
        $tmpIDSel = $_REQUEST['iSel'];

        foreach ($tmpIDSel as $key => $valIDSel) {
            if (array_key_exists($valIDSel, $_SESSION['tmp']['table_app'])) {
                $data = $_SESSION['tmp']['table_app'][$valIDSel];

                $tmpQueryString = sprintf("
                    INSERT INTO `10sys_rec__app_id` 
                        (`rec_id`, `rec_status`, `last_action`, 
                        `last_req_user`, `last_req_timestamp`, `last_app_user`, `last_app_timestamp`, 
                        `app_id`, `app_name`, `app_index`, 
                        `app_navname`, `app_ver`) 
                    VALUES 
                        (NULL, 'OK', 'ADD', 
                        'SYS', NOW(), 'SYS', NOW(), 
                        '%s', '%s', '%s', 
                        '%s', '%s'); ",
                        $data['id'],
                        $data['name'],
                        $data['index'],
                        $data['navname'],
                        $data['ver']);
                if ($varMySqli->query($tmpQueryString)) {
                    //  OK
                    $PAGE['table_add'][] = $data;
                } else {
                    $PAGE['error'] = "Query error: " . $varMySqli->error;
                    $isRun = false;
                }
            } else {
                $isRun = false;
                $PAGE['error'] = 'Key not found';
            }
        }
    }

    if ($isRun) {
        $PAGE['step'] = 3;
    } else {
        $PAGE['step'] = 2;
        $PAGE['table'] = $_SESSION['tmp']['table_app'];
    }
} elseif ($varToStep == '2') {
    //  Step 2
    //  Baca file upload
    if ($isRun) {
        //  Request

        $data['status'] = true;

        //  Ambil semua app_id di tabel
        $tmpQueryString = sprintf("
            SELECT app_id
            FROM `10sys_rec__app_id` ");
        if ($tmpResult = $varMySqli->query($tmpQueryString)) {
            while ($row = $tmpResult->fetch_assoc()) {
                $tmpDatabaseKey[$row['app_id']] = $row['app_id'];
            }
        } else {
            $data['status'] = false;
            $data['err_msg'] = "Data not found";
            $isRun = false;
        }

        //  Baca file upload
        if (($tmpFileHandle = fopen($_FILES["fileToUpload"]["tmp_name"], "r")) !== FALSE) {

            $encryption = fread($tmpFileHandle, filesize($_FILES["fileToUpload"]["tmp_name"]));

            $decryption = funcSharedCrypt_Decrypt($encryption);

            $PAGE['table'] = json_decode($decryption, true);

            foreach ($PAGE['table'] as $key => $value) {
                $_SESSION['tmp']['table_app'][$value['id']] = $value;

                //  Cek apakah key ada dalam data. Bila ada diberi tanda
                if (array_key_exists($value['id'], $tmpDatabaseKey)) {
                    $_SESSION['tmp']['table_app'][$value['id']]['double'] = true;
                } else {
                    $_SESSION['tmp']['table_app'][$value['id']]['double'] = false;
                }
            }

            $PAGE['step'] = 2;

            fclose($tmpFileHandle);
        } else {
            $isRun = false;
            $PAGE['error'] = 'File tidak bisa dibuka';

            $PAGE['step'] = 1;
        }
    }
} else {
    //  Step 1
    //  Tampilkan form upload
    $PAGE['step'] = 1;
}
$varPAGE = 'UP';
?>
