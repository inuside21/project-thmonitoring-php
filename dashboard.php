<?php

    // Database
    include("config/config.php");
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
                            <h1 style="color: white;">Temperature & Humidity Monitoring</h1>
                        </div>
                        <!-- End Atribute Navigation -->
                        <!-- /.navbar-header -->
                        <div class="nav navbar-top-links navbar-right">
                            <h2 style="color: silver;">
                                <span id="datenow">2023-01-13 11:59:59</span>
                            </h2>
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
                                        <div id="cPanel" class="panel panel-bd" style="border-radius: 50px;">
                                            <div class=panel-heading style="border-radius: 50px;">
                                                <div class=panel-title style="padding: 20px;">
                                                    <center>
                                                        <img src="assets/images/img-temp.png" width="140px" height="140px" />
                                                        <br><br><br><br>
                                                        <h1 style="font-size: 100px !important;"><span id="cPanelTemp">99.99</span> °c</h1>
                                                        <br><br>
                                                        <h1 style="font-size: 40px !important;">Temperature</h1>
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div id="cPanel" class="panel panel-bd" style="border-radius: 50px;">
                                            <div class=panel-heading style="border-radius: 50px;">
                                                <div class=panel-title style="padding: 20px;">
                                                    <center>
                                                        <img src="assets/images/img-humi.png" width="140px" height="140px" />
                                                        <br><br><br><br>
                                                        <h1 style="font-size: 100px !important;"><span id="cPanelHumi">99.99</span> %</h1>
                                                        <br><br>
                                                        <h1 style="font-size: 40px !important;">Humidity</h1>
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
                                                        <h1 style="font-size: 60px !important;"><span id="cPanelName">Test Device</span></h1>
                                                        <br><br>
                                                        <h1 style="font-size: 40px !important;">Device Name</h1>
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6" onclick="alert('yah')">
                                        <div id="cPanel" class="panel panel-bd" style="border-radius: 50px; height: 150px;">
                                            <div class=panel-heading style="border-radius: 50px; height: 150px;">
                                                <div class=panel-title style="padding: 20px;">
                                                    <center>
                                                        <br>
                                                        <h1 style="font-size: 60px !important;"><span id="">View Logs</span></h1>
                                                    </center>
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


            // Start
            // ===================

            
            // Loop
            // ===================
            // Load DUT Data
            setInterval(() => {
                LoadDevice();
            }, 1000);


            // Events
            // ===================
            


            // Function
            // ===================
            function LoadDevice()
            {
                $.ajax({
                    type: "POST",
                    url: "server/api.php?mode=devview",
                    data: {
                        "did": <?php echo $myDeviceId; ?>,
                    },
                    success: function(data) {
                        // result
                        const result = JSON.parse(data);

                        // check
                        if (result.status == "ok")
                        {
                            deviceData = result.data;
                            LoadDisplay();
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
            }
        </script>
    </body>
</html>
