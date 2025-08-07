<html>

    <head>
        <title>System Profile</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../lib/jquery-ui/jquery-ui.css" />
        <link rel="shortcut icon" href="../../img/romindo.gif">
        <link rel="stylesheet" href="../../lib/w3/w3.css" />
        <link rel="stylesheet" href="../../lib/css/rom.css" />
        <link rel="stylesheet" href="../../lib/fa/css/all.css" />
        <link rel="stylesheet" type="text/css" href="../../lib/dataTables/datatables.min.css" />

        <script type="text/javascript" src="../../lib/jquery/jquery-3.4.1.min.js"></script>
        <script src="../../lib/jquery-ui/jquery-ui.js"></script>
        <script type="text/javascript" src="../../lib/dataTables/datatables.min.js"></script>
    </head>

    <body class="w3-pale-red">
        <div class="w3-bar w3-xlarge w3-red">
            <a href="#" class="w3-bar-item w3-button w3-gray" style="padding-top: 14px; padding-bottom: 14px;" onclick="closePage();">
                <i class="fa fa-times-circle"></i></a>
            <span class="w3-bar-item">S8. DAFTAR PROFILE - AKSES MODULE</span>
        </div>

        <div class="w3-container ">
            <p>
            <div class="w3-responsive">
                <form action="do.php" id="frmMain" method="post" autocomplete="off">
                    <input type="hidden" name="navcmd" id="idNavCmd" />
                    <input type="hidden" name="id" id="idProfileId" />
                    <input type="hidden" name="app" id="idAppId" />
                    <h3>Profile</h3>
                    <table class="w3-table-all">
                        <tr>
                            <th>ID Profile</th>
                            <td><?php echo $PAGE['table']['dataProfile']['prof_id']; ?></td>
                        </tr>
                        <tr>
                            <th>Nama Profile</th>
                            <td><?php echo $PAGE['table']['dataProfile']['prof_name']; ?></td>
                        </tr>
                        <tr>
                            <th>Catatan</th>
                            <td><?php echo $PAGE['table']['dataProfile']['prof_desc']; ?></td>
                        </tr>
                        <tr>
                            <th>ID Lokasi</th>
                            <td><?php echo $PAGE['table']['dataProfile']['loc_id']; ?></td>
                        </tr>
                    </table>
                    <h3>Akses Modul</h3>
                    <table id="idTableMain" class="w3-table-all" style="width:100%">
                        <thead>
                            <tr>
                                <th>Modul</th>
                                <th class="w3-border-left w3-center" style="width: 75px;">Tidak ada akses</th>
                                <th class="w3-border-left w3-center" style="width: 75px;">Lihat (dan Proses)</th>
                                <th class="w3-border-left w3-center" style="width: 75px;">Tulis</th>
                                <th class="w3-border-left w3-center" style="width: 75px;">Release</th>
                                <th class="w3-border-left w3-center" style="width: 75px;">Isi bebas (tanpa Release)</th>
                            </tr>
                        </thead>
                        <tbody id="idTableMainData">
                            <?php
                            if (isset($PAGE['table']['access'])) {
                                if (count($PAGE['table']['access']) > 0) {
                                    foreach ($PAGE['table']['access'] as $key => $val) {
                                        if ($val['access_type'] == 'VP') {
                                            ?>
                                            <tr>
                                                <td><?php echo $val['appmod_name'] . '<br>' . $val['appmod_note']; ?></td>
                                                <td class="w3-border-left w3-center"><input class="w3-radio" type="radio" name='iChkBox[<?php echo $val['appmod_id']; ?>]' id='id_<?php echo $val['appmod_id']; ?>_0' value='0' onclick="funcCheck(this);" ></td>
                                                <td class="w3-border-left w3-center"><input class="w3-radio" type="radio" name='iChkBox[<?php echo $val['appmod_id']; ?>]' id='id_<?php echo $val['appmod_id']; ?>_1' value='1' onclick="funcCheck(this);" ></td>
                                                <td class="w3-border-left w3-center">&nbsp;</td>
                                                <td class="w3-border-left w3-center">&nbsp;</td>
                                                <td class="w3-border-left w3-center">&nbsp;</td>
                                            </tr>
                                            <?php
                                        } elseif ($val['access_type'] == 'MR') {
                                            ?>
                                            <tr>
                                                <td><?php echo $val['appmod_name'] . '<br>' . $val['appmod_note']; ?></td>
                                                <td class="w3-border-left w3-center"><input class="w3-radio" type="radio" name='iChkBox[<?php echo $val['appmod_id']; ?>]' id='id_<?php echo $val['appmod_id']; ?>_0' value='0' onclick="funcCheck(this);" ></td>
                                                <td class="w3-border-left w3-center"><input class="w3-radio" type="radio" name='iChkBox[<?php echo $val['appmod_id']; ?>]' id='id_<?php echo $val['appmod_id']; ?>_1' value='1' onclick="funcCheck(this);" ></td>
                                                <td class="w3-border-left w3-center"><input class="w3-radio" type="radio" name='iChkBox[<?php echo $val['appmod_id']; ?>]' id='id_<?php echo $val['appmod_id']; ?>_2' value='2' onclick="funcCheck(this);" ></td>
                                                <td class="w3-border-left w3-center"><input class="w3-radio" type="radio" name='iChkBox[<?php echo $val['appmod_id']; ?>]' id='id_<?php echo $val['appmod_id']; ?>_3' value='3' onclick="funcCheck(this);" ></td>
                                                <td class="w3-border-left w3-center">&nbsp;</td>
                                            </tr>
                                            <?php
                                        } elseif ($val['access_type'] == 'AED') {
                                            ?>
                                            <tr>
                                                <td><?php echo $val['appmod_name'] . '<br>' . $val['appmod_note']; ?></td>
                                                <td class="w3-border-left w3-center"><input class="w3-radio" type="radio" name='iChkBox[<?php echo $val['appmod_id']; ?>]' id='id_<?php echo $val['appmod_id']; ?>_0' value='0' onclick="funcCheck(this);" ></td>
                                                <td class="w3-border-left w3-center"><input class="w3-radio" type="radio" name='iChkBox[<?php echo $val['appmod_id']; ?>]' id='id_<?php echo $val['appmod_id']; ?>_1' value='1' onclick="funcCheck(this);" ></td>
                                                <td class="w3-border-left w3-center">&nbsp;</td>
                                                <td class="w3-border-left w3-center">&nbsp;</td>
                                                <td class="w3-border-left w3-center"><input class="w3-radio" type="radio" name='iChkBox[<?php echo $val['appmod_id']; ?>]' id='id_<?php echo $val['appmod_id']; ?>_4' value='4' onclick="funcCheck(this);" ></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="5">Tidak ada data</td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="w3-container w3-margin-top w3-right-align">
                        <a href="#" class="w3-button w3-green w3-round-xxlarge" onclick="funcBtnUpdate();">Update Access</a>
                    </div>
                </form>
            </div>
        </div>

        <div id="id01" class="w3-modal">
            <div class="w3-modal-content">
                <div class="w3-bar w3-green">
                    <span class="w3-bar-item"><h3><b>Proses Selesai</b></h3></span>
                </div>
                <div class="w3-container">
                    <p>Data sudah diupdate.</p>
                    <p>Silahkan tutup halaman ini.</p>
                    <button class="w3-button w3-green" onclick="window.close();">Tutup Halaman ini</button>
                </div>
                <br>
            </div>
        </div>

        <script>

            $(document).ready(function () {

                $(function () {
                    $("#iDate").datepicker();
                });

<?php
if (isset($PAGE['selected'])) {
    if (count($PAGE['selected']) > 0) {
        foreach ($PAGE['selected'] as $key => $val) {
            $tmpRadioId = 'id_' . $val['appmod_id'] . '_' . $val['access_level'];
            ?>
                            funcCheckBeg('<?php echo $tmpRadioId; ?>');
            <?php
        }
    }
}
?>


            });


            function funcBtnUpdate() {

                if (confirm("Apa anda akan mengupdate data ?")) {
                    $("#idNavCmd").val('S8,ACCMOD_UPD');
                    $("#idProfileId").val('<?php echo $PAGE['form']['profile_id']; ?>');
                    $("#idAppId").val('<?php echo $PAGE['form']['app_id']; ?>');
                    $.ajax({
                        data: $('#frmMain').serialize(),
                        method: "POST",
                        url: "do.php",
                        dataType: "json",
                        success: function (data) {
                            console.log(data);

                            if (data.status) {
                                alert("Data diupdate");
                                funcShowDone();
                            } else {
                                alert("Data gagal diupdate. Cek IT");
                            }

                        },
                        error: function (data) {
                            alert("Data gagal diupdate" + data)
                            console.log('An error occurred.');
                        },
                    });
                } else {
                    alert("Update data dibatalkan");
                }
            }

            function funcShowDone() {
                document.getElementById('id01').style.display = 'block';
            }

            function funcCheck(iNode) {
                var c = iNode.parentNode.parentNode.getElementsByTagName("TD");
                for (i = 0; i < c.length; i++) {

                    c[i].classList.remove("w3-yellow");
                }

                iNode.parentNode.classList.add("w3-yellow");
            }

            function funcCheckBeg(iId) {
                var x = document.getElementById(iId);
                x.checked = true;
                funcCheck(x);
            }

            function closePage() {
                window.close();
            }
        </script>

    </body>

</html>