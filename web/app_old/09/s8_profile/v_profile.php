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
        <div id="idSideOpt" class="rom-side-opt w3-light-grey ">
            <div class="w3-bar w3-xlarge w3-dark-grey">
                <span class="w3-bar-item w3-right-align">Option</span>
                <a href="#" class="w3-bar-item w3-button w3-right" style="padding-top: 14px; padding-bottom: 14px;" onclick="closeSide('idSideOpt')">
                    <i class="fa fa-times"></i></a>
            </div>
            <div class="w3-panel">
                <a href="#" class="w3-button w3-block w3-green w3-margin-bottom w3-round-xxlarge" onclick="funcBtnAdd()">
                    <i class="fas fa-plus-circle"></i> Add New</a>
            </div>
        </div>

        <div id="idSideDataAdd" class="rom-side-data w3-pale-yellow ">
            <div class="w3-bar w3-xlarge w3-blue-grey ">
                <span class="w3-bar-item">TAMBAH PROFILE</span>
                <a href="#" class="w3-bar-item w3-button w3-right" style="padding-top: 14px; padding-bottom: 14px;" onclick="closeSide('idSideDataAdd')">
                    <i class="fa fa-times"></i></a>
            </div>
            <div class="w3-panel">
                <form action="do.php" id="frmMainAdd" method="post" autocomplete="off">
                    <input type="hidden" name="navcmd" id="idAddNavCmd" />
                    
                    <div id="idAdd_BoxErr" class="w3-container w3-hide">
                        <div class="w3-panel w3-pale-red w3-leftbar w3-border-red">
                            <p id="idAdd_BoxErrMessage">
                                Process send to server.
                            </p>
                        </div>
                    </div>

                    <table class="w3-table-all">
                        <tr>
                            <th>ID Profile</th>
                            <td><input type="text" class="w3-input w3-border w3-padding-small" name="iProfileId" id="idAddProfile_id" maxlength="10"/></td>
                        </tr>
                        <tr>
                            <th>Nama Profile</th>
                            <td><input type="text" class="w3-input w3-border w3-padding-small" name="iProfileName" id="idAddProfile_name" maxlength="25" /></td>
                        </tr>
                        <tr>
                            <th>Catatan</th>
                            <td><input type="text" class="w3-input w3-border w3-padding-small" name="iProfileNote" id="idAddProfile_note" maxlength="25" /></td>
                        </tr>
                        <tr>
                            <th>ID Lokasi</th>
                            <td><select class="w3-input w3-border w3-padding-small" name="iProfile_LocId" id="idAddProfile_locId" >
                                    <?php echo $PAGE['form']['cbLoc']; ?>
                                </select></td>
                        </tr>
                    </table>
                    <div class="w3-container w3-margin-top w3-right-align">
                        <a href="#" class="w3-button w3-green w3-round-xxlarge" onclick="funcBtnSave();">Save</a>
                    </div>
                </form>
            </div>
        </div>

        <div id="idSideDataEdit" class="rom-side-data w3-pale-yellow ">
            <div class="w3-bar w3-xlarge w3-blue-grey ">
                <span class="w3-bar-item">EDIT PROFILE</span>
                <a href="#" class="w3-bar-item w3-button w3-right" style="padding-top: 14px; padding-bottom: 14px;" onclick="closeSide('idSideDataEdit')">
                    <i class="fa fa-times"></i></a>
            </div>
            <div class="w3-panel">
                <form action="do.php" id="frmMainEdit" method="post" autocomplete="off">
                    <input type="hidden" name="navcmd" id="idEditNavCmd" />
                    <input type="hidden" name="id" id="idEditId" />

                    <table class="w3-table-all">
                        <tr>
                            <th>ID Profile</th>
                            <td id="idEditProfile_id"></td>
                        </tr>
                        <tr>
                            <th>Nama Profile</th>
                            <td><input type="text" class="w3-input w3-border w3-padding-small" name="iProfileName" id="idEditProfile_name" maxlength="25" /></td>
                        </tr>
                        <tr>
                            <th>Catatan</th>
                            <td><input type="text" class="w3-input w3-border w3-padding-small" name="iProfileNote" id="idEditProfile_note" maxlength="25" /></td>
                        </tr>
                        <tr>
                            <th>ID Lokasi</th>
                            <td><select class="w3-input w3-border w3-padding-small" name="iProfile_LocId" id="idEditProfile_locId" >
                                    <?php echo $PAGE['form']['cbLoc']; ?>
                                </select></td>
                        </tr>
                    </table>
                    <div class="w3-container w3-margin-top w3-right-align">
                        <a href="#" class="w3-button w3-green w3-round-xxlarge" onclick="funcBtnUpdate();">Update</a>
                        <a href="#" class="w3-button w3-red w3-round-xxlarge" onclick="funcBtnDelete();">Delete</a>
                    </div>

                    <h3>Daftar Produk Grup</h3>
                    <table class="w3-table-all">
                        <tr>
                            <th>Daftar Produk Grup</th>
                            <td id="idEditProdGrp_list">&nbsp;</td>
                        </tr>
                    </table>
                    <div class="w3-container w3-margin-top w3-right-align">
                        <a href="#" class="w3-button w3-orange w3-round-xxlarge" onclick="funcBtnAccessProdGrp();">Rubah Akses Produk Grup</a>
                    </div>

                    <h3>Daftar Aplikasi</h3>
                    <table class="w3-table-all">
                        <tr>
                            <th>Daftar Aplikasi</th>
                            <td id="idEditApp_list">&nbsp;</td>
                        </tr>
                    </table>
                    <div class="w3-container w3-margin-top w3-right-align">
                        <a href="#" class="w3-button w3-orange w3-round-xxlarge" onclick="funcBtnAccessApp();">Rubah Akses Aplikasi</a>
                    </div>

                    <h3>Daftar Module</h3>
                    <table class="w3-table-all">
                        <tr>
                            <th>Daftar Aplikasi</th>
                            <td>
                                <select class="w3-select" style="width: unset;" id="idEditApp_cb">
                                    <option>Opsi 1</option>
                                </select>
                                <a href="#" class="w3-button w3-orange w3-round-xxlarge" onclick="funcBtnListModule();">Lihat Modul</a>
                            </td>
                        </tr>
                        <tr>
                            <th>Tidak Dapat Akses (NO ACCESS)</th>
                            <td id="idEditAccess_0"></td>
                        </tr>
                        <tr>
                            <th>Akses Lihat atau Proses (VIEW)</th>
                            <td id="idEditAccess_1"></td>
                        </tr>
                        <tr>
                            <th>Akses Membuat data (MAKER)</th>
                            <td id="idEditAccess_2"></td>
                        </tr>
                        <tr>
                            <th>Akses Release (RELEASER)</th>
                            <td id="idEditAccess_3"></td>
                        </tr>
                        <tr>
                            <th>Akses Bebas (FREE ENTRY)</th>
                            <td id="idEditAccess_4"></td>
                        </tr>
                    </table>
                    <div class="w3-container w3-margin-top w3-right-align">
                        <a href="#" class="w3-button w3-orange w3-round-xxlarge" onclick="funcBtnAccessModule();">Rubah Akses Modul</a>
                    </div>

                    <h3>Daftar Akses Semua Lokasi / Area / Rayon</h3>
                    <table class="w3-table-all">
                        <tr>
                            <th>Lokasi (Termasuk semua Area & Rayon dibawahnya)</th>
                            <td id="idEditLoc_list"></td>
                        </tr>
                        <tr>
                            <th>Area (Termasuk semua Rayon dibawahnya)</th>
                            <td id="idEditArea_list"></td>
                        </tr>
                        <tr>
                            <th>Rayon (Hanya Rayon tertulis)</th>
                            <td id="idEditRayon_list"></td>
                        </tr>
                    </table>
                    <div class="w3-container w3-margin-top w3-right-align">
                        <a href="#" class="w3-button w3-orange w3-round-xxlarge" onclick="funcBtnAccessLocAreaRay();">Rubah Akses Lokasi / Area / Rayon</a>
                    </div>

                </form>
            </div>
        </div>

        <div class="w3-bar w3-xlarge w3-red">
            <a href="#" class="w3-bar-item w3-button w3-gray" style="padding-top: 14px; padding-bottom: 14px;" onclick="closePage();">
                <i class="fa fa-times-circle"></i></a>
            <span class="w3-bar-item">S8. DAFTAR PROFILE</span>
            <a href="#" class="w3-bar-item w3-button w3-right" style="padding-top: 14px; padding-bottom: 14px;" onclick="openSide250('idSideOpt')">
                <i class="fa fa-bars"></i></a>
        </div>
        
        <div class="w3-container ">
            <p>
            <div class="w3-responsive">
                <table id="idTableMain" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID Profile</th>
                            <th>Nama Profile</th>
                            <th>Catatan</th>
                            <th>ID Lokasi</th>
                        </tr>
                    </thead>
                    <tbody id="idTableMainData"></tbody>
                </table>
            </div>
        </p>
    </div>

    <script>

        $(document).ready(function () {
            funcTableLoad();

            $(function () {
                $("#iDate").datepicker();
            });

        });

        var varProdID = '';
        var varTable = null;

        function funcTableLoad() {
            varTable = $('#idTableMain').DataTable({
                "ajax": 'do.php?navcmd=S8,TABLE'
            });

            $('#idTableMain tbody').on('click', 'tr', function () {
                var data = varTable.row($(this)).data();
                funcBtnEdit(data[0]);
            });
        }


        function funcDataView(iProdID) {
            varProdID = iProdID;

            $.getJSON("do.php?navcmd=S8,VIEW&id=" + iProdID, function (varRes) {
                if (varRes.status) {
                    $("#idViewProd_id").text(varRes.data.prod_id);
                    $("#idViewProd_name").text(varRes.data.prod_name);
                    $("#idViewProd_name_short").text(varRes.data.prod_name_short);
                    $("#idViewProd_unit").text(varRes.data.prod_unit);
                    $("#idViewProd_sale_unit").text(varRes.data.prod_sale_unit);
                    $("#idViewProd_sale_status").text(varRes.data.prod_sale_status);
                    $("#idViewProd_price_master").text(varRes.data.prod_price_master);
                    $("#idViewProd_active").text(varRes.data.prod_active);
                }
            });
            openSide80('idSideDataView');
        }

        function funcBtnAdd() {
            $("#idAddProfile_id").val('');
            $("#idAddProfile_name").val('');
            $("#idAddProfile_note").val('');
            $("#idAddProfile_locId").val('');
            $("#idAdd_BoxErr").addClass("w3-hide");
            openSide80('idSideDataAdd');
        }

        function funcBtnSave() {
            if (confirm("Apa anda akan menyimpan data ?")) {
                $("#idAddNavCmd").val('S8,SAVE');
                $.ajax({
                    data: $('#frmMainAdd').serialize(),
                    method: "POST",
                    url: "do.php",
                    dataType: "json",
                    success: function (data) {
                        console.log(data);

                        if (data.status) {
                            alert("Data disimpan");
                            funcRefreshTable();
                            closeSide('idSideDataAdd');
                        } else {
                            $("#idAdd_BoxErrMessage").text(data.err_msg);
                            $("#idAdd_BoxErr").removeClass("w3-hide");
                        }

                    },
                    error: function (data) {
                        alert("Data gagal diupdate")
                        console.log('An error occurred.');
                    },
                });

            } else {
                alert("Hapus data dibatalkan");
            }
        }

        function funcBtnEdit(iProdID) {
            varProdID = iProdID;

            $.getJSON("do.php?navcmd=S8,VIEW&id=" + iProdID, function (varRes) {
                if (varRes.status) {
                    $("#idEditProfile_id").text(varRes.data.prof_id);
                    $("#idEditProfile_name").val(varRes.data.prof_name);
                    $("#idEditProfile_note").val(varRes.data.prof_desc);
                    $("#idEditProfile_locId").val(varRes.data.loc_id);

                    document.getElementById("idEditProdGrp_list").innerHTML = '';
                    document.getElementById("idEditApp_list").innerHTML = '';
                    tmpLen = document.getElementById("idEditApp_cb").options.length;
                    for (i = 0; i < tmpLen; i++) {
                        document.getElementById("idEditApp_cb").remove(0);
                    }
                    document.getElementById("idEditLoc_list").innerHTML = '';
                    document.getElementById("idEditArea_list").innerHTML = '';
                    document.getElementById("idEditRayon_list").innerHTML = '';
                    
                    if (varRes.data_prodgrp) {
                        varRes.data_prodgrp.forEach(function (val) {
                            document.getElementById("idEditProdGrp_list").innerHTML += val.text + "<br>";
                        });
                    }

                    if (varRes.data_app) {
                        varRes.data_app.forEach(function (val) {
                            document.getElementById("idEditApp_list").innerHTML += val.text + "<br>";

                            var tmpElOpt = document.createElement("option");
                            tmpElOpt.text = val.text;
                            tmpElOpt.value = val.val;
                            document.getElementById("idEditApp_cb").add(tmpElOpt);
                        });
                    }

                    if (varRes.data_loc) {
                        varRes.data_loc.forEach(function (val) {
                            document.getElementById("idEditLoc_list").innerHTML += val.text + "<br>";

                        });
                    }

                    if (varRes.data_area) {
                        varRes.data_area.forEach(function (val) {
                            document.getElementById("idEditArea_list").innerHTML += val.text + "<br>";

                        });
                    }

                    if (varRes.data_ray) {
                        varRes.data_ray.forEach(function (val) {
                            document.getElementById("idEditRayon_list").innerHTML += val.text + "<br>";

                        });
                    }


                }
            });
            openSide80('idSideDataEdit');
        }

        function funcBtnUpdate() {
            if (confirm("Apa anda akan mengupdate data ?")) {
                $("#idEditNavCmd").val('S8,UPD');
                $("#idEditId").val(varProdID);
                $.ajax({
                    data: $('#frmMainEdit').serialize(),
                    method: "POST",
                    url: "do.php",
                    dataType: "json",
                    success: function (data) {
                        console.log(data);

                        if (data.status) {
                            alert("Data diupdate");
                            funcRefreshTable();
                        } else {
                            alert("Data gagal diupdate. Cek IT");
                        }

                    },
                    error: function (data) {
                        alert("Data gagal diupdate")
                        console.log('An error occurred.');
                    },
                });
                closeSide('idSideDataEdit');
            } else {
                alert("Update data dibatalkan");
            }
        }

        function funcBtnDelete() {
            if (confirm("Apa anda akan menghapus data ?")) {
                $("#idEditNavCmd").val('S8,DEL');
                $("#idEditId").val(varProdID);
                $.ajax({
                    data: $('#frmMainEdit').serialize(),
                    method: "POST",
                    url: "do.php",
                    dataType: "json",
                    success: function (data) {
                        console.log(data);

                        if (data.status) {
                            alert("Data dihapus");
                            funcRefreshTable();
                        } else {
                            alert("Data gagal dihapus. Cek IT");
                        }

                    },
                    error: function (data) {
                        alert("Data gagal dihapus")
                        console.log('An error occurred.');
                    },
                });
                closeSide('idSideDataEdit');
            } else {
                alert("Hapus data dibatalkan");
            }
        }

        function funcRefreshTable() {
            varTable.ajax.reload();
        }

        function openSide250(side_item) {
            closeSide('idSideOpt');
            closeSide('idSideDataAdd');
            closeSide('idSideDataEdit');
            document.getElementById(side_item).style.width = "250px";
        }
        function openSide80(side_item) {
            closeSide('idSideOpt');
            closeSide('idSideDataAdd');
            closeSide('idSideDataEdit');
            document.getElementById(side_item).style.width = "80%";
        }
        function closeSide(side_item) {
            document.getElementById(side_item).style.width = "0";
        }
        
        function funcBtnAccessProdGrp() {
            window.open("do.php?navcmd=S8,ACCPRODGRP&id=" + varProdID, "_blank", "toolbar=no,scrollbars=yes,location=no,resizable=yes", false);
        }

        function funcBtnAccessApp() {
            window.open("do.php?navcmd=S8,ACCAPP&id=" + varProdID, "_blank", "toolbar=no,scrollbars=yes,location=no,resizable=yes", false);
        }

        function funcBtnListModule() {
            var varAppID = document.getElementById("idEditApp_cb").value;

            document.getElementById("idEditAccess_0").innerHTML = '';
            document.getElementById("idEditAccess_1").innerHTML = '';
            document.getElementById("idEditAccess_2").innerHTML = '';
            document.getElementById("idEditAccess_3").innerHTML = '';
            document.getElementById("idEditAccess_4").innerHTML = '';

            $.getJSON("do.php?navcmd=S8,MODUL&id=" + varProdID + "&app=" + varAppID, function (varRes) {
                if (varRes.status) {
                    if (varRes.data.lvl_0) {
                        varRes.data.lvl_0.forEach(function (val) {
                            document.getElementById("idEditAccess_0").innerHTML += val.appmod_name + "<br>";
                        });
                    }
                    if (varRes.data.lvl_1) {
                        varRes.data.lvl_1.forEach(function (val) {
                            document.getElementById("idEditAccess_1").innerHTML += val.appmod_name + "<br>";
                        });
                    }
                    if (varRes.data.lvl_2) {
                        varRes.data.lvl_2.forEach(function (val) {
                            document.getElementById("idEditAccess_2").innerHTML += val.appmod_name + "<br>";
                        });
                    }
                    if (varRes.data.lvl_3) {
                        varRes.data.lvl_3.forEach(function (val) {
                            document.getElementById("idEditAccess_3").innerHTML += val.appmod_name + "<br>";
                        });
                    }
                    if (varRes.data.lvl_4) {
                        varRes.data.lvl_4.forEach(function (val) {
                            document.getElementById("idEditAccess_4").innerHTML += val.appmod_name + "<br>";
                        });
                    }
                }
            });
        }

        function funcBtnAccessModule() {
            var varLocID = document.getElementById("idEditProfile_locId").value;
            var varAppID = document.getElementById("idEditApp_cb").value;
            window.open("do.php?navcmd=S8,ACCMOD&id=" + varProdID + "&loc=" + varLocID + "&app=" + varAppID, "_blank", "toolbar=no,scrollbars=yes,location=no,resizable=yes", false);
        }

        function funcBtnAccessLocAreaRay() {
            var varLocID = document.getElementById("idEditProfile_locId").value;
            window.open("do.php?navcmd=S8,ACCLOC&id=" + varProdID + "&loc=" + varLocID, "_blank", "toolbar=no,scrollbars=yes,location=no,resizable=yes", false);
        }
        function closePage() {
            window.close();
        }
    </script>

</body>

</html>