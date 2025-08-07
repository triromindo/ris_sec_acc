<?php

function funcShareHTML_FormatNumber($iNumber, $iDec = 0) {
    if ($iNumber == 0) {
        $retVal = '-';
    } else {
        if (is_numeric($iNumber)) {
            $retVal = number_format($iNumber, $iDec, ',', '.');
        } else {
            $retVal = '-';
        }
    }

    return $retVal;
}

function funcSharedHtml_number_format($iNumber, $iEmpty = '') {
    if (is_numeric($iNumber)) {
        if (($iNumber == 0) || (is_null($iNumber))) {
            return $iEmpty;
        } else {
            return number_format($iNumber);
        }
    } else {
        return $iNumber;
    }
}

function funcSharedHtml_number_format_rb($iNumber, $iEmpty = '') {
    if (is_numeric($iNumber)) {
        if (($iNumber == 0) || (is_null($iNumber))) {
            return $iEmpty;
        } else {
            $iNumber = $iNumber / 1000;
            return number_format($iNumber);
        }
    } else {
        return $iNumber;
    }
}

function funcSharedHtml_number_format_jt($iNumber, $iEmpty = '') {
    if (is_numeric($iNumber)) {
        if (($iNumber == 0) || (is_null($iNumber))) {
            return $iEmpty;
        } else {
            $iNumber = $iNumber / 1000000;
            return number_format($iNumber);
        }
    } else {
        return $iNumber;
    }
}

function funcSharedHtml_month3($iMonth) {
    $tmpMonth = Array(
        "1" => "Jan",
        "2" => "Feb",
        "3" => "Mar",
        "4" => "Apr",
        "5" => "Mei",
        "6" => "Jun",
        "7" => "Jul",
        "8" => "Agt",
        "9" => "Sep",
        "10" => "Okt",
        "11" => "Nov",
        "12" => "Des",
    );
    return $tmpMonth[$iMonth];
}

function funcSharedHtml_select_month($iMonth) {
    $tmpMonth = Array(
        "1" => "Januari",
        "2" => "Februari",
        "3" => "Maret",
        "4" => "April",
        "5" => "Mei",
        "6" => "Juni",
        "7" => "Juli",
        "8" => "Agustus",
        "9" => "September",
        "10" => "Oktober",
        "11" => "November",
        "12" => "Desember",
    );
    $retVal = funcSharedHtml_select($tmpMonth, $iMonth);

    return $retVal;
}

function funcSharedHtml_select_day($iDay) {
    $tmpDay = Array(
        "1" => "1",
        "2" => "2",
        "3" => "3",
        "4" => "4",
        "5" => "5",
        "6" => "6",
        "7" => "7",
        "8" => "8",
        "9" => "9",
        "10" => "10",
        "11" => "11",
        "12" => "12",
        "13" => "13",
        "14" => "14",
        "15" => "15",
        "16" => "16",
        "17" => "17",
        "18" => "18",
        "19" => "19",
        "20" => "20",
        "21" => "21",
        "22" => "22",
        "23" => "23",
        "24" => "24",
        "25" => "25",
        "26" => "26",
        "27" => "27",
        "28" => "28",
        "29" => "29",
        "30" => "30",
        "31" => "31",
    );

    $retVal = funcSharedHtml_select($tmpDay, $iDay);

    return $retVal;
}

function funcSharedHtml_select($iArrOption, $iSelectedValue) {
    $retVal = '';

    foreach ($iArrOption as $key => $val) {
        if ($key == $iSelectedValue) {
            $retVal .= "<option value=\"" . $key . "\" selected>" . $val . "</option>";
        } else {
            $retVal .= "<option value=\"" . $key . "\">" . $val . "</option>";
        }
    }

    return $retVal;
}

function funcSharedHtml_inputText($iChar, $maxLength) {
    $tmpMaxLen = ' maxlength="' . $maxLength . '" ';
    if ($iChar == 'NUM') {
        //  Untuk kode produk 0-9
        $tmpPatern = 'pattern="[0-9]" title="Isi angka" ';
    } elseif ($iChar == 'ALP') {
        //  Untuk kode cab a-z
        $tmpPatern = 'pattern="[a-zA-Z]" title="Isi huruf" ';
    } elseif ($iChar == 'ALPNUM') {
        //  Untuk kode lain a-z 0-9
        $tmpPatern = 'pattern="[a-zA-Z0-9]" title="Isi huruf dan angka" ';
    } elseif ($iChar == 'ALPNUMSPC') {
        //  Untuk nama a-z 0-9 spasi
    } elseif ($iChar == 'ALPNUMDOTDASH') {
        //  Untuk kode pelanggan a-z 0-0 titik (.) strip (-)
    }

    return $tmpPatern . $tmpMaxLen;
}

function funcShareHtml_getInput(&$oErrMsg, &$oOutput, $iInput, $iType) {
    $retVal = true;

    //  Hapus dan ganti spesial char
    $tmpInput = trim($iInput);
    $tmpInput = stripslashes($tmpInput);
    $tmpInput = htmlspecialchars($tmpInput);

    if ($iType == 'ALP') {
        if (!preg_match("/^[a-zA-Z]*$/", $tmpInput)) {
            $oErrMsg = "Hanya angka";
            $retVal = false;
        } else {
            $oOutput = $tmpInput;
        }
    } else if ($iType == 'NUM') {
        if (!preg_match("/^[0-9]*$/", $tmpInput)) {
            $oErrMsg = "Hanya angka";
            $retVal = false;
        } else {
            $oOutput = $tmpInput;
        }
    } else if ($iType == 'ALPNUM') {
        if (!preg_match("/^[a-zA-Z0-9]*$/", $tmpInput)) {
            $oErrMsg = "Hanya angka";
            $retVal = false;
        } else {
            $oOutput = $tmpInput;
        }
    } else if ($iType == 'ALPNUMSPC') {
        if (!preg_match("/^[a-zA-Z0-9 ]*$/", $tmpInput)) {
            $oErrMsg = "Hanya angka";
            $retVal = false;
        } else {
            $oOutput = $tmpInput;
        }
    } else if ($iType == 'ALPSPC') {
        if (!preg_match("/^[a-zA-Z ]*$/", $tmpInput)) {
            $oErrMsg = "Hanya angka";
            $retVal = false;
        } else {
            $oOutput = $tmpInput;
        }
    } else if ($iType == 'ALPNUMDOTDASH') {
        if (!preg_match("/^[a-zA-Z.-]*$/", $tmpInput)) {
            $oErrMsg = "Hanya angka";
            $retVal = false;
        } else {
            $oOutput = $tmpInput;
        }
    } else if ($iType == 'ALPNUMSPCDASH') {
        if (!preg_match("/^[a-zA-Z0-9 *-]*$/", $tmpInput)) {
            $oErrMsg = "Hanya angka";
            $retVal = false;
        } else {
            $oOutput = $tmpInput;
        }
    } else if ($iType == 'ALPNUMDASH') {
        if (!preg_match("/^[a-zA-Z0-9*-]*$/", $tmpInput)) {
            $oErrMsg = "Hanya angka";
            $retVal = false;
        } else {
            $oOutput = $tmpInput;
        }
        
    } else {
        $oErrMsg = "Tipe tidak ada";
        $retVal = false;
    }

    return $retVal;
}

?>
