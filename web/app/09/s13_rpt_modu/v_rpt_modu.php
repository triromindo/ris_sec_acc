<html>

    <head>
        <title>System Lap Pemakaian Module</title>

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
            <span class="w3-bar-item">S13. LAPORAN PEMAKAIAN MODULE</span>
        </div>


        <div class="w3-panel" id="idDivQuery">
            <form action="do.php" id="frmMain" method="post" autocomplete="off">
                <input type="hidden" name="navcmd" value="S13" />
                <table class="w3-table-all" style="width:100%">
                    <tr>
                        <th>Periode</th>
                        <td>
                            <select name="iYear" class="w3-select w3-border w3-padding-small" style="width: unset;" >
                                <?php echo $PAGE['form']['cbYear']; ?>
                            </select>
                            <select name="iMonth" class="w3-select w3-border w3-padding-small" style="width: unset;" >
                                <?php echo $PAGE['form']['cbMonth']; ?>
                            </select>
                            <select name="iAppMod" class="w3-select w3-border w3-padding-small" style="width: unset;" >
                                <?php echo $PAGE['form']['cbAppMod']; ?>
                            </select>
                        </td>
                        <td>
                            <button id="idBtnQuery" class="w3-button w3-green w3-small w3-round-xxlarge">Query</button>
                        </td>
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
                            <th>Nama</th>
                            <?php
                            for ($i = 1; $i <= 31; $i++) {
                                ?>
                                <td><?php echo $i; ?></td>
                                <?php
                            }
                            ?>
                            <th class="w3-right-align">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($PAGE['form']['table'])) {
                            foreach ($PAGE['form']['table'] as $keyUser => $valUser) {
                                ?>
                                <tr>
                                    <td><?php echo $keyUser; ?></td>
                                    <?php
                                    for ($i = 1; $i <= 31; $i++) {
                                        if (isset($PAGE['form']['table'][$keyUser][$i])) {
                                            $val = 'x';
                                        } else {
                                            $val = '&nbsp';
                                        }
                                        ?>
                                        <td><?php echo $val; ?></td>
                                        <?php
                                    }
                                    ?>
                                    <td class="w3-right-align"><?php echo $PAGE['form']['table_count'][$keyUser]; ?></td>
                                </tr>
                                <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="33">No Data</td>
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

            $(document).ready(function () {

                $(function () {
                    //  Button action
                    $("#idBtnQuery").click(function (event) {
                        $("#frmMain").submit();
                    });
                });
            });



            function closePage() {
                window.close();
            }
        </script>

    </body>

</html>