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
            <span class="w3-bar-item">S8. DAFTAR PROFILE - AKSES APLIKASI</span>
        </div>

        <div class="w3-container ">
            <p>
            <div class="w3-responsive">
                <form action="do.php" id="frmMain" method="post" autocomplete="off">
                    <input type="hidden" name="navcmd" id="idNavCmd" />
                    <input type="hidden" name="id" id="idProfileId" />
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
                    <h3>Akses Aplikasi</h3>
                    <table id="idTableMain" class="w3-table-all" style="width:100%">
                        <thead>
                            <tr>
                                <th>Aplikasi</th>
                            </tr>
                        </thead>
                        <tbody id="idTableMainData">
                            <?php
                            if (isset($PAGE['table']['access'])) {
                                if (count($PAGE['table']['access']) > 0) {
                                    foreach ($PAGE['table']['access'] as $key => $val) {
                                        ?>
                                        <tr>
                                            <td><input class="w3-check" type="checkbox" name='iChkBox[]' id='id_<?php echo $val['app_id']; ?>' value='<?php echo $val['app_id']; ?>'>
                                                &nbsp;<?php echo $val['app_name']; ?></td>
                                        </tr>
                                        <?php
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
            ?>
                            document.getElementById("<?php echo $val['app_id']; ?>").checked = true;
            <?php
        }
    }
}
?>


            });


            function funcBtnUpdate() {

                if (confirm("Apa anda akan mengupdate data ?")) {
                    $("#idNavCmd").val('S8,ACCAPP_UPD');
                    $("#idProfileId").val('<?php echo $PAGE['form']['profile_id']; ?>');
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

            function closePage() {
                window.close();
            }

        </script>

    </body>

</html>