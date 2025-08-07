<?php

$isRun = true;
if ($isRun) {

    //  Combo
    $tmpQueryString = sprintf("
            SELECT `location_index`, `location_id`, `location_name`
            FROM `10sys_rec__location_id`
            ORDER BY `location_index` ;");
    if ($tmpResult = $varMySqli->query($tmpQueryString)) {
        while ($row = $tmpResult->fetch_assoc()) {
            $tmpCb[$row['location_id']] = $row['location_id'] .'-'. $row['location_name'];
        }
        if (isset($tmpCb)) {
        $PAGE['form']['cbLoc'] =  funcSharedHtml_select($tmpCb, '');
        }
    }
}
$varPAGE = 'DEF';
?>
