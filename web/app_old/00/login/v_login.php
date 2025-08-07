<html>
    <head>
        <title>Login</title>
        <link rel="shortcut icon" href="../../img/romindo.gif">
        <link rel="stylesheet" href="../../lib/w3/w3.css"> 
        <link rel="stylesheet" href="../../lib/fa/css/all.css">
        <script src="../../lib/w3/w3.js"></script>
        <script src="../../lib/jquery/jquery-3.4.1.min.js"></script>
    </head>

    <body class="w3-pale-red">
        <div class="w3-bar w3-xlarge w3-red">
            <span class="w3-bar-item">Romindo Intranet System - SECURITY</span>
        </div>

        <div id="idPage_errorBox" class="w3-container w3-hide">
            <div class="w3-panel w3-pale-red w3-leftbar w3-border-red">
                <p id="idPage_errorBox_message">
                    Login failed
                </p>
            </div>
        </div>
        <p>
        <form action="do.php" id="frmMain" method="post" autocomplete="off">
            <div class="w3-auto">
                <div class="w3-content w3-white" style="max-width:400px">
                    <div class="w3-container w3-orange"><p><b>LOGIN</b></p></div>
                    <div class="w3-border w3-padding">
                        <label>Name</label>
                        <input type="text" id="iUser" name="iUser" class="w3-input w3-border w3-padding-small" autofocus="autofocus" />
                        <label>Password</label>
                        <input type="password" id="iPass" name="iPass" class="w3-input w3-border w3-padding-small" />
                        <p/>
                        <button id="idBtnLogin" class="w3-button w3-green w3-block w3-round-xxlarge">Login</button>
                        <input type="hidden" name="navcmd" id="navcmd" />
                    </div>
                </div>
            </div>
        </form>
        <script>
            $(document).ready(function () {
                //  Display
<?php
if ($PAGE['body_message']['show']) {
    ?>
                    $("#idPage_errorBox_message").text("<?php echo $PAGE['body_message']['message']; ?>");
                    $("#idPage_errorBox").removeClass("w3-hide");
    <?php
}
?>


                //  Button action
                $("#idBtnLogin").click(function (event) {
                    if (($("#iUser").val().length > 0)
                            && ($("#iPass").val().length > 0)) {
                        $("#navcmd").val('LOGIN,LOGIN');
                        $("#frmMain").submit();
                    } else {
                        $("#idPage_errorBox_message").text("User dan Password harus terisi");
                        $("#idPage_errorBox").removeClass("w3-hide");

                        event.preventDefault();
                    }
                });
            });

        </script>

    </body>

</html>