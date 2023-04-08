<?php

    // Database
    include("config/config.php");

    // Check
    // =============================
    {
        
    }
    
    // Fetch
    // =============================
    {
        // Fetch Device
        // --------------------------
        {
            $rowDevice = array();
            $sql = "select * from device_tbl";
            $rsDevice = mysqli_query($connection, $sql);
            $rsDeviceCount = mysqli_num_rows($rsDevice);
            if ($rsDeviceCount > 0)
            {
                while ($rowsDevice = mysqli_fetch_object($rsDevice))
                {
                    $rowDevice[] = $rowsDevice;
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
                        <li>
                            <a href="#" class="material-ripple"><i class="material-icons">domain</i> Device Manager<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="adminroomadd.php">Add Device</a></li>
                                <li><a href="adminroomlist.php">Device List</a></li>
                            </ul>
                        </li>
                        <li class=active id="isadmin">
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
                            <h1>Add User</span></h1>
                            <small>Fill-up all input. All links must be input complete.</small>
                            <ol class=breadcrumb>
                                <li class=active><a href=dashboard.php><i class=pe-7s-home></i> Home</a></li>
                            </ol>
                        </div>
                    </div>
                </div>

                <form id="fInfo" enctype="multipart/form-data">

                    <div class=row>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                            

                            <div class="panel panel-bd">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>User Information</h4>
                                    </div>
                                    <div class=n2Status>
                                        <div id="fButton">
                                            <a id="fSubmit" href="#"><span class="ti-save"></span> Save</a> &nbsp&nbsp&nbsp
                                            <a id="fClear" href="#"><span class="ti-reload"></span> Clear</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 p-l-30 p-r-30">
                                            <h4 class="text-center">Information</h4>
                                            <p class="m-b-20 text-center">All details and information</p><br>

                                            <div class="form-group row" style="display: none;">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Device Id</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" id="rId" name="rId" value="<?php echo $_GET['id']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Username</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" id="rUname" name="rUname" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Password</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" id="rPass" name="rPass" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Full Name</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" id="rFname" name="rFname" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Contact</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" id="rContact" name="rContact" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" id="rEmail" name="rEmail" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Admin Access</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" id="rAccess" name="rAccess" required>
                                                        <option value="0" selected>No</option>
                                                        <option value="1">Yes</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Receive Notif</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" id="rNotifs" name="rNotifs" required>
                                                        <option value="0" selected>No</option>
                                                        <option value="1">Yes</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                            

                            <div class="panel panel-bd">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Device Alert Notification</h4>
                                    </div>
                                    <div class=n2Status>
                                        
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                            <?php
                                                foreach ($rowDevice as $dDevice)
                                                {
                                            ?>
                                                    <div class="form-group row">
                                                        <div class="skin-flat col-sm-12">
                                                            <div class="i-check" style="margin-left: 20px;">
                                                                <input type="hidden" id="rDeviceId" name="rDeviceId[]" value="<?php echo $dDevice->id; ?>">
                                                                <input type="checkbox" id="rDevice-<?php echo $dDevice->id; ?>" name="rDevice-<?php echo $dDevice->id; ?>" value="<?php echo $dDevice->id; ?>">
                                                                <label for="rDevice-<?php echo $dDevice->id; ?>" style="margin-left: 20px;"><?php echo $dDevice->dev_name; ?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <?php
                                                }
                                            ?>
                                            
                                            <div class="form-group row"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                </form>
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
                            var formData = {};
                            $.each($('#fInfo').serializeArray(), function() {
                                var key = this.name;
                                var value = this.value;
                                if (formData[key] !== undefined) {
                                    if (!Array.isArray(formData[key])) {
                                        formData[key] = [formData[key]];
                                    }
                                    formData[key].push(value);
                                } else {
                                    formData[key] = value;
                                }
                            });

                            $.ajax({
                                type: "POST",
                                contentType: false,
                                processData: false,
                                url: "server/api.php?mode=useradd",
                                data: JSON.stringify(formData),
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
                                        swal("Added!", result.message, "success");
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
            });

            $(document).ready(function() {
                $('#rAccess').select2();
                $('#rNotifs').select2();
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

                        /*
                        // notifs
                        result.data.notifs.forEach(element => {
                            $('#rDevice-' + element.dev_id).prop("checked", true);
                        });
                        */

                        // check admin
                        if (result.data.user_access == "0")
                        {
                            $("#isadmin").hide();
                            window.location.href = "dashboard.php";
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