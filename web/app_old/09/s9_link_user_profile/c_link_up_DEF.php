<?php

$isRun = true;
if ($isRun) {
    //  Combo
    $tmpQueryString = sprintf("
            SELECT `user_id`, `user_name`
            FROM `10sys_rec__user_id`
            ORDER BY `user_id` ;");
    if ($tmpResult = $varMySqli->query($tmpQueryString)) {
        while ($row = $tmpResult->fetch_assoc()) {
            $tmpCbUser[$row['user_id']] = $row['user_id'] . '-' . $row['user_name'];
        }
        if (isset($tmpCbUser)) {
            $PAGE['form']['cbUser'] = funcSharedHtml_select($tmpCbUser, '');
        }
    }
}
if ($isRun) {
    //  Combo
    $tmpQueryString = sprintf("
            SELECT `profile_id`, `profile_name`, `location_id`
            FROM `11sys_rec__profile_id`
            ORDER BY `profile_id` ;");
    if ($tmpResult = $varMySqli->query($tmpQueryString)) {
        while ($row = $tmpResult->fetch_assoc()) {
            $tmpCbProfile[$row['profile_id']] = $row['profile_id'] . '-' . $row['profile_name'] . '(' . $row['location_id'] . ')';
        }
        if (isset($tmpCbProfile)) {
            $PAGE['form']['cbProfile'] = funcSharedHtml_select($tmpCbProfile, '');
        }
    }
}
$varPAGE = 'DEF';
?>
