<html>

    <head>
        <title>System Produk Grup</title>

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
                <span class="w3-bar-item">TAMBAH PRODUK GRUP</span>
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
                            <th>ID Produk Grup</th>
                            <td><input type="text" class="w3-input w3-border w3-padding-small" name="iProdGrpId" id="idAddProdGrp_id" maxlength="3" /></td>
                        </tr>
                        <tr>
                            <th>Nama Produk Grup</th>
                            <td><input type="text" class="w3-input w3-border w3-padding-small" name="iProdGrpName" id="idAddProdGrp_name" maxlength="25" /></td>
                        </tr>
                        <tr>
                            <th>Index Produk Grup</th>
                            <td><input type="text" class="w3-input w3-border w3-padding-small" name="iProdGrpIndex" id="idAddProdGrp_index" maxlength="3" /></td>
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
                <span class="w3-bar-item">EDIT PRODUK GRUP</span>
                <a href="#" class="w3-bar-item w3-button w3-right" style="padding-top: 14px; padding-bottom: 14px;" onclick="closeSide('idSideDataEdit')">
                    <i class="fa fa-times"></i></a>
            </div>
            <div class="w3-panel">
                <form action="do.php" id="frmMainEdit" method="post" autocomplete="off">
                    <input type="hidden" name="navcmd" id="idEditNavCmd" />
                    <input type="hidden" name="id" id="idEditId" />

                    <table class="w3-table-all">
                        <tr>
                            <th>ID Produk Grup</th>
                            <td id="idEditProdGrp_id"></td>
                        </tr>
                        <tr>
                            <th>Nama Produk Grup</th>
                            <td><input type="text" class="w3-input w3-border w3-padding-small" name="iProdGrpName" id="idEditProdGrp_name" maxlength="25" /></td>
                        </tr>
                        <tr>
                            <th>Index Produk Grup</th>
                            <td><input type="text" class="w3-input w3-border w3-padding-small" name="iProdGrpIndex" id="idEditProdGrp_index" maxlength="3" /></td>
                        </tr>
                    </table>
                    <div class="w3-container w3-margin-top w3-right-align">
                        <a href="#" class="w3-button w3-green w3-round-xxlarge" onclick="funcBtnUpdate();">Update</a>
                        <a href="#" class="w3-button w3-red w3-round-xxlarge" onclick="funcBtnDelete();">Delete</a>
                    </div>
                </form>
            </div>
        </div>

        <div class="w3-bar w3-xlarge w3-red">
            <a href="#" class="w3-bar-item w3-button w3-gray" style="padding-top: 14px; padding-bottom: 14px;" onclick="closePage();">
                <i class="fa fa-times-circle"></i></a>
            <span class="w3-bar-item">S6. DAFTAR PRODUK GRUP</span>
            <a href="#" class="w3-bar-item w3-button w3-right" style="padding-top: 14px; padding-bottom: 14px;" onclick="openSide250('idSideOpt')">
                <i class="fa fa-bars"></i></a>
        </div>
        
        <div class="w3-container ">
            <p>
            <div class="w3-responsive">
                <table id="idTableMain" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID Produk Grup</th>
                            <th>Nama Produk Grup</th>
                            <th>Index Produk Grup</th>
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
                "ajax": 'do.php?navcmd=S6,TABLE',
                "bSort": false
            });

            $('#idTableMain tbody').on('click', 'tr', function () {
                var data = varTable.row($(this)).data();
                funcBtnEdit(data[0]);
            });
        }


        function funcBtnAdd() {
            $("#idAddProdGrp_id").val('');
            $("#idAddProdGrp_name").val('');
            $("#idAddProdGrp_index").val('');
            $("#idAdd_BoxErr").addClass("w3-hide");
            openSide80('idSideDataAdd');
        }

        function funcBtnSave() {
            if (confirm("Apa anda akan menyimpan data ?")) {
                $("#idAddNavCmd").val('S6,SAVE');
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

            $.getJSON("do.php?navcmd=S6,VIEW&id=" + iProdID, function (varRes) {
                if (varRes.status) {
                    $("#idEditProdGrp_id").text(varRes.data.prodgrp_id);
                    $("#idEditProdGrp_name").val(varRes.data.prodgrp_name);
                    $("#idEditProdGrp_index").val(varRes.data.prodgrp_index);
                }
            });
            openSide80('idSideDataEdit');
        }

        function funcBtnUpdate() {
            if (confirm("Apa anda akan mengupdate data ?")) {
                $("#idEditNavCmd").val('S6,UPD');
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
                $("#idEditNavCmd").val('S6,DEL');
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