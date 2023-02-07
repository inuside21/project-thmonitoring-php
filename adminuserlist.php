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
    

    // Fetch
    // =============================
    {
        // Fetch Building
        // --------------------------
        {
            $rowCabinet = array();
            $sql = "select * from cabinet_tbl";
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
    }
    */
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
                    <a class=navbar-brand href=index.html>
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
                            <h1>Device List</h1>
                            <small>View all device information</small>
                            <ol class=breadcrumb>
                                <li class=active><a href=dashboard.php><i class=pe-7s-home></i> Home</a></li>
                            </ol>
                        </div>
                    </div>
                </div>

                <div class=row>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        

                        <div class="panel panel-bd">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <h4>Device List</h4>
                                </div>
                                <div class=n2Status>
                                    <br><br>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Device ID</th>
                                                <th>Device Name</th>
                                                <th>Temperature</th>
                                                <th>Humidity</th>
                                                <th>Control</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
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

            // Load Table
            $("#dataTableExample1").DataTable({
                ordering: "false",
                ajax: {
                    url: 'server/api.php?mode=devviewlist',
                    dataSrc: 'data',
                },
                columns: [
                    { 
                        data: 'id'
                    },
                    { 
                        data: 'dev_name'
                    },
                    { 
                        data: 'dev_temp'
                    },
                    { 
                        data: 'dev_humi'
                    },
                    { 
                        data: null, 
                        render: function ( data, type, row, meta ) {
                            return '<center><a href="adminroomview.php?id=' + data.id + '">View</a></center>';
                        } 
                    }
                ]
            });

            // Logout User
            $('#uLogout').click(function(e) {
                localStorage.setItem("tokenId", "");
                window.location.href = "login.php";
            });
        </script>
    </body>
</html>