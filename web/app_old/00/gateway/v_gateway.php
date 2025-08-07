<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>GATEWAY</title>
        <link rel="shortcut icon" href="../../img/romindo.gif">
        <link rel="stylesheet" href="../../lib/w3/w3.css">
        <link rel="stylesheet" href="../../lib/fa/css/all.css">
        <script src="../../lib/jquery/jquery-3.4.1.min.js"></script>
    </head>

    <body class="w3-pale-red">
        <div class="w3-top">
            <div class="w3-bar w3-xlarge w3-red">
                <a href="#" class="w3-bar-item w3-button w3-gray" style="padding-top: 14px; padding-bottom: 14px;" id="btnLogout">
                    <i class="fa fa-sign-out-alt"></i></a>
                <span class="w3-bar-item">Gateway - SECURITY</span>
            </div>
        </div>
        <br>
        <br>
        <div class="w3-row">
            <div class="w3-col w3-panel s12 m4 l3">
                <table class="w3-table w3-border w3-bordered w3-white">
                    <tr>
                        <th colspan="2" class="w3-amber"><i class="fa fa-id-badge"></i> Data User</th>
                    </tr>

                    <?php
                    $tmpName = $PAGE['gateway_user_data']['user_name'];
                    $tmpLastTime = $PAGE['gateway_user_data']['last_time'];
                    $tmpLastIP = $PAGE['gateway_user_data']['last_ip'];
                    $tmpCurrIP = $PAGE['gateway_user_data']['curr_ip'];
                    ?>

                    <tr>
                        <th width="100px">Login</th>
                    </tr>
                    <tr>
                        <td class="w3-right-align"><?php echo $tmpName; ?></td>
                    </tr>
                    <tr>
                        <th>Login Terakhir</th>
                    </tr>
                    <tr>
                        <td class="w3-right-align"><?php echo $tmpLastTime; ?></td>
                    </tr>
                    <tr>
                        <th>IP Terakhir</th>
                    </tr>
                    <tr>
                        <td class="w3-right-align"><?php echo $tmpLastIP; ?></td>
                    </tr>
                    <tr>
                        <th>IP Sekarang</th>
                    </tr>
                    <tr>
                        <td class="w3-right-align"><?php echo $tmpCurrIP; ?></td>
                    </tr>
                </table>
            </div>

            <div class="w3-col w3-panel s12 m8 l9">
                <div class="w3-bar w3-gray">
                    <button onclick="myFunction('cmdLog')" class="w3-bar-item w3-button w3-red">
                        <i class="fab fa-windows"></i> Keamanan </button>
                </div>
                <div id="cmdLog" class="w3-hide w3-border w3-container w3-white">
                    <button onclick="myFunction('Demo1')" class="w3-button w3-block w3-left-align w3-light-green w3-margin-top">
                        <i class="fa fa-users"></i> Sistem</button>

                    <div id="Demo1" class="w3-hide">
                        <table class="w3-table-all w3-hoverable">
                            <tr onclick="openModule('SEC', 'S1')">
                                <th>S1. Daftar Location</th>
                            </tr>
                            <tr onclick="openModule('SEC', 'S2')">
                                <th>S2. Daftar Area</th>
                            </tr>
                            <tr onclick="openModule('SEC', 'S3')">
                                <th>S3. Daftar Rayon</th>
                            </tr>
                            <tr onclick="openModule('SEC', 'S4')">
                                <th>S4. Daftar Aplikasi</th>
                            </tr>
                            <tr onclick="openModule('SEC', 'S5')">
                                <th>S5. Daftar Modul Aplikasi</th>
                            </tr>
                            <tr onclick="openModule('SEC', 'S6')">
                                <th>S6. Daftar Grup Produk</th>
                            </tr>
                            <tr onclick="openModule('SEC', 'S7')">
                                <th>S7. Daftar User</th>
                            </tr>
                            <tr onclick="openModule('SEC', 'S8')">
                                <th>S8. Daftar Profile</th>
                            </tr>
                            <tr onclick="openModule('SEC', 'S9')">
                                <th>S9. Link User dan Profile</th>
                            </tr>
                            <tr onclick="openModule('SEC', 'S10')">
                                <th>S10. Log Aktivitas SysAdmin</th>
                            </tr>
                            <tr onclick="openModule('SEC', 'S11')">
                                <th>S11. Log Aktivitas RIS Sales</th>
                            </tr>
                        </table>
                    </div>

                    <p>
                </div>
            </div>
        </div>
    </div>
    <form action="do.php" method="post" id="frmMain">
        <input type="hidden" name="navcmd" id="navcmd" />
    </form>

    <script>
        function myFunction(id) {
            var x = document.getElementById(id);
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }
    </script>

    <script>
        $(document).ready(function () {

            $("#btnLogout").click(function () {
                funcCloseAllWindows();
                $("#navcmd").val('GATEWAY,LOGOUT');
                $("#frmMain").submit();
            });
        });

        var varOpenWindow = [];

        function funcCloseAllWindows() {
            varOpenWindow.forEach(function (item, index) {
                item.close();
            });
        }

        function openModule(iApp, iMod) {
            x = window.open('do.php?navcmd=GATEWAY,JUMP_APP&app=' + iApp + '&mod=' + iMod);
            varOpenWindow.push(x);
        }
    </script>

</body>
</html>