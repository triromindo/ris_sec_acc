<html>

    <head>
        <title><?php echo $PAGE['PAGE']['TITLE']; ?></title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="../../img/romindo.gif">
        <link rel="stylesheet" type="text/css" href="../../lib/jquery-ui/jquery-ui.css" />
        <link rel="stylesheet" type="text/css" href="../../lib/w3/w3.css" />
        <link rel="stylesheet" type="text/css" href="../../lib/css/rom.css" />
        <link rel="stylesheet" type="text/css" href="../../lib/fa/css/all.css" />
        <link rel="stylesheet" type="text/css" href="../../lib/dataTables/datatables.min.css" />

        <script type="text/javascript" src="../../lib/jquery/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="../../lib/jquery-ui/jquery-ui.js"></script>
        <script type="text/javascript" src="../../lib/dataTables/datatables.min.js"></script>


    </head>

    <body class="w3-pale-red">
        <div class="w3-bar w3-xlarge w3-red">
            <a href="#" class="w3-bar-item w3-button w3-gray" style="padding-top: 14px; padding-bottom: 14px;" onclick="closePage();"><i class="fa fa-times-circle"></i></a>
            <span class="w3-bar-item"><?php echo $PAGE['PAGE']['NAME']; ?></span>
        </div>
        <?php
        if ($PAGE['step'] == 1) {
            ?>
            <div class="w3-container" id="idDivStep1">
                <p/>
                <div class="w3-responsive">
                    <form action="do.php" id="idFrmStep1" method="post" autocomplete="off" enctype="multipart/form-data">
                        <input type="hidden" name="navcmd" id="idStep1NavCmd" />
                        <input type="hidden" name="toStep" value="2" />

                        <?php
                        if (strlen($PAGE['error']) > 0) {
                            ?>
                            <div id="idStep2_BoxErr" class="w3-container">
                                <div class="w3-panel w3-pale-red w3-leftbar w3-border-red">
                                    <?php echo $PAGE['error']; ?>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <table class="w3-table-all">
                            <tr>
                                <th>File Upload</th>
                                <td><input type="file" name="fileToUpload" id="fileToUpload"></td>
                            </tr>
                        </table>
                        <div class="w3-container w3-margin-top w3-right-align">
                            <a href="#" class="w3-button w3-green w3-round-xxlarge" onclick="funcStep1();">Upload</a>
                        </div>
                    </form>
                </div>
            </div>
            <?php
        }

        if ($PAGE['step'] == 2) {
            ?>

            <div class="w3-container" id="idDivStep2">
                <p/>
                <div class="w3-responsive">
                    <form action="do.php" id="idFrmStep2" method="post" autocomplete="off" enctype="multipart/form-data">
                        <input type="hidden" name="navcmd" id="idStep2NavCmd" />
                        <input type="hidden" name="toStep" value="3" />
                        <?php
                        if (strlen($PAGE['error']) > 0) {
                            ?>
                            <div id="idStep2_BoxErr" class="w3-container">
                                <div class="w3-panel w3-pale-red w3-leftbar w3-border-red">
                                    <p><?php echo $PAGE['error']; ?></p>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <table class="w3-table-all" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" onclick="funcSelAll(this)"> All</th>
                                    <th>ID Aplikasi</th>
                                    <th>Nama</th>
                                    <th>Index</th>
                                    <th>NavName</th>
                                    <th>Versi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($PAGE['table'] as $key => $value) {
                                    echo '<tr>';
                                    if ($_SESSION['tmp']['table_app'][$value['id']]['double']) {
                                        echo '<td>Ada</td>';
                                    } else {
                                        echo '<td><input type="checkbox" name="iSel[]" value="' . $value['id'] . '"></td>';
                                    }
                                    echo '<td>' . $value['id'] . '</td>';
                                    echo '<td>' . $value['name'] . '</td>';
                                    echo '<td>' . $value['index'] . '</td>';
                                    echo '<td>' . $value['navname'] . '</td>';
                                    echo '<td>' . $value['ver'] . '</td>';
                                    echo '</tr>';
                                }
                                ?>                        
                            </tbody>
                        </table>
                        <div class="w3-container w3-margin-top w3-right-align">
                            <a href="#" class="w3-button w3-green w3-round-xxlarge" onclick="funcStep2();">Upload App</a>
                        </div>
                    </form>
                </div>
            </div>
            <?php
        }

        if ($PAGE['step'] == 3) {
            ?>

            <div class="w3-container" id="idDivStep2">
                <p/>
                <div id="idStep3_BoxOK" class="w3-container">
                    <div class="w3-panel w3-pale-green w3-leftbar w3-border-green">
                        <p>Data berhasil ditambah. Silahkan tutup dan refresh module sebelumnya.</p>
                    </div>
                </div>
                <div class="w3-responsive">
                    <form action="do.php" id="idFrmStep3" method="post" autocomplete="off" enctype="multipart/form-data">
                        <input type="hidden" name="navcmd" id="idStep3NavCmd" />
                        <input type="hidden" name="toStep" value="4" />

                        <table class="w3-table-all" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID Aplikasi</th>
                                    <th>Nama</th>
                                    <th>Index</th>
                                    <th>NavName</th>
                                    <th>Versi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($PAGE['table_add'] as $key => $value) {
                                    echo '<tr>';
                                    echo '<td>' . $value['id'] . '</td>';
                                    echo '<td>' . $value['name'] . '</td>';
                                    echo '<td>' . $value['index'] . '</td>';
                                    echo '<td>' . $value['navname'] . '</td>';
                                    echo '<td>' . $value['ver'] . '</td>';
                                    echo '</tr>';
                                }
                                ?>                        
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
            <?php
        }
        ?>

        <script>

            $(document).ready(function () {

            });

            var varID = '';
            var varTable = null;

            function funcSelAll(source) {
                checkboxes = document.getElementsByName("iSel[]");
                for (var i = 0, n = checkboxes.length; i < n; i++) {
                    checkboxes[i].checked = source.checked;
                }
            }




            function closePage() {
                window.close();
            }

            function funcStep1() {
                if (confirm("Apa anda akan upload file ini ?")) {
                    $("#idStep1NavCmd").val('<?php echo $PAGE['ID']; ?>,UPLOAD');
                    $('#idFrmStep1').submit();
                } else {
                    alert("Hapus data dibatalkan");
                }
            }

            function funcStep2() {
                if (confirm("Apa anda akan upload data ?")) {
                    $("#idStep2NavCmd").val('<?php echo $PAGE['ID']; ?>,UPLOAD');
                    $("#idFrmStep2").submit();
                } else {
                    alert("Download data dibatalkan");
                }
            }
        </script>

    </body>
</html>