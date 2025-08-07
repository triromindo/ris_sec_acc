<html>

    <head>
        <title>System Aplikasi</title>

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
                <a href="#" class="w3-button w3-block w3-green w3-margin-bottom w3-round-xxlarge" onclick="funcBtnUpload()"><i class="fas fa-plus-circle"></i> Upload CSV</a>
            </div>
        </div>

        <div id="idSideDataView" class="rom-side-data w3-pale-blue ">
            <input type="hidden" name="navCmd" id="idViewNavCmd" />
            <div class="w3-bar w3-xlarge w3-blue-grey ">
                <span class="w3-bar-item">Aplikasi</span>
                <a href="#" class="w3-bar-item w3-button w3-right" style="padding-top: 14px; padding-bottom: 14px;" onclick="closeSide('idSideDataView')">
                    <i class="fa fa-times"></i></a>
            </div>
            <div class="w3-panel">
                <form>
                    <table class="w3-table-all">
                        <tr>
                            <th>ID Aplikasi</th>
                            <td id="idView_id"></td>
                        </tr>

                        <tr>
                            <th>Nama Aplikasi</th>
                            <td id="idView_name"></td>
                        </tr>

                        <tr>
                            <th>Index Aplikasi</th>
                            <td id="idView_index"></td>
                        </tr>

                        <tr>
                            <th>Versi</th>
                            <td id="idView_ver"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>

        <div class="w3-bar w3-xlarge w3-red">
            <a href="#" class="w3-bar-item w3-button w3-gray" style="padding-top: 14px; padding-bottom: 14px;" onclick="closePage();">
                <i class="fa fa-times-circle"></i></a>
            <span class="w3-bar-item">S4. DAFTAR APLIKASI</span>
            <a href="#" class="w3-bar-item w3-button w3-right" style="padding-top: 14px; padding-bottom: 14px;" onclick="openSide250('idSideOpt')">
                <i class="fa fa-bars"></i></a>
        </div>
        
        <div class="w3-container ">
            <p>
            <div class="w3-responsive">
                <table id="idTableMain" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID Aplikasi</th>
                            <th>Nama Aplikasi</th>
                            <th>Index Aplikasi</th>
                            <th>Versi Aplikasi</th>
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

        });

        var varProdID = '';
        var varTable = null;

        function funcTableLoad() {
            varTable = $('#idTableMain').DataTable({
                "ajax": 'do.php?navcmd=<?php echo $PAGE['ID']; ?>,TABLE',
                "bSort": false
            });

            $('#idTableMain tbody').on('click', 'tr', function () {
                var data = varTable.row($(this)).data();
                funcDataView(data[0]);
            });
        }


        function funcDataView(iProdID) {
            varProdID = iProdID;

            $.getJSON("do.php?navcmd=<?php echo $PAGE['ID']; ?>,VIEW&id=" + iProdID, function (varRes) {
                if (varRes.status) {
                    $("#idView_id").text(varRes.data.id);
                    $("#idView_name").text(varRes.data.name);
                    $("#idView_index").text(varRes.data.index);
                    $("#idView_ver").text(varRes.data.ver);
                }
            });
            openSide80('idSideDataView');
        }

        function funcRefreshTable() {
            varTable.ajax.reload();
        }

        function openSide250(side_item) {
            closeSide('idSideOpt');
            closeSide('idSideDataView');
            document.getElementById(side_item).style.width = "250px";
        }
        function openSide80(side_item) {
            closeSide('idSideOpt');
            closeSide('idSideDataView');
            document.getElementById(side_item).style.width = "80%";
        }
        function closeSide(side_item) {
            document.getElementById(side_item).style.width = "0";
        }
        function closePage() {
            window.close();
        }
        
            function funcBtnUpload() {
                tmpQuery = 'do.php?navcmd=<?php echo $PAGE['ID']; ?>,UPLOAD';
                window.open(tmpQuery);
            }
    </script>

</body>

</html>