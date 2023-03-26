<?php

    // Database
    include("config/config.php");

    /*
    // Check
    // =============================
    {
        // ID
        // --------------------------
        if (!isset($_GET['id']))
        {
            // redirect
            //header("Location: areaadd.php?info");
            //exit();
        }
    }
    */

    // Fetch
    // =============================
    {
        // Fetch Cabinet
        // --------------------------
        {
            $rowCabinet = array();
            $sql = "select * from device_tbl";
            $rsCabinet = mysqli_query($connection, $sql);
            $rsCabinetRowCount = mysqli_num_rows($rsCabinet);
            if ($rsCabinetRowCount > 0)
            {
                while ($rowsCabinet = mysqli_fetch_object($rsCabinet))
                {
                    $rowCabinet[] = $rowsCabinet;
                }
            }
            else
            {
                // redirect
                //header("Location: cabinetlist.php");
                //exit();
            }
        }

        /*
        // Fetch Area
        // --------------------------
        {
            $rowArea = array();
            $sql = "select * from area_tbl";
            $rsArea = mysqli_query($connection, $sql);
            $rsAreaRowCount = mysqli_num_rows($rsArea);
            if ($rsAreaRowCount > 0)
            {
                while ($rowsArea = mysqli_fetch_object($rsArea))
                {
                    $rowArea[] = $rowsArea;
                }
            }
            else
            {
                // redirect
                header("Location: areaadd.php?info");
                exit();
            }
        }
        */
    }
?>

