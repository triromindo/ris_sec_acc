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
            <span class="w3-bar-item">S8. DAFTAR PROFILE - AKSES LOKASI</span>
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
                    <h3>Akses Lokasi / Area / Rayon</h3>
                    <?php
                    if (isset($PAGE['table']['data'])) {
                        if (count($PAGE['table']['data']) > 0) {
                            echo '<ul class="w3-ul w3-hoverable">';
                            foreach ($PAGE['table']['data'] as $keyLoc => $valArea) {
                                echo '<li><input type="checkbox" class="w3-check" name="iLoc[]" value="' . $keyLoc . '" id="idLoc_' . $keyLoc . '" onclick="funcCheck(this);" >' . $keyLoc . '</li>';
                                if (count($valArea) > 0) {
                                    echo '<ul class="w3-ul w3-hoverable">';
                                    foreach ($valArea as $keyArea => $valRayon) {
                                        echo '<li style="padding-left: 64px;">'
                                        . '<input type="checkbox" class="w3-check" name="iArea[]" value="' . $keyArea . '" id="idArea_' . $keyArea . '" onclick="funcCheck(this);" >' . $PAGE['table']['area'][$keyArea] . '</li>';
                                        if (count($valRayon) > 0) {
                                            echo '<ul class="w3-ul w3-hoverable">';
                                            foreach ($valRayon as $keyRayon => $valID) {
                                                echo '<li style="padding-left: 128px;">'
                                                . '<input type="checkbox" class="w3-check" name="iRayon[]" value="' . $keyRayon . '" id="idRayon_' . $keyRayon . '" onclick="funcCheck(this);" >' . $PAGE['table']['rayon'][$keyRayon] . '</li>';
                                            }
                                            echo '</ul>';
                                        }
                                    }
                                    echo '</ul>';
                                }
                            }
                            echo '</ul>';
                        }
                    }
                    ?>
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

                    <button class="w3-button w3-green
                            " onclick="window.close();">Tutup Halaman ini</button>

                </div>
                <br>
            </div>
        </div>

        <script>

            $(document).ready(function () {

<?php
if (isset($PAGE['selected']['loc'])) {
    if (count($PAGE['selected']['loc']) > 0) {
        foreach ($PAGE['selected']['loc'] as $key => $val) {
            ?>
                            funcCheckBeg("idLoc_<?php echo $val; ?>");
            <?php
        }
    }
}
if (isset($PAGE['selected']['area'])) {
    if (count($PAGE['selected']['area']) > 0) {
        foreach ($PAGE['selected']['area'] as $key => $val) {
            ?>
                            funcCheckBeg("idArea_<?php echo $val; ?>");
            <?php
        }
    }
}
if (isset($PAGE['selected']['rayon'])) {
    if (count($PAGE['selected']['rayon']) > 0) {
        foreach ($PAGE['selected']['rayon'] as $key => $val) {
            ?>
                            funcCheckBeg("idRayon_<?php echo $val; ?>");
            <?php
        }
    }
}
?>


            });
            function funcBtnUpdate() {


                if (confirm("Apa anda akan mengupdate data ?")) {
                    $("#idNavCmd").val('S8,ACCLOC_UPD');
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
                                //  funcShowDone();
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
                if (iNode.parentNode.nextElementSibling.nodeName == 'UL') {
                    var c = iNode.parentNode.nextElementSibling.getElementsByTagName("INPUT");
                    for (i = 0; i < c.length; i++) {
                        c[i].checked = iNode.checked;
                        c[i].disabled = iNode.checked;
                        if (iNode.checked) {
                            c[i].parentNode.classList.add("w3-yellow");
                        } else {
                            c[i].parentNode.classList.remove("w3-yellow");
                        }
                    }
                }
                if (iNode.checked) {
                    iNode.parentNode.classList.add("w3-yellow");
                } else {
                    iNode.parentNode.classList.remove("w3-yellow");
                }
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