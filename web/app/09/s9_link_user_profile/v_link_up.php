<html>

    <head>
        <title>System Link User - Profile</title>

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
                <span class="w3-bar-item">TAMBAH LINK USER - PROFILE</span>
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
                            <th>Nama User</th>
                            <td><select class="w3-input w3-border w3-padding-small" name="iUserId" id="idAdd_UserId" >
                                    <?php echo $PAGE['form']['cbUser']; ?>
                                </select></td>
                        </tr>
                        <tr>
                            <th>Nama Profile</th>
                            <td><select class="w3-input w3-border w3-padding-small" name="iProfileId" id="idAdd_ProfileId" >
                                    <?php echo $PAGE['form']['cbProfile']; ?>
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
                <span class="w3-bar-item">EDIT LINK USER - PROFILE</span>
                <a href="#" class="w3-bar-item w3-button w3-right" style="padding-top: 14px; padding-bottom: 14px;" onclick="closeSide('idSideDataEdit')">
                    <i class="fa fa-times"></i></a>
            </div>
            <div class="w3-panel">
                <form action="do.php" id="frmMainEdit" method="post" autocomplete="off">
                    <input type="hidden" name="navcmd" id="idEditNavCmd" />
                    <input type="hidden" name="id" id="idEditId" />

                    <table class="w3-table-all">
                        <tr>
                            <th>Nama User</th>
                            <td><select class="w3-input w3-border w3-padding-small" name="iUserId" id="idEdit_UserId" >
                                    <?php echo $PAGE['form']['cbUser']; ?>
                                </select></td>
                        </tr>
                        <tr>
                            <th>Nama Profile</th>
                            <td><select class="w3-input w3-border w3-padding-small" name="iProfileId" id="idEdit_ProfileId" >
                                    <?php echo $PAGE['form']['cbProfile']; ?>
                                </select></td>
                        </tr>
                    </table>
                    <div class="w3-container w3-margin-top w3-right-align">
                        <a href="#" class="w3-button w3-green w3-round-xxlarge" onclick="funcBtnUpdate();">Update</a>
                        <a href="#" class="w3-button w3-red w3-round-xxlarge" onclick="funcBtnDelete();">Delete</a>
                    </div>
                </form>
            </div>
        </div>

        <div id="idSideDataView" class="rom-side-data w3-pale-blue ">
            <input type="hidden" name="navCmd" id="idViewNavCmd" />
            <div class="w3-bar w3-xlarge w3-blue-grey ">
                <span class="w3-bar-item">Produk</span>
                <a href="#" class="w3-bar-item w3-button w3-right" style="padding-top: 14px; padding-bottom: 14px;" onclick="closeSide('idSideDataView')">
                    <i class="fa fa-times"></i></a>
            </div>
            <div class="w3-panel">
                <form>
                    <table class="w3-table-all">
                        <tr>
                            <th>Kode Produk</th>
                            <td id="idViewProd_id"></td>
                        </tr>

                        <tr>
                            <th>Nama Produk</th>
                            <td id="idViewProd_name"></td>
                        </tr>

                        <tr>
                            <th>Nama Singkat</th>
                            <td id="idViewProd_name_short"></td>
                        </tr>

                        <tr>
                            <th>Unit</th>
                            <td id="idViewProd_unit"></td>
                        </tr>
                        <tr>
                            <th>Satuan Jual</th>
                            <td id="idViewProd_sale_unit"></td>
                        </tr>
                        <tr>
                            <th>Status Produk</th>
                            <td id="idViewProd_sale_status"></td>
                        </tr>
                        <tr>
                            <th>Harga Master</th>
                            <td id="idViewProd_price_master"></td>
                        </tr>
                        <tr>
                            <th>Aktif</th>
                            <td id="idViewProd_active"></td>
                        </tr>
                    </table>
                    <div class="w3-container w3-margin-top w3-right-align">
                        <a href="#" class="w3-button w3-green w3-round-xxlarge" onclick="funcBtnEdit();">Edit</a>
                        <a href="#" class="w3-button w3-red w3-round-xxlarge" onclick="funcBtnDelete();">Delete</a>
                    </div>
                </form>
            </div>
        </div>

        <div class="w3-bar w3-xlarge w3-red">
            <a href="#" class="w3-bar-item w3-button w3-gray" style="padding-top: 14px; padding-bottom: 14px;" onclick="closePage();">
                <i class="fa fa-times-circle"></i></a>
            <span class="w3-bar-item">S9. LINK USER - PROFILE</span>
            <a href="#" class="w3-bar-item w3-button w3-right" style="padding-top: 14px; padding-bottom: 14px;" onclick="openSide250('idSideOpt')">
                <i class="fa fa-bars"></i></a>
        </div>

        <div class="w3-container ">
            <p/>
            <div class="w3-responsive">
                <table id="idTableMain" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID User</th>
                            <th>Nama User</th>
                            <th>ID Profile</th>
                            <th>Nama Profile</th>
                            <th>ID Lokasi</th>
                        </tr>
                    </thead>
                    <tbody id="idTableMainData"></tbody>
                </table>
            </div>
            <p/>
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
                    "ajax": 'do.php?navcmd=S9,TABLE'
                });

                $('#idTableMain tbody').on('click', 'tr', function () {
                    var data = varTable.row($(this)).data();
                    funcBtnEdit(data[5]);
                });
            }


            function funcDataView(iProdID) {
                varProdID = iProdID;

                $.getJSON("do.php?navcmd=S9,VIEW&id=" + iProdID, function (varRes) {
                    if (varRes.status) {
                        $("#idViewProd_id").text(varRes.data.user_id);
                        $("#idViewProd_name").text(varRes.data.profile_id);
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
                $("#idAddLoc_id").val('');
                $("#idAddLoc_name").val('');
                $("#idAddLoc_index").val('');
                $("#idAdd_BoxErr").addClass("w3-hide");
                openSide80('idSideDataAdd');
            }

            function funcBtnSave() {
                if (confirm("Apa anda akan menyimpan data ?")) {
                    $("#idAddNavCmd").val('S9,SAVE');
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

                $.getJSON("do.php?navcmd=S9,VIEW&id=" + iProdID, function (varRes) {
                    if (varRes.status) {
                        $("#idEdit_UserId").val(varRes.data.user_id);
                        $("#idEdit_ProfileId").val(varRes.data.profile_id);
                    }
                });
                openSide80('idSideDataEdit');
            }

            function funcBtnUpdate() {
                if (confirm("Apa anda akan mengupdate data ?")) {
                    $("#idEditNavCmd").val('S9,UPD');
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
                    $("#idEditNavCmd").val('S9,DEL');
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
            function closePage() {
                window.close();
            }
        </script>

    </body>

</html>