<!DOCTYPE html>
<html lang=en>
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
        <div id=wrapper class="wrapper animsition">

            <!-- Menu Header -->
            <nav class="navbar navbar-fixed-top" role=navigation>
                <div class=navbar-header>
                    <button type=button class=navbar-toggle data-toggle=collapse data-target=.navbar-collapse>
                        <span class=sr-only>Toggle navigation</span>
                        <i class=material-icons>apps</i>
                    </button>
                    <a class=navbar-brand href="#">
                        <img class=main-logo src="assets/images/logo2.png" alt="">
                    </a>
                </div>
                <div class=nav-container>

                    <!-- Menu Header [Left] -->
                    <ul class="nav navbar-nav hidden-xs">
                        <li><a id=fullscreen href="#"><i class=material-icons>fullscreen</i> </a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle material-ripple" data-toggle=dropdown>Welcome Back! <span id="userFname"></span></a>
                        </li>
                    </ul>

                    <!-- Menu Header [Right] -->
                    <ul class="nav navbar-top-links navbar-right">
                        
                    </ul>
                </div>
            </nav>

            <!-- Menu Side -->
            <div class=sidebar role=navigation>
                <div class="sidebar-nav navbar-collapse">
                    <ul class=nav id=side-menu>
                        <li class="nav-heading "> <span>Main Navigation</span></li>
                        <li class=active><a href=dashboard.php class=material-ripple><i class=material-icons>home</i> Dashboard</a></li>
                        <li>
                            <a href="#" class="material-ripple"><i class="material-icons">domain</i> Device Manager<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="adminroomadd.php">Add Device</a></li>
                                <li><a href="adminroomlist.php">Device List</a></li>
                            </ul>
                        </li>
                        <li id="isadmin">
                            <a href="#" class="material-ripple"><i class="material-icons">domain</i> User Manager<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="adminuseradd.php">Add User</a></li>
                                <li><a href="adminuserlist.php">User List</a></li>
                            </ul>
                        </li>
                        <li><a href="#" class=material-ripple id="uLogout"><i class=material-icons>domain</i> Logout</a></li>
                        
                    </ul>
                </div>
            </div>
            <div class=control-sidebar-bg></div>

            <!-- Main Content -->
            <div id=page-wrapper>
                <div class=content>
                    <div class=content-header>
                        <div class=header-icon>
                            <i class=pe-7s-display1></i>
                        </div>
                        <div class=header-title>
                            <h1>Web App Monitoring</h1>
                            <small>Navigate left menu to view or modify app content</small>
                            <ol class=breadcrumb>
                                <li class=active><a href=dashboard.php><i class=pe-7s-home></i> Home</a></li>
                            </ol>
                        </div>
                    </div>

                    <div class=row>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class=row>

                                <?php

                                    // Load Cabinets
                                    foreach ($rowCabinet as $deviceData)
                                    {
                                ?>

                                    <div class="col-lg-3">
                                        <div id="cPanelDev<?php echo $deviceData->id; ?>" class="panel panel-bd" style="border-radius: 50px;">
                                            <div class=panel-heading style="border-radius: 50px;">
                                                <div class=panel-title style="padding: 20px;">
                                                    <a href="adminroomview.php?id=<?php echo $deviceData->id; ?>">
                                                    <center>
                                                        <img src="assets/images/cabinet/img-device.png" width="75px" height="75px" /> <br>
                                                        <h1 style="font-size: 21px !important;"><span id="cPanelDevName<?php echo $deviceData->id; ?>"><?php echo $deviceData->dev_name; ?></span></h1>
                                                        <br>
                                                        <h1 style="font-size: 16px !important;">Temperature: <b><span id="cPanelDevTemp<?php echo $deviceData->id; ?>"><?php echo $deviceData->dev_temp; ?></span> °c</b></h1>
                                                        <br>
                                                        <h1 style="font-size: 16px !important;">Humidity: <b><span id="cPanelDevHumi<?php echo $deviceData->id; ?>"><?php echo $deviceData->dev_humi; ?></span> %</b></h1>
                                                    </center>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                <?php
                                    }
                                ?>

                            </div>
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
                $('[data-toggle="tooltip"]').tooltip({trigger: 'manual'}).tooltip('show');
                $(".progress-animated").each(function () {
                    each_bar_width = $(this).attr('aria-valuenow');
                    $(this).width(each_bar_width + '%');
                });     
            });

            
            // Loop
            // ===========================
            setInterval(function() {
                // Load Data
                $.ajax({
                    type: "POST",
                    url: "server/api.php?mode=devviewlist",
                    data: {
                        "did": "<?php echo $_GET['id']; ?>",
                    },
                    success: function(data) {
                        // result
                        const result = JSON.parse(data);

                        // check
                        if (result.status == "ok")
                        {
                            // display
                            for (const item of result.data) 
                            {
                                // panel
                                var check = 0;
                                if (parseFloat(item.dev_temp_max) > parseFloat(item.dev_temp) && parseFloat(item.dev_temp_min) < parseFloat(item.dev_temp))
                                {
                                    check++;
                                }
                                if (parseFloat(item.dev_humi_max) > parseFloat(item.dev_humi) && parseFloat(item.dev_humi_min) < parseFloat(item.dev_humi))
                                {
                                    check++;
                                }
                                if (check >= 2)
                                {
                                    $('#cPanelDev' + item.id).removeClass("panel-bd panel-danger panel-success").addClass("panel-success");
                                }
                                else
                                {
                                    $('#cPanelDev' + item.id).removeClass("panel-bd panel-danger panel-success").addClass("panel-danger");
                                }

                                // value
                                $('#cPanelDevName' + item.id).text(item.dev_name);
                                $('#cPanelDevTemp' + item.id).text(item.dev_temp);
                                $('#cPanelDevHumi' + item.id).text(item.dev_humi);
                            }
                            
                            /*
                            

                            // input
                            $('#rName').val(result.data.dev_name);
                            $('#rTempHigh').val(result.data.dev_temp_max);
                            $('#rTempLow').val(result.data.dev_temp_min);
                            $('#rHumiHigh').val(result.data.dev_humi_max);
                            $('#rHumiLow').val(result.data.dev_humi_min);
                            */
                        }
                        else
                        {
                            window.location.href = "adminroomlist.php";
                        }
                    },
                    error: function(data) {
                        window.location.href = "adminroomlist.php";
                    }
                });
            }, 1000);


            // Function
            // ===========================
            // Load User
            $.ajax({
                type: "POST",
                url: "server/api.php?mode=userverifytoken",
                data: {
                    "utoken": localStorage.getItem("tokenId"),
                },
                success: function(data) {
                    // result
                    const result = JSON.parse(data);

                    // check
                    if (result.status == "ok")
                    {
                        // display
                        $('#userFname').text(result.data.user_fname.toUpperCase());

                        // check admin
                        if (result.data.user_access == "0")
                        {
                            $("#isadmin").hide();
                            //window.location.href = "dashboard.php";
                        }
                    }
                    else
                    {
                        window.location.href = "login.php";
                    }
                },
                error: function(data) {
                    window.location.href = "login.php";
                }
            });

            // Logout User
            $('#uLogout').click(function(e) {
                localStorage.setItem("tokenId", "");
                window.location.href = "login.php";
            });
        </script>
    </body>
</html>
