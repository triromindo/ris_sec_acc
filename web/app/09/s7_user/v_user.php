<html>

    <head>
        <title>System User</title>

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
                <span class="w3-bar-item">TAMBAH USER</span>
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
                            <th>ID User (Max 8 huruf, tanpa spasi)</th>
                            <td><input type="text" maxlength="8" class="w3-input w3-border w3-padding-small" name="iUserId" id="idAddUser_id" /></td>
                        </tr>
                        <tr>
                            <th>Login User (Max 12 huruf, tanpa spasi)</th>
                            <td><input type="text" maxlength="12" class="w3-input w3-border w3-padding-small" name="iUserLogin" id="idAddUser_login" /></td>
                        </tr>
                        <tr>
                            <th>Nama User (Nama lengkap)</th>
                            <td><input type="text" maxlength="25" class="w3-input w3-border w3-padding-small" name="iUserName" id="idAddUser_name" /></td>
                        </tr>
                        <tr>
                            <th>Password (Min 8 huruf. Max 16 huruf)</th>
                            <td><input type="password" maxlength="16" class="w3-input w3-border w3-padding-small" name="iUserPass_1" id="idAddPass_1" /></td>
                        </tr>
                        <tr>
                            <th>Ulangi Password</th>
                            <td><input type="password" maxlength="16" class="w3-input w3-border w3-padding-small" name="iUserPass_2" id="idAddPass_2" /></td>
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
                <span class="w3-bar-item">EDIT USER</span>
                <a href="#" class="w3-bar-item w3-button w3-right" style="padding-top: 14px; padding-bottom: 14px;" onclick="closeSide('idSideDataEdit')">
                    <i class="fa fa-times"></i></a>
            </div>
            <div class="w3-panel">
                <form action="do.php" id="frmMainEdit" method="post" autocomplete="off">
                    <input type="hidden" name="navcmd" id="idEditNavCmd" />
                    <input type="hidden" name="id" id="idEditId" />

                    <table class="w3-table-all">
                        <tr>
                            <th>ID User (Untuk Audit)</th>
                            <td id="idEditUser_id"></td>
                        </tr>
                        <tr>
                            <th>Login User (Untuk Login)</th>
                            <td id="idEditUser_login"></td>
                        </tr>
                        <tr>
                            <th>Nama User (Nama lengkap)</th>
                            <td><input type="text" class="w3-input w3-border w3-padding-small" name="iUserName" id="idEditUser_name" maxlength="25" /></td>
                        </tr>
                        <tr>
                            <th>Login Terakhir</th>
                            <td id="idEditUserLastLogin"></td>
                        </tr>
                        <tr>
                            <th>Status User</th>
                            <td id="idEditUserStatus"></td>
                        </tr>
                    </table>
                    <div class="w3-container w3-margin-top w3-right-align">
                        <a href="#" class="w3-button w3-green w3-round-xxlarge" id="idBtnUpdate" onclick="funcBtnUpdate();">Update</a>
                        <a href="#" class="w3-button w3-red w3-round-xxlarge" id="idBtnUnlock" onclick="funcBtnUnlock();">Buka Kunci</a>
                        <a href="#" class="w3-button w3-red w3-round-xxlarge" id="idBtnSuspend" onclick="funcBtnSupend();">Tangguhkan</a>
                        <a href="#" class="w3-button w3-red w3-round-xxlarge" id="idBtnOpenSuspend" onclick="funcBtnOpenSupend();">Kembalikan</a>
                        <a href="#" class="w3-button w3-red w3-round-xxlarge" id="idBtnDelete" onclick="funcBtnDelete();">Hapus</a>
                    </div>

                    <br>
                    <table class="w3-table-all">
                        <tr>
                            <th>Password (Min 8 huruf. Max 16 huruf)</th>
                            <td><input type="password" maxlength="16" class="w3-input w3-border w3-padding-small" name="iUserPass_1" id="idEditPass_1" /></td>
                        </tr>
                        <tr>
                            <th>Ulangi Password</th>
                            <td><input type="password" maxlength="16" class="w3-input w3-border w3-padding-small" name="iUserPass_2" id="idEditPass_2" /></td>
                        </tr>
                    </table>
                    <div class="w3-container w3-margin-top w3-right-align">
                        <a href="#" class="w3-button w3-red w3-round-xxlarge" id="idBtnReset" onclick="funcBtnResetPass();">Reset Password</a>
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
            <span class="w3-bar-item">S7. DAFTAR USER</span>
            <a href="#" class="w3-bar-item w3-button w3-right" style="padding-top: 14px; padding-bottom: 14px;" onclick="openSide250('idSideOpt')">
                <i class="fa fa-bars"></i></a>
        </div>
        
        <div class="w3-container ">
            <p>
            <div class="w3-responsive">
                <table id="idTableMain" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID User</th>
                            <th>Login User</th>
                            <th>Nama User</th>
                            <th>Login Terakhir</th>
                            <th>Status User</th>
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
                "ajax": 'do.php?navcmd=S7,TABLE'
            });

            $('#idTableMain tbody').on('click', 'tr', function () {
                var data = varTable.row($(this)).data();
                funcBtnEdit(data[0]);
            });
        }


        function funcDataView(iProdID) {
            varProdID = iProdID;

            $.getJSON("do.php?navcmd=S7,VIEW&id=" + iProdID, function (varRes) {
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
            $("#idAddUser_id").val('');
            $("#idAddUser_login").val('');
            $("#idAddUser_name").val('');
            $("#idAddPass_1").val('');
            $("#idAddPass_2").val('');
            $("#idAdd_BoxErr").addClass("w3-hide");
            openSide80('idSideDataAdd');
        }

        function funcBtnSave() {
            if (confirm("Apa anda akan menyimpan data ?")) {
                if ($("#idAddPass_1").val() == $("#idAddPass_2").val()) {

                    $("#idAddNavCmd").val('S7,SAVE');
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
                    $("#idAdd_BoxErrMessage").text('Password tidak sama');
                    $("#idAdd_BoxErr").removeClass("w3-hide");
                }


            } else {
                alert("Hapus data dibatalkan");
            }
        }

        function funcBtnEdit(iProdID) {
            varProdID = iProdID;

            $.getJSON("do.php?navcmd=S7,VIEW&id=" + iProdID, function (varRes) {
                if (varRes.status) {
                    $("#idEditUser_id").text(varRes.data.user_id);
                    $("#idEditUser_login").text(varRes.data.user_login);
                    $("#idEditUser_name").val(varRes.data.user_name);
                    $("#idEditUserLastLogin").text(varRes.data.user_lastlogin);
                    $("#idEditUserStatus").text(varRes.data.user_status);

                    $("#idEditPass_1").val('');
                    $("#idEditPass_2").val('');

                    if (varRes.data.user_is_locked == 1) {
                        $("#idBtnUnlock").show();
                    } else {
                        $("#idBtnUnlock").hide();
                    }
                    if (varRes.data.user_is_suspend == 1) {
                        $("#idBtnSuspend").hide();
                        $("#idBtnOpenSuspend").show();
                    } else {
                        $("#idBtnSuspend").show();
                        $("#idBtnOpenSuspend").hide();
                    }
                    if (varRes.data.user_is_deleted == 1) {
                        $("#idBtnDelete").hide();
                        $("#idBtnUpdate").hide();
                        $("#idBtnReset").hide();

                        $("#idBtnUnlock").hide();
                        $("#idBtnSuspend").hide();
                        $("#idBtnOpenSuspend").hide();
                    } else {
                        $("#idBtnDelete").show();
                        $("#idBtnUpdate").show();
                        $("#idBtnReset").show();
                    }
                }
            });
            openSide80('idSideDataEdit');
        }

        function funcBtnUpdate() {
            if (confirm("Apa anda akan mengupdate data ?")) {
                $("#idEditNavCmd").val('S7,UPD');
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

        function funcBtnUnlock() {
            if (confirm("Apa anda akan BUKA KUNCI user ?")) {
                $("#idEditNavCmd").val('S7,UNLOCK');
                $("#idEditId").val(varProdID);
                $.ajax({
                    data: $('#frmMainEdit').serialize(),
                    method: "POST",
                    url: "do.php",
                    dataType: "json",
                    success: function (data) {
                        console.log(data);

                        if (data.status) {
                            alert("User DIBUKA (Unlock).");
                            funcRefreshTable();
                        } else {
                            alert("User gagal dibuka. Cek IT");
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

        function funcBtnResetPass() {
            if (confirm("Apa anda akan GANTI PASSWORD user ?")) {
                $("#idEditNavCmd").val('S7,PASS');
                $("#idEditId").val(varProdID);
                $.ajax({
                    data: $('#frmMainEdit').serialize(),
                    method: "POST",
                    url: "do.php",
                    dataType: "json",
                    success: function (data) {
                        console.log(data);

                        if (data.status) {
                            alert("User GANTI PASSWORD.");
                            funcRefreshTable();
                        } else {
                            alert("User gagal dibuka. Cek IT");
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

        function funcBtnSupend() {
            if (confirm("Apa anda akan TANGGUHKAN user ?")) {
                $("#idEditNavCmd").val('S7,SUSPEND');
                $("#idEditId").val(varProdID);
                $.ajax({
                    data: $('#frmMainEdit').serialize(),
                    method: "POST",
                    url: "do.php",
                    dataType: "json",
                    success: function (data) {
                        console.log(data);

                        if (data.status) {
                            alert("User TANGGUHKAN (Suspend).");
                            funcRefreshTable();
                        } else {
                            alert("User gagal dibuka. Cek IT");
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

        function funcBtnOpenSupend() {
            if (confirm("Apa anda akan KEMBALIKAN user ?")) {
                $("#idEditNavCmd").val('S7,OPEN_SUSPEND');
                $("#idEditId").val(varProdID);
                $.ajax({
                    data: $('#frmMainEdit').serialize(),
                    method: "POST",
                    url: "do.php",
                    dataType: "json",
                    success: function (data) {
                        console.log(data);

                        if (data.status) {
                            alert("User KEMBALIKAN (Open Suspend).");
                            funcRefreshTable();
                        } else {
                            alert("User gagal dibuka. Cek IT");
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

        function funcBtnDelete() {
            if (confirm("Apa anda akan menghapus data ?")) {
                $("#idEditNavCmd").val('S7,DEL');
                $("#idEditId").val(varProdID);
                $.ajax({
                    data: $('#frmMainEdit').serialize(),
                    method: "POST",
                    url: "do.php",
                    dataType: "json",
                    success: function (data) {
                        console.log(data);

                        if (data.status) {
                            alert("Data dihapus. Status = DIHAPUS");
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