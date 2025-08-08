<html>

    <head>
        <title>System Log</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../lib/jquery-ui/jquery-ui.css" />
        <link rel="shortcut icon" href="../../img/romindo.gif">
        <link rel="stylesheet" href="../../lib/w3/w3.css" />
        <link rel="stylesheet" href="../../lib/css/rom.css" />
        <link rel="stylesheet" href="../../lib/fa/css/all.css" />
        <link rel="stylesheet" type="text/css" href="../../lib/datatables/datatables.min.css" />

        <script type="text/javascript" src="../../lib/jquery/jquery-3.4.1.min.js"></script>
        <script src="../../lib/jquery-ui/jquery-ui.js"></script>
        <script type="text/javascript" src="../../lib/datatables/datatables.min.js"></script>
    </head>

    <body class="w3-pale-red">

        <div class="w3-bar w3-xlarge w3-red" id="idDivBanner">
            <a href="#" class="w3-bar-item w3-button w3-gray" style="padding-top: 14px; padding-bottom: 14px;" onclick="closePage();">
                <i class="fa fa-times-circle"></i></a>
            <span class="w3-bar-item">S10. LOG AKTIVITAS SYSADMIN</span>
        </div>


        <div class="w3-panel" id="idDivQuery">
            <form action="do.php" id="frmMain" method="post" autocomplete="off">
                <input type="hidden" name="iPage" id="iPage" />
                <input type="hidden" name="navcmd" value="S10" />
                <table class="w3-table-all" style="width:100%">
                    <tr>
                        <th>From</th>
                        <th>To</th>
                        <th>User</th>
                        <th>Module</th>
                        <th>Action</th>
                        <th>Memo</th>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="iFrom" id="iDateStart" value="<?php echo $PAGE['form']['valFrom']; ?>" class="w3-input w3-border" style="width: unset;" />
                        </td>
                        <td>
                            <input type="text" name="iTo" id="iDateEnd" value="<?php echo $PAGE['form']['valTo']; ?>" class="w3-input w3-border" style="width: unset;" />
                        </td>
                        <td>
                            <select name="iUser" class="w3-input w3-border" >
                                <?php echo $PAGE['form']['cbUser']; ?>
                            </select>
                        </td>
                        <td>
                            <select name="iModule" class="w3-input w3-border" >
                                <?php echo $PAGE['form']['cbMod']; ?>
                            </select>
                        </td>
                        <td>
                            <select name="iAction" class="w3-input w3-border" >
                                <?php echo $PAGE['form']['cbACt']; ?>
                            </select>
                        </td>
                        <td>
                            <input type="text" name="iMemo" value="<?php echo $PAGE['form']['valMemo']; ?>" class="w3-input w3-border"  />
                        </td>
                    </tr>
                    <tr>
                        <th class="w3-right-align" colspan="10">
                            <button id="idBtnPrev" class="w3-button w3-orange w3-small w3-round-xxlarge">Prev</button>
                            <button id="idBtnNext" class="w3-button w3-orange w3-small w3-round-xxlarge">Next</button>
                            <button id="idBtnQuery" class="w3-button w3-green w3-small w3-round-xxlarge">Query</button>
                        </th>
                    </tr>
                </table>
            </form>
        </div>

        <div class="w3-container " id="idDivResult">
            <?php echo $PAGE['show']['display_text']; ?>
            <div class="w3-responsive">
                <table class="w3-table-all" style="width:100%">
                    <thead>
                        <tr>
                            <th>Rec ID</th>
                            <th>Timestamp</th>
                            <th>User</th>
                            <th>Module</th>
                            <th>Action</th>
                            <th>Memo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($PAGE['form']['table'])) {
                            foreach ($PAGE['form']['table'] as $key => $val) {
                                ?>
                                <tr>
                                    <td><?php echo $val['index']; ?></td>
                                    <td><?php echo $val['time']; ?></td>
                                    <td><?php echo $val['user']; ?></td>
                                    <td><?php echo $val['module']; ?></td>
                                    <td><?php echo $val['action']; ?></td>
                                    <td><?php echo $val['memo']; ?></td>
                                </tr>
                                <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="6">No Data</td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <p/>
        </div>

        <script>

            var varPage = <?php echo $PAGE['form']['page']; ?>;
            $(document).ready(function () {

                $(function () {
                    $("#iDateStart").datepicker({
                        dateFormat: "yy/mm/dd"
                    });
                    $("#iDateEnd").datepicker({
                        dateFormat: "yy/mm/dd"
                    });
                    //  Button action
                    $("#idBtnQuery").click(function (event) {
                        varPage = 0;
                        $("#iPage").val(varPage);
                        $("#frmMain").submit();
                    });

                    //  Button action
                    $("#idBtnPrev").click(function (event) {
                        varPage = varPage - 1;
                        $("#iPage").val(varPage);
                        $("#frmMain").submit();
                    });

                    //  Button action
                    $("#idBtnNext").click(function (event) {
                        varPage = varPage + 1;
                        $("#iPage").val(varPage);
                        $("#frmMain").submit();
                    });
                });
            });



            function closePage() {
                window.close();
            }





<?php
if ($PAGE['show']['btnPrev']) {
    
} else {
    ?>
                $("#idBtnPrev").attr("disabled", true);
    <?php
}
if ($PAGE['show']['btnNext']) {
    
} else {
    ?>
                $("#idBtnNext").attr("disabled", true);
    <?php
}
?>
        </script>

    </body>

</html>