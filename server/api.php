<?php

    // Database
    include("../config/config.php");

    // check
    if (!isset($_GET['mode'])) {
        echo json_encode(array("status" => "error", "message" => "Mode Error"));
        exit();
    }


    /*
        ======================================
        MODES
        ======================================
    */

    // User Login
    // ----------------------
    if ($_GET['mode'] == 'userlogin')
    {
        $resData = JSONGet();

        // login
        $sql="select * FROM user_tbl where binary user_uname = '" . $_POST['uuname'] . "' and binary user_pword = '" . $_POST['uuname'] . "'"; 
        $rsgetacc=mysqli_query($connection,$sql);
        while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
        {
            $tokenNew = GUID();

            $sql="update user_tbl set user_token = '" . $tokenNew . "' where id = '" . $rowsgetacc->id . "'"; 
            $rsupdate=mysqli_query($connection,$sql);


            JSONSet("ok", "", "", $tokenNew);
        }

        // result
        JSONSet("error", "Login Error", "Login Error");
    }

    // User Token
    // ----------------------
    if ($_GET['mode'] == 'userverifytoken')
    {
        $resData = JSONGet();

        // login
        $sql="select * FROM user_tbl where user_token = '" . $_POST['utoken'] . "'"; 
        $rsgetacc=mysqli_query($connection,$sql);
        while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
        {
            JSONSet("ok", "", "", $rowsgetacc);
        }

        // result
        JSONSet("error", "Token Error", "Token Error");
    }

    // View Device
    // ----------------------
    if ($_GET['mode'] == 'devview')
    {
        $resData = JSONGet();

        // login
        $sql="select * FROM device_tbl"; 
        $rsgetacc=mysqli_query($connection,$sql);
        while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
        {
            JSONSet("ok", "", "", $rowsgetacc);
        }

        // result
        JSONSet("error", "Device Error", "Id invalid" . $_POST['did']);
    }

    // View Device Id
    // ----------------------
    if ($_GET['mode'] == 'devviewid')
    {
        $resData = JSONGet();

        // login
        $sql="select * FROM device_tbl"; 
        $rsgetacc=mysqli_query($connection,$sql);
        while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
        {
            echo $rowsgetacc->id;
        }
    }

    // View Device Logs
    // ----------------------
    if ($_GET['mode'] == 'devviewlogs')
    {
        $resData = JSONGet();

        // set 
        $resList = array();

        // login
        $sql="select * FROM data_tbl order by id desc"; 
        $rsgetacc=mysqli_query($connection,$sql);
        while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
        {
            $resList[] = $rowsgetacc;
        }

        // result
        JSONSet("ok", "", "", $resList);
    }

    // View Device Image
    // ----------------------
    if ($_GET['mode'] == 'devviewimg')
    {
        $resData = JSONGet();

        // set 
        $resList = array();

        // login
        $sql="select * FROM img_tbl order by id desc"; 
        $rsgetacc=mysqli_query($connection,$sql);
        while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
        {
            $resList[] = $rowsgetacc;
        }

        // result
        JSONSet("ok", "", "", $resList);
    }

    // Edit Device
    // ----------------------
    if ($_GET['mode'] == 'devedit')
    {
        $resData = JSONGet();

        // get
        $deviceData = explode(',', $_GET['ddat']);

        // login
        $sql="update device_tbl set
                    dev_name = '" . $deviceData[1] . "',
                    dev_temp_max = '" . $deviceData[4] . "',
                    dev_temp_min = '" . $deviceData[5] . "',
                    dev_humi_max = '" . $deviceData[6] . "',
                    dev_humi_min = '" . $deviceData[7] . "'
        "; 
        $rsgetacc=mysqli_query($connection,$sql);

        // result
        JSONSet("ok", "Success!", "Device details updated successfully.");
    }

    // Update Device (Monitoring Device)
    // ----------------------
    if ($_GET['mode'] == 'dupdatedevice')
    {
        $resData = JSONGet();

        $getVal = $_GET['dval'];
        $getTemp = explode(',', $getVal)[0];
        $getHumi = explode(',', $getVal)[1];
        $getUltrasonic = explode(',', $getVal)[2];
        $output = "";

        // login
        $myDeviceId = "";
        $sql="select * FROM device_tbl"; 
        $rsgetacc=mysqli_query($connection,$sql);
        while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
        {
            $myDeviceId = $rowsgetacc->id;
        }

        // ultrasonic
        if ((int)$getUltrasonic > 300 && (int)$getUltrasonic != 0)
        {
            $newName = GUID() . ".jpg";
            $output = passthru("sudo fswebcam -d /dev/video5 " . $newName);

            // save
            $sql="  insert into img_tbl 
                        (
                            img_date,
                            img_name
                        )
                    values
                        (
                            '" . $dateResult . "',
                            '" . $newName . "'
                        )
                "; 
            $rsgetacc=mysqli_query($connection,$sql);
        }

        // device
        $sql="  update device_tbl set 
                    dev_lastupdate = '" . strtotime($dateResult) . "',
                    dev_temp = '" . $getTemp . "',
                    dev_humi = '" . $getHumi . "'
            "; 
        $rsgetacc=mysqli_query($connection,$sql);

        // log
        $sql="  insert into data_tbl 
                    (
                        data_date,
                        data_temp,
                        data_humi
                    )
                values
                    (
                        '" . $dateResult . "',
                        '" . $getTemp . "',
                        '" . $getHumi . "'
                    )
            "; 
        $rsgetacc=mysqli_query($connection,$sql);

        echo $myDeviceId . "," . $getUltrasonic;
    }


    // Adjust Temp Max Up
    // ----------------------
    if ($_GET['mode'] == 'devupdatetempmaxup')
    {
        $sql="select * FROM device_tbl"; 
        $rsgetacc=mysqli_query($connection,$sql);
        while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
        {
            $output = passthru("sudo python3 /var/www/html/thserver/updatehost.py 0 " . $rowsgetacc->id);
            return;
        }
    }

    // Adjust Temp Max Down
    // ----------------------
    if ($_GET['mode'] == 'devupdatetempmaxdown')
    {
        $sql="select * FROM device_tbl"; 
        $rsgetacc=mysqli_query($connection,$sql);
        while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
        {
            $output = passthru("sudo python3 /var/www/html/thserver/updatehost.py 1 " . $rowsgetacc->id);
            return;
        }
    }

    // Adjust Temp Min Up
    // ----------------------
    if ($_GET['mode'] == 'devupdatetempminup')
    {
        $sql="select * FROM device_tbl"; 
        $rsgetacc=mysqli_query($connection,$sql);
        while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
        {
            $output = passthru("sudo python3 /var/www/html/thserver/updatehost.py 2 " . $rowsgetacc->id);
            return;
        }
    }

    // Adjust Temp Min Up
    // ----------------------
    if ($_GET['mode'] == 'devupdatetempmindown')
    {
        $sql="select * FROM device_tbl"; 
        $rsgetacc=mysqli_query($connection,$sql);
        while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
        {
            $output = passthru("sudo python3 /var/www/html/thserver/updatehost.py 3 " . $rowsgetacc->id);
            return;
        }
    }

    // Adjust Humi Max Up
    // ----------------------
    if ($_GET['mode'] == 'devupdatehumimaxup')
    {
        $sql="select * FROM device_tbl"; 
        $rsgetacc=mysqli_query($connection,$sql);
        while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
        {
            $output = passthru("sudo python3 /var/www/html/thserver/updatehost.py 4 " . $rowsgetacc->id);
            return;
        }
    }

    // Adjust Humi Max Down
    // ----------------------
    if ($_GET['mode'] == 'devupdatehumimaxdown')
    {
        $sql="select * FROM device_tbl"; 
        $rsgetacc=mysqli_query($connection,$sql);
        while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
        {
            $output = passthru("sudo python3 /var/www/html/thserver/updatehost.py 5 " . $rowsgetacc->id);
            return;
        }
    }

    // Adjust Humi Min Up
    // ----------------------
    if ($_GET['mode'] == 'devupdatehumiminup')
    {
        $sql="select * FROM device_tbl"; 
        $rsgetacc=mysqli_query($connection,$sql);
        while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
        {
            $output = passthru("sudo python3 /var/www/html/thserver/updatehost.py 6 " . $rowsgetacc->id);
            return;
        }
    }

    // Adjust Humi Min Up
    // ----------------------
    if ($_GET['mode'] == 'devupdatehumimindown')
    {
        $sql="select * FROM device_tbl"; 
        $rsgetacc=mysqli_query($connection,$sql);
        while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
        {
            $output = passthru("sudo python3 /var/www/html/thserver/updatehost.py 7 " . $rowsgetacc->id);
            return;
        }
    }
    
    


    /*
        ======================================
        FUNCTIONS
        ======================================
    */

    // JSON - Get
    // ---------------------------------------
    function JSONGet()
    {
        // get json
        $json = file_get_contents('php://input');
        $data = json_decode($json);
        return $data;
    }

    // JSON - Set     
    // ---------------------------------------
    function JSONSet($resStatus, $resTitle = "", $resMsg = "", $resData = "")
    {
        /*
            status:
                ok      - success
                error   - error

            title:
                return any notif title

            message:
                return any notif msg
            
            data:
                return any result
        */
        echo json_encode(array("status" => $resStatus, "title" => $resTitle, "message" => $resMsg, "data" => $resData));
        exit();
    }

    // IDs
    // ---------------------------------------
    function GUID()
    {
        if (function_exists('com_create_guid') === true)
        {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535));
    }
?>