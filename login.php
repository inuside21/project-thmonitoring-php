<?php

    // Database
    include("config/config.php");

    $getData = new stdClass();
    $sql="select * from device_tbl"; 
    $rsgetacc=mysqli_query($connection,$sql);
    while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
    {
        $getData = $rowsgetacc;
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset=utf-8>
        <meta http-equiv=X-UA-Compatible content="IE=edge">
        <meta name=viewport content="width=device-width, initial-scale=1">
        <meta name=description content="">
        <meta name=author content="">
        <title><?php echo $contentPageTitle; ?></title>
        <?php
            // ================
            // CSS
            // ================ 
            echo $contentPageCSS; 
        ?>
    </head>
    <body>
        <!-- Content Wrapper -->
        <div class="login-wrapper">
            <div class="container-center">
                <div class="panel panel-bd">
                    <div class="panel-heading">
                        <div class="view-header" style="margin-bottom: 10px;">
                            <div class="header-icon">
                                <i class="pe-7s-unlock"></i>
                            </div>
                            <div class="header-title">
                                <h3>Login</h3> <br>
                                <small><strong>Please enter your credentials to update.</strong></small>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form id="fInfo" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="control-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    <input id="pass" type="password" class="form-control" name="upword" placeholder="******" value="">
                                </div>
                                <span class="help-block small">Your password to modify this device</span>
                            </div>
                            <div style="height: 50px;">
                                <button class="btn btn-primary btn-block pull-right" type="button" id="fSubmit" name="fSubmit">Login</button>
                            </div>
                        </form>

                        <div style="margin-top: 10px; margin-left: auto; margin-right: auto; display: flex; justify-content: space-around;">
                            <button class="btn btn-success" style="width: 18%" type="button" id="" name="fSubmit" onclick="DisplayPressNum(1)">1</button>
                            <button class="btn btn-success" style="width: 18%" type="button" id="" name="fSubmit" onclick="DisplayPressNum(2)">2</button>
                            <button class="btn btn-success" style="width: 18%" type="button" id="" name="fSubmit" onclick="DisplayPressNum(3)">3</button>
                            <button class="btn btn-success" style="width: 18%" type="button" id="" name="fSubmit" onclick="DisplayPressNum(4)">4</button>
                            <button class="btn btn-success" style="width: 18%" type="button" id="" name="fSubmit" onclick="DisplayPressNum(5)">5</button>
                        </div>
                        <div style="margin-top: 10px; margin-left: auto; margin-right: auto; display: flex; justify-content: space-around;">
                            <button class="btn btn-success" style="width: 18%" type="button" id="" name="fSubmit" onclick="DisplayPressNum(6)">6</button>
                            <button class="btn btn-success" style="width: 18%" type="button" id="" name="fSubmit" onclick="DisplayPressNum(7)">7</button>
                            <button class="btn btn-success" style="width: 18%" type="button" id="" name="fSubmit" onclick="DisplayPressNum(8)">8</button>
                            <button class="btn btn-success" style="width: 18%" type="button" id="" name="fSubmit" onclick="DisplayPressNum(9)">9</button>
                            <button class="btn btn-success" style="width: 18%" type="button" id="" name="fSubmit" onclick="DisplayPressNum(0)">0</button>
                        </div>

                        <div style="margin-top: 10px; margin-left: auto; margin-right: auto; display: flex; justify-content: space-around;">
                            <button class="btn btn-danger" style="width: 30%" type="button" id="" name="fSubmit" onclick="DisplayBack()">BACK</button>
                            <button class="btn btn-success" style="width: 30%" type="button" id="" name="fSubmit" onclick="DisplayClear()">CLEAR</button>
                            <button class="btn btn-success" style="width: 30%" type="button" id="" name="fSubmit" onclick="DisplayErase()">ERASE</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <?php
            // ================
            // JS
            // ================
            echo $contentPageJS; 
        ?>

        <script>
            $(document).ready(function(){
                // Load
                document.body.style.zoom = "150%";
                localStorage.setItem("tokenId", "");
                $('#cArea').select2();
                LoadForm();

                // Press - Submit
                $('#fSubmit').click(function(e) {
                    
                    if (devicePassword == "<?php echo $getData->dev_pass; ?>")
                    {
                        $.ajax({
                            type: "POST",
                            url: "server/api.php?mode=devpass",
                            data: {
                            },
                            success: function(data) {
                                // result
                                const result = JSON.parse(data);

                                // check
                                if (result.status == "ok")
                                {
                                    localStorage.setItem("tokenId", devicePassword);
                                    window.location.href = "dashboard.php";
                                }
                                else
                                {
                                    console.log("Error." . result.message);
                                }
                            },
                            error: function(data) {
                                console.log("Critical Error ajax");
                            }
                        }); 
                    }
                    else
                    {
                        alert("Wrong Password.");
                    }
                });
            });


            // Variables
            // ===================
            var devicePassword = "";


            // Start
            // ===================

            
            // Loop
            // ===================
            // Load DUT Data
            setInterval(() => {
                DisplayUpdate();
            }, 1000);


            // Function
            // -------------------------
            // Load Form
            function LoadForm()
            {
                $('#fInfo')[0].reset();
            }

            function DisplayUpdate()
            {
                $('#pass').val(devicePassword);
            }

            function DisplayBack()
            {
                window.location.href = "dashboard.php";
            }

            function DisplayClear()
            {
                devicePassword = "";
            }

            function DisplayErase()
            {
                devicePassword = devicePassword.slice(0, -1);
            }

            function DisplayPressNum(num)
            {
                devicePassword += num.toString();
            }
        </script>
    </body>
</html>