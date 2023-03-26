<?php

    // Database
    include("config/config.php");

    // Check
    // =============================
    {
        // ID
        // --------------------------
        if (!isset($_GET['id']))
        {
            // redirect
            header("Location: adminroomlist.php");
            exit();
        }
    }
    
    /*
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
                        <li><a href=dashboard.php class=material-ripple><i class=material-icons>home</i> Dashboard</a></li>
                        <li class=active>
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
                            <h1><span id='bDisplayName'></span></h1>
                            <small><span id='bDisplayBuildingName'>Device Name</span></small>
                            <ol class=breadcrumb>
                                <li class=active><a href=dashboard.php><i class=pe-7s-home></i> Home</a></li>
                            </ol>
                        </div>
                    </div>
                </div>

                <div class=row id="isadmin">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        

                        <div class="panel panel-bd">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <h4>Device Information</h4>
                                </div>
                                <div class=n2Status>
                                    <div id="fButton">
                                        <a id="fSubmit" href="#"><span class="ti-save"></span> Save</a> &nbsp&nbsp&nbsp
                                        <a id="fDelete" href="#"><span class="ti-trash"></span> Delete</a> &nbsp&nbsp&nbsp
                                        <a id="fClear" href="#"><span class="ti-reload"></span> Clear</a>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <form id="fInfo" action="asdsad.php" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 p-l-30 p-r-30">
                                            <h4 class="text-center">Information</h4>
                                            <p class="m-b-20 text-center">All details and information</p><br>

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Device Id</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" id="rId" name="rId" value="<?php echo $_GET['id']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Device Name</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" id="rName" name="rName" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Temperature Max Trigger</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="number" id="rTempHigh" name="rTempHigh" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Temperature Min Trigger</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="number" id="rTempLow" name="rTempLow" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Humidity Max Trigger</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="number" id="rHumiHigh" name="rHumiHigh" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Humidity Min Trigger</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="number" id="rHumiLow" name="rHumiLow" required>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row"></div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


                    </div>
                </div>

                <div class=row>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        

                        <div class="panel panel-bd">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <h4>Temperature & Humidity</h4>
                                </div>
                                <div class=n2Status>
                                    <br><br>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div id="chartdiv"></div>
                            </div>
                        </div>


                    </div>
                </div>

                <div class=row>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        

                        <div class="panel panel-bd">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <h4>Device Logs</h4>
                                </div>
                                <div class=n2Status>
                                    <br><br>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="dataTableExample1s" class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Temperature</th>
                                                <th>Humidity</th>
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

                <div class=row>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        

                        <div class="panel panel-bd">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <h4>Image Logs</h4>
                                </div>
                                <div class=n2Status>
                                    <br><br>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="dataTableExample2s" class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Image</th>
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
            var userData;

            // Load Web
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip({trigger: 'manual'}).tooltip('show');
                $(".progress-animated").each(function () {
                    each_bar_width = $(this).attr('aria-valuenow');
                    $(this).width(each_bar_width + '%');
                });     

                // Press - Submit
                $('#fSubmit').click(function(e) {
                    // check
                    if (userData.user_access == "0")
                    {
                        alert("Only admins are allowed to update data.")
                        return;
                    }

                    swal(
                        {
                            title: "Are you sure?",
                            text: "Pressing the Proceed button will save the data.",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3C6F18",
                            confirmButtonText: "Proceed",
                            closeOnConfirm: false
                        },
                        function() {
                            // form
                            $.ajax({
                                type: "POST",
                                url: "server/api.php?mode=devedit",
                                data: $("#fInfo").serialize(),
                                beforeSend: function() {
                                    // button
                                    $('#fButton').toggle();
                                },
                                success: function(data) {
                                    // button
                                    $('#fButton').toggle();

                                    // result
                                    const result = JSON.parse(data);

                                    // check
                                    if (result.status == "ok")
                                    {
                                        //message
                                        swal("Updated!", result.message, "success");
                                        setTimeout(() => {
                                            location.reload(true);
                                        }, 1000);
                                    }
                                    else
                                    {
                                        // message
                                        swal("Error!", result.message, "error");
                                    }
                                },
                                error: function(data) {
                                    // button
                                    $('#fButton').toggle();

                                    // message
                                    swal("Error!", "Something went wrong. Please try again.", "error");
                                }
                            });
                        }
                    );
                });

                // Press - Delete
                $('#fDelete').click(function(e) {
                    // check
                    if (userData.user_access == "0")
                    {
                        alert("Only admins are allowed to update data.")
                        return;
                    }

                    swal(
                        {
                            title: "Are you sure?",
                            text: "Pressing the Proceed button will REMOVE the data.",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3C6F18",
                            confirmButtonText: "Proceed",
                            closeOnConfirm: false
                        },
                        function() {
                            // form
                            $.ajax({
                                type: "POST",
                                url: "server/api.php?mode=devdelete",
                                data: $("#fInfo").serialize(),
                                beforeSend: function() {
                                    // button
                                    $('#fButton').toggle();
                                },
                                success: function(data) {
                                    // button
                                    $('#fButton').toggle();

                                    // result
                                    const result = JSON.parse(data);

                                    // check
                                    if (result.status == "ok")
                                    {
                                        //message
                                        window.location.href = "adminroomlist.php";
                                    }
                                    else
                                    {
                                        // message
                                        swal("Error!", result.message, "error");
                                    }
                                },
                                error: function(data) {
                                    // button
                                    $('#fButton').toggle();

                                    // message
                                    swal("Error!", "Something went wrong. Please try again.", "error");
                                }
                            });
                        }
                    );
                });

                // Press - Clear
                $('#fClear').click(function(e) {
                    swal(
                        {
                            title: "Are you sure?",
                            text: "Pressing the Clear button will clear the unsaved data.",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3C6F18",
                            confirmButtonText: "Clear",
                            closeOnConfirm: false
                        },
                        function() {
                            LoadForm();

                            //message
                            swal("Cleared!", "Form is now cleared.", "success");
                        }
                    );
                });

                // Load Table
                $("#dataTableExample1s").DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'excel'
                    ],
                    ordering: "false",
                    "bSort": false,
                    "aaSorting": [],
                    ajax: {
                        url: 'server/api.php?mode=devviewlogs&did=<?php echo $_GET['id']; ?>',
                        dataSrc: 'data',
                    },
                    columns: [
                        { 
                            data: 'data_date'
                        },
                        { 
                            data: 'data_temp'
                        },
                        { 
                            data: 'data_humi'
                        }
                    ]
                });

                // Load Table
                $("#dataTableExample2s").DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                    ],
                    ordering: "false",
                    "bSort": false,
                    "aaSorting": [],
                    ajax: {
                        url: 'server/api.php?mode=devviewimg&did=<?php echo $_GET['id']; ?>',
                        dataSrc: 'data',
                    },
                    columns: [
                        { 
                            data: 'devimg_date'
                        },
                        {
                            data: "devimg_filename",
                            "render": function(data, type, row, meta) {
                                return '<center><a href="server/images/' + data + '"><img src="server/images/' + data + '" width="150" height="150"></a></center>';
                            }
                        }
                    ]
                });

                // Load Chart
                var chart = AmCharts.makeChart("chartdiv", {
                    "type": "serial",
                    "theme": "light",
                    "precision": 2,
                    "valueAxes": [{
                            "id": "v1",
                            "title": "Value",
                            "position": "left",
                            "autoGridCount": false,
                        }],
                    "graphs": [{
                            "id": "g1",
                            "valueAxis": "v1",
                            "bullet": "round",
                            "bulletBorderAlpha": 1,
                            "bulletColor": "#FFFFFF",
                            "bulletSize": 5,
                            "hideBulletsCount": 50,
                            "lineThickness": 2,
                            "lineColor": "#20acd4",
                            "type": "smoothedLine",
                            "dashLength": 5,
                            "title": "Temperature",
                            "useLineColorForBulletBorder": true,
                            "valueField": "market1",
                            "balloonText": "[[title]]<br /><b style='font-size: 130%'>[[value]]</b>"
                        }, {
                            "id": "g2",
                            "valueAxis": "v1",
                            "bullet": "round",
                            "bulletBorderAlpha": 1,
                            "bulletColor": "#FFFFFF",
                            "bulletSize": 5,
                            "hideBulletsCount": 50,
                            "lineThickness": 2,
                            "lineColor": "#E5343D",
                            "type": "smoothedLine",
                            "dashLength": 5,
                            "title": "Humidity",
                            "useLineColorForBulletBorder": true,
                            "valueField": "market2",
                            "balloonText": "[[title]]<br /><b style='font-size: 130%'>[[value]]</b>"
                        }],
                    "chartScrollbar": [{
                        "graph": "g1",
                        "oppositeAxis": false,
                        "offset": 30,
                        "scrollbarHeight": 50,
                        "backgroundAlpha": 0,
                        "selectedBackgroundAlpha": 0.9,
                        "selectedBackgroundColor": "#ffffff",
                        "graphFillAlpha": 0,
                        "graphLineAlpha": 0.5,
                        "selectedGraphFillAlpha": 0,
                        "selectedGraphLineAlpha": 1,
                        "autoGridCount": true,
                        "color": "#AAAAAA"
                    }, {
                        "graph": "g2",
                        "oppositeAxis": false,
                        "offset": 30,
                        "scrollbarHeight": 50,
                        "backgroundAlpha": 0,
                        "selectedBackgroundAlpha": 0.9,
                        "selectedBackgroundColor": "#ffffff",
                        "graphFillAlpha": 0,
                        "graphLineAlpha": 0.5,
                        "selectedGraphFillAlpha": 0,
                        "selectedGraphLineAlpha": 1,
                        "autoGridCount": true,
                        "color": "#AAAAAA"
                    }],
                    "chartCursor": {
                        "pan": true,
                        "valueLineEnabled": true,
                        "valueLineBalloonEnabled": true,
                        "cursorAlpha": 0,
                        "valueLineAlpha": 0.2
                    },
                    "categoryField": "date",
                    "categoryAxis": {
                        "dashLength": 1,
                        "minorGridEnabled": true,
                        "labelRotation": 70,
                    },
                    "legend": {
                        "useGraphSettings": true,
                        "position": "top"
                    },
                    "balloon": {
                        "borderThickness": 1,
                        "shadowAlpha": 0
                    },
                    "dataProvider": [
                        <?php

                            $arrData = array();

                            // login
                            $xctr = 1;
                            $yctr = 1; // 24 data = 24 hrs?
                            $sql="select * FROM data_tbl where data_device = '" . $_GET['id'] . "' order by id desc";  // and data_date = %dselected ate% when select by date
                            $rsgetacc=mysqli_query($connection,$sql);
                            while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
                            {
                                if ($xctr % 1200 == 0)
                                {
                                    if ($yctr <= 24) // adjust this to view more
                                    {
                                        $arrData[] = '
                                            {
                                                "date": "' . $rowsgetacc->data_date . '",
                                                "market1": ' . $rowsgetacc->data_temp . ',
                                                "market2": ' . $rowsgetacc->data_humi . '
                                            },
                                        ';
                                    }

                                    $yctr++;
                                }

                                $xctr++;
                            }

                            // chart
                            foreach(array_reverse($arrData) as $valchart)
                            {
                                echo $valchart;
                            }
                        ?>
                        ]
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
                        userData = result.data;

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

            // Load Data
            $.ajax({
                type: "POST",
                url: "server/api.php?mode=devview",
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
                        $('#bDisplayName').text(result.data.dev_name);
                        //$('#bDisplayBuildingName').text(result.message.building_name);

                        // input
                        $('#rName').val(result.data.dev_name);
                        $('#rTempHigh').val(result.data.dev_temp_max);
                        $('#rTempLow').val(result.data.dev_temp_min);
                        $('#rHumiHigh').val(result.data.dev_humi_max);
                        $('#rHumiLow').val(result.data.dev_humi_min);
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

            

            // Logout User
            $('#uLogout').click(function(e) {
                localStorage.setItem("tokenId", "");
                window.location.href = "login.php";
            });

            // Function
            // -------------------------
            // Load Form
            function LoadForm()
            {
                $('#fInfo')[0].reset();
            }
        </script>
    </body>
</html>
