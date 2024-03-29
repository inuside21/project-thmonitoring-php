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
    <body style="overflow: hidden;">
        <div id=wrapper class="wrapper animsition">

            <!-- main header -->
            <header class="main-header">
                <!-- top navigation -->
                <nav class="navbar top-nav" style="height: 80px;">
                    <div class="container">
                        <div class="navbar-header hidden-xs">
                            <a class="navbar-brand" href="index.html"> <img class=main-logo src="assets/images/logo2.png" alt="" style="height: 63px;"> </a>
                        </div>
                        <!-- Start Atribute Navigation -->
                        <div class="attr-nav">
                            <h1 style="color: white;">Web-Based Monitoring</h1>
                        </div>
                        <!-- End Atribute Navigation -->
                        <!-- /.navbar-header -->
                        <div class="nav navbar-top-links navbar-right" style="padding-top: 25px;">
                            <h2 style="color: silver; display: inline;">
                                <span id="datenow">2023-01-13 11:59:59</span>
                            </h2>
                            <img id="wifinow" src="assets/images/wifi-on.png" width="40" height="40" style="margin-left: 30px;">
                        </div> <!-- /.navbar-top-links -->
                    </div> <!-- /. container -->
                </nav> <!-- /. top navigation -->
                <!--  main navigation -->
                <nav class="navbar navbar-default navbar-mobile navbar-sticky bootsnav" style="background-color: red;">
                    <!-- Start Top Search -->
                    <div class="top-search">
                        <div class="container">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="ti-search"></i></span>
                                <input type="text" class="form-control" placeholder="Search">
                                <span class="input-group-addon close-search"><i class="ti-close"></i></span>
                            </div>
                        </div>
                    </div>
                    <!-- End Top Search -->
                    <div class="container">
                        <!-- Start Header Navigation -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                                <i class="fa fa-bars"></i>
                            </button>
                            <a class="navbar-brand hidden-md hidden-lg" href="#brand"><img src="assets/dist/img/logo2.png" class="logo" alt=""></a>
                        </div>
                        <!-- End Header Navigation -->
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        
                        <!-- /.navbar-collapse -->
                    </div>
                    <!-- Start Side Menu -->
                    <div class="side">
                        <a href="#" class="close-side"><i class="ti-close"></i></a>
                        <h3 class="sidebar-heading">Activity</h3>
                        <div class="rad-activity-body">
                            <div class="rad-list-group group">
                                <a href="#" class="rad-list-group-item">
                                    <div class="rad-list-icon icon-shadow bg-red pull-left"><i class="fa fa-phone"></i></div>
                                    <div class="rad-list-content"><strong>Client meeting</strong>
                                        <div class="md-text">Meeting at 10:00 AM</div>
                                    </div>
                                </a>
                                <a href="#" class="rad-list-group-item">
                                    <div class="rad-list-icon icon-shadow bg-yellow pull-left"><i class="fa fa-refresh"></i></div>
                                    <div class="rad-list-content"><strong>Created ticket</strong>
                                        <div class="md-text">Ticket assigned to Dev team</div>
                                    </div>
                                </a>
                                <a href="#" class="rad-list-group-item">
                                    <div class="rad-list-icon icon-shadow bg-primary pull-left"><i class="fa fa-check"></i></div>
                                    <div class="rad-list-content"><strong>Activity completed</strong>
                                        <div class="md-text">Completed the dashboard html</div>
                                    </div>
                                </a>
                                <a href="#" class="rad-list-group-item">
                                    <div class="rad-list-icon icon-shadow bg-green pull-left"><i class="fa fa-envelope"></i></div>
                                    <div class="rad-list-content"><strong>New Invitation</strong>
                                        <div class="md-text">Max has invited you to join Inbox</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!-- /.sidebar-menu -->
                        <h3 class="sidebar-heading">Tasks Progress</h3>
                        <ul class="sidebar-menu">
                            <li>
                                <a href="#">
                                    <h4 class="subheading">
                                        Task one
                                        <span class="label label-danger pull-right">40%</span>
                                    </h4>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger progress-bar-striped active" style="width: 40%"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <h4 class="subheading">
                                        Task two
                                        <span class="label label-success pull-right">20%</span>
                                    </h4>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success progress-bar-striped active" style="width: 20%"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <h4 class="subheading">
                                        Task Three
                                        <span class="label label-warning pull-right">60%</span>
                                    </h4>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-warning progress-bar-striped active" style="width: 60%"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <h4 class="subheading">
                                        Task four
                                        <span class="label label-primary pull-right">80%</span>
                                    </h4>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-primary progress-bar-striped active" style="width: 80%"></div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <!-- /.sidebar-menu -->
                    </div>
                    <!-- End Side Menu -->
                </nav> <!-- /. main navigation -->
                <div class="clearfix"></div>
            </header> <!-- /. main header -->

            <!-- Main Content -->
            <div id=content-wrapper>
                <div class="container">
                    <div class=content>

                        <div class=row>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class=row>

                                    <div class="col-lg-6">
                                        <div id="cPanelTempMain" class="panel panel-bd" style="border-radius: 50px;">
                                            <div class=panel-heading style="border-radius: 50px;">
                                                <div class=panel-title style="padding: 10px;">
                                                    <center>
                                                        <img src="assets/images/img-temp.png" width="120px" height="120px" />
                                                        <br><br><br><br>
                                                        <h1 style="font-size: 80px !important;"><span id="cPanelTemp">99.99</span> °c</h1>
                                                        <br><br>
                                                        <Table width="100%">
                                                            <tr>
                                                                <td>
                                                                    <center><div width="100%" height="100%" class="divButton" id="cPanelBtnTempMaxUp">+</div></center>
                                                                </td>
                                                                <td rowspan="3">
                                                                    <center><h1 style="font-size: 40px !important;">Temperature</h1></center>
                                                                </td>
                                                                <td>
                                                                    <center><div width="100%" height="100%" class="divButton" id="cPanelBtnTempMinUp">+</div></center>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <center><div width="100%" height="100%" class="divButton"><b><span id="cPanelTempMax">---</span></b></div></center>
                                                                </td>
                                                                <td>
                                                                    <center><div width="100%" height="100%" class="divButton"><b><span id="cPanelTempMin">---</span></b></div></center>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <center><div width="100%" height="100%" class="divButton" id="cPanelBtnTempMaxDown">-</div></center>
                                                                </td>
                                                                <td>
                                                                    <center><div width="100%" height="100%" class="divButton" id="cPanelBtnTempMinDown">-</div></center>
                                                                </td>
                                                            </tr>
                                                        </Table>
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div id="cPanelHumiMain" class="panel panel-bd" style="border-radius: 50px;">
                                            <div class=panel-heading style="border-radius: 50px;">
                                                <div class=panel-title style="padding: 10px;">
                                                    <center>
                                                        <img src="assets/images/img-humi.png" width="120px" height="120px" />
                                                        <br><br><br><br>
                                                        <h1 style="font-size: 80px !important;"><span id="cPanelHumi">99.99</span> %</h1>
                                                        <br><br>
                                                        <Table width="100%">
                                                            <tr>
                                                                <td>
                                                                    <center><div width="100%" height="100%" class="divButton" id="cPanelBtnHumiMaxUp">+</div></center>
                                                                </td>
                                                                <td rowspan="3">
                                                                    <center><h1 style="font-size: 40px !important;">Humidity</h1></center>
                                                                </td>
                                                                <td>
                                                                    <center><div width="100%" height="100%" class="divButton" id="cPanelBtnHumiMinUp">+</div></center>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <center><div width="100%" height="100%" class="divButton"><b><span id="cPanelHumiMax">---</span></b></div></center>
                                                                </td>
                                                                <td>
                                                                    <center><div width="100%" height="100%" class="divButton"><b><span id="cPanelHumiMin">---</span></b></div></center>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <center><div width="100%" height="100%" class="divButton" id="cPanelBtnHumiMaxDown">-</div></center>
                                                                </td>
                                                                <td>
                                                                    <center><div width="100%" height="100%" class="divButton" id="cPanelBtnHumiMinDown">-</div></center>
                                                                </td>
                                                            </tr>
                                                        </Table>
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div id="cPanel" class="panel panel-bd" style="border-radius: 50px; height: 150px;">
                                            <div class=panel-heading style="border-radius: 50px; height: 150px;">
                                                <div class=panel-title style="padding: 20px;">
                                                    <center>
                                                        <h1 style="font-size: 30px !important;"><span id="cPanelName">Test Device</span></h1>
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div id="cPanel" class="panel panel-bd" style="border-radius: 50px; height: 150px;">
                                            <div class=panel-heading style="border-radius: 50px; height: 150px;">
                                                <div class=panel-title style="padding: 20px;">
                                                    <a href="logs.php">
                                                        <center>
                                                            <h1 style="font-size: 30px !important;"><span id="">View Logs</span></h1>
                                                        </center>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
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


            // Variables
            // ===================
            var deviceData;
            var deviceIsLogin = false;


            // Start
            // ===================
            //localStorage.setItem("tokenId", "");

            
            // Loop
            // ===================
            // Load DUT Data
            setInterval(() => {
                LoadUser();
                LoadDevice();
                LoadInternet();
            }, 1000);


            // Events
            // ===================
            $('#cPanelBtnTempMaxUp').click(function(e) {  

                console.log(deviceIsLogin);
                if (!deviceIsLogin)
                {
                    
                    window.location.href = "login.php";
                    return;
                }

                alert("Adjusted!")
                $.ajax({
                    type: "POST",
                    url: "server/api.php?mode=devupdatetempmaxup",
                    data: {
                    },
                    success: function(data) {
                        
                    },
                    error: function(data) {
                        console.log("Critical Error ajax");
                    }
                });
            });

            $('#cPanelBtnTempMaxDown').click(function(e) {  
                console.log(deviceIsLogin);
                if (!deviceIsLogin)
                {
                    
                    window.location.href = "login.php";
                    return;
                }

                alert("Adjusted!")
                $.ajax({
                    type: "POST",
                    url: "server/api.php?mode=devupdatetempmaxdown",
                    data: {
                    },
                    success: function(data) {
                        
                    },
                    error: function(data) {
                        console.log("Critical Error ajax");
                    }
                });
            });

            $('#cPanelBtnTempMinUp').click(function(e) {  
                console.log(deviceIsLogin);
                if (!deviceIsLogin)
                {
                    
                    window.location.href = "login.php";
                    return;
                }

                alert("Adjusted!")
                $.ajax({
                    type: "POST",
                    url: "server/api.php?mode=devupdatetempminup",
                    data: {
                    },
                    success: function(data) {
                        
                    },
                    error: function(data) {
                        console.log("Critical Error ajax");
                    }
                });
            });

            $('#cPanelBtnTempMinDown').click(function(e) {  
                console.log(deviceIsLogin);
                if (!deviceIsLogin)
                {
                    
                    window.location.href = "login.php";
                    return;
                }

                alert("Adjusted!")
                $.ajax({
                    type: "POST",
                    url: "server/api.php?mode=devupdatetempmindown",
                    data: {
                    },
                    success: function(data) {
                        
                    },
                    error: function(data) {
                        console.log("Critical Error ajax");
                    }
                });
            });

            $('#cPanelBtnHumiMaxUp').click(function(e) {  
                console.log(deviceIsLogin);
                if (!deviceIsLogin)
                {
                    
                    window.location.href = "login.php";
                    return;
                }

                alert("Adjusted!")
                $.ajax({
                    type: "POST",
                    url: "server/api.php?mode=devupdatehumimaxup",
                    data: {
                    },
                    success: function(data) {
                        
                    },
                    error: function(data) {
                        console.log("Critical Error ajax");
                    }
                });
            });

            $('#cPanelBtnHumiMaxDown').click(function(e) {  
                console.log(deviceIsLogin);
                if (!deviceIsLogin)
                {
                    
                    window.location.href = "login.php";
                    return;
                }

                alert("Adjusted!")
                $.ajax({
                    type: "POST",
                    url: "server/api.php?mode=devupdatehumimaxdown",
                    data: {
                    },
                    success: function(data) {
                        
                    },
                    error: function(data) {
                        console.log("Critical Error ajax");
                    }
                });
            });

            $('#cPanelBtnHumiMinUp').click(function(e) {  
                console.log(deviceIsLogin);
                if (!deviceIsLogin)
                {
                    
                    window.location.href = "login.php";
                    return;
                }

                alert("Adjusted!")
                $.ajax({
                    type: "POST",
                    url: "server/api.php?mode=devupdatehumiminup",
                    data: {
                    },
                    success: function(data) {
                        
                    },
                    error: function(data) {
                        console.log("Critical Error ajax");
                    }
                });
            });

            $('#cPanelBtnHumiMinDown').click(function(e) {  
                console.log(deviceIsLogin);
                if (!deviceIsLogin)
                {
                    
                    window.location.href = "login.php";
                    return;
                }
                
                alert("Adjusted!")
                $.ajax({
                    type: "POST",
                    url: "server/api.php?mode=devupdatehumimindown",
                    data: {
                    },
                    success: function(data) {
                        
                    },
                    error: function(data) {
                        console.log("Critical Error ajax");
                    }
                });
            });
            


            // Function
            // ===================
            function LoadDevice()
            {
                $.ajax({
                    type: "POST",
                    url: "server/api.php?mode=devview",
                    data: {
                    },
                    success: function(data) {
                        // result
                        const result = JSON.parse(data);

                        // check
                        if (result.status == "ok")
                        {
                            deviceData = result.data;
                            LoadDisplay();

                            // password
                            if (parseFloat(result.data.getTime) >= parseFloat(result.data.device_passtimeout))
                            {
                                localStorage.setItem("tokenId", "");
                            }
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

            function LoadDisplay()
            {
                $("#cPanelTemp").text(deviceData?.dev_temp)
                $("#cPanelHumi").text(deviceData?.dev_humi)
                $("#cPanelName").text(deviceData?.dev_name)

                // others
                var time = (new Date()).toLocaleString({
                    hour12: true,
                });
                $('#datenow').text(time.toLocaleString());

                // temp
                if (parseFloat(deviceData.dev_temp_max) > parseFloat(deviceData.dev_temp) && parseFloat(deviceData.dev_temp_min) < parseFloat(deviceData.dev_temp))
                {
                    $('#cPanelTempMain').removeClass("panel-bd panel-warning panel-danger panel-success").addClass("panel-success");
                }
                else
                {
                    $('#cPanelTempMain').removeClass("panel-bd panel-warning panel-danger panel-success").addClass("panel-danger");
                }

                // humi
                if (parseFloat(deviceData.dev_humi_max) > parseFloat(deviceData.dev_humi) && parseFloat(deviceData.dev_humi_min) < parseFloat(deviceData.dev_humi))
                {
                    $('#cPanelHumiMain').removeClass("panel-bd panel-warning panel-danger panel-success").addClass("panel-success");
                }
                else
                {
                    $('#cPanelHumiMain').removeClass("panel-bd panel-warning panel-danger panel-success").addClass("panel-danger");
                }

                // device last update
                if (parseFloat(deviceData.getTime) >= parseFloat(deviceData.dev_lastupdate))
                {
                    $('#cPanelTempMain').removeClass("panel-bd panel-warning panel-danger panel-success").addClass("panel-warning");
                    $('#cPanelHumiMain').removeClass("panel-bd panel-warning panel-danger panel-success").addClass("panel-warning");
                }

                // Temp Max Min
                $('#cPanelTempMax').text(deviceData.dev_temp_max);
                $('#cPanelTempMin').text(deviceData.dev_temp_min);

                // Humi Max Min
                $('#cPanelHumiMax').text(deviceData.dev_humi_max);
                $('#cPanelHumiMin').text(deviceData.dev_humi_min);
            }

            function LoadUser()
            {
                if (localStorage.getItem("tokenId") == "1234")
                {
                    deviceIsLogin = true;
                }
                else
                {
                    deviceIsLogin = false;
                }   
            }

            function LoadInternet()
            {
                if (navigator.onLine) {
                    if (deviceData?.dev_wifi == "1")
                    {
                        var myImage = document.getElementById('wifinow');
                        myImage.setAttribute('src', 'assets/images/wifi-on.png');
                    }
                    else
                    {
                        var myImage = document.getElementById('wifinow');
                        myImage.setAttribute('src', 'assets/images/wifi-off.png');
                    }
                } else {
                    var myImage = document.getElementById('wifinow');
                    myImage.setAttribute('src', 'assets/images/wifi-off.png');
                }
            }
        </script>
    </body>
</html>
