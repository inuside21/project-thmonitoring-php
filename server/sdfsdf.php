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
            $rowsgetacc->getTime = strtotime($dateResult);
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
        $xctr = 1;
        $sql="select * FROM data_tbl order by id desc"; 
        $rsgetacc=mysqli_query($connection,$sql);
        while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
        {
            if ($xctr % 1200 == 0)
            {
                $resList[] = $rowsgetacc;
            }

            $xctr++;
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
        $sql="select * FROM img_tbl order by id desc limit 100"; 
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
        echo $_GET['ddat'];
    }

    // Pass Device Update
    // ----------------------
    if ($_GET['mode'] == 'devpass')
    {
        $resData = JSONGet();

        // update
        $getLastUpdate = strtotime($dateResult) + 60;

        // login
        $sql="update device_tbl set
                device_passtimeout = '" . $getLastUpdate . "'
        "; 
        $rsgetacc=mysqli_query($connection,$sql);

        // result
        JSONSet("ok", "", "");
    }

    // Wifi Device On
    // ----------------------
    if ($_GET['mode'] == 'devwifion')
    {
        $resData = JSONGet();

        // login
        $sql="update device_tbl set
                    dev_wifi = '1'
        "; 
        $rsgetacc=mysqli_query($connection,$sql);
    }

    // Wifi Device Off
    // ----------------------
    if ($_GET['mode'] == 'devwifioff')
    {
        $resData = JSONGet();

        // login
        $sql="update device_tbl set
                    dev_wifi = '0'
        "; 
        $rsgetacc=mysqli_query($connection,$sql);
    }

    // Update Device
    // ----------------------
    if ($_GET['mode'] == 'dupdatedevice')
    {
        $resData = JSONGet();

        $getVal = $_GET['dval'];
        $getTemp = explode(',', $getVal)[0];
        $getHumi = explode(',', $getVal)[1];
        $getUltrasonic = explode(',', $getVal)[2];
        $output = "";

        // update
        $getLastUpdate = strtotime($dateResult) + 60;

        // login
        $myDeviceId = "";
        $getDeviceData = new stdClass();
        $sql="select * FROM device_tbl"; 
        $rsgetacc=mysqli_query($connection,$sql);
        while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
        {
            $myDeviceId = $rowsgetacc->id;
            $getDeviceData = $rowsgetacc;
        }

        // device
        $sql="  update device_tbl set 
                    dev_lastupdate = '" . $getLastUpdate . "',
                    dev_temp = '" . $getTemp . "',
                    dev_humi = '" . $getHumi . "',
                    dev_cmd = '" .  $myDeviceId. "'
            "; 
        $rsgetacc=mysqli_query($connection,$sql);

        // log
        $sql="  insert into data_tbl 
                    (
                        data_device,
                        data_date,
                        data_temp,
                        data_humi
                    )
                values
                    (
                        '" . $myDeviceId ."',
                        '" . $dateResult . "',
                        '" . $getTemp . "',
                        '" . $getHumi . "'
                    )
            "; 
        $rsgetacc=mysqli_query($connection,$sql);

        // ultrasonic
        if ((int)$getUltrasonic > 300 && (int)$getUltrasonic != 0)
        {
            $newName = GUID() . ".jpg";
            $retryImage = 0;

            while (!file_exists($newName) || $retryImage > 5)
            {
                $output = passthru("sudo fswebcam -d /dev/video5 " . $newName);
                sleep(1);
                $retryImage++;
            }

            if ($retryImage <= 5)
            {
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
        }

        // sensor
        if ((float)$getDeviceData->dev_temp_max <= (float)$getTemp || (float)$getDeviceData->dev_temp_min >= (float)$getTemp || (float)$getDeviceData->dev_humi_max <= (float)$getHumi || (float)$getDeviceData->dev_humi_min >= (float)$getHumi)
        {
            $output = passthru("sudo python3 /var/www/html/thserver/buzzer.py");
            sleep(1);
        }

        echo $myDeviceId . "," . $getUltrasonic;
    }

    // Update Hosting
    // ----------------------
    if ($_GET['mode'] == 'dupdatehosting')
    {
        // login
        $myDeviceId = "";
        $sql="select * FROM device_tbl"; 
        $rsgetacc=mysqli_query($connection,$sql);
        while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
        {
            $myDeviceId = $rowsgetacc->id;
        }

        // set
        $url = 'https://web-based-monthy.com/server/api.php?mode=dupdatehosting&did=' . $myDeviceId;
        $dataLogs = array();

        // get data logs
        $xctr = 0;
        $sql="select * FROM data_tbl where data_device = '" . $myDeviceId . "'"; 
        $rsgetacc=mysqli_query($connection,$sql);
        while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
        {
            $xctr++;
            $x = (array)$rowsgetacc;
            $dataLogs[] = $x;
        }


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($dataLogs));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute the cURL request
        $response = curl_exec($ch);

        // Close the cURL session
        curl_close($ch);

        // Handle the response from the remote server
        if ($response === false) {
            echo 'cURL Error: ' . curl_error($ch);
        } else {
            echo 'Responses: ' . $response . " xctrA: " . $xctr;
        }
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