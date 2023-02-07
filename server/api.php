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

    // View Device Logs
    // ----------------------
    if ($_GET['mode'] == 'devviewlogs')
    {
        $resData = JSONGet();

        // set
        $resList = array();

        // login
        $sql="select * FROM data_tbl where data_device = '" . $_GET['did'] . "' order by id desc"; 
        $rsgetacc=mysqli_query($connection,$sql);
        while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
        {
            $resList[] = $rowsgetacc;
        }

        // result
        JSONSet("ok", "", "", $resList);
    }

    // View Device
    // ----------------------
    if ($_GET['mode'] == 'devview')
    {
        $resData = JSONGet();

        // login
        $sql="select * FROM device_tbl where id = '" . $_POST['did'] . "'"; 
        $rsgetacc=mysqli_query($connection,$sql);
        while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
        {
            JSONSet("ok", "", "", $rowsgetacc);
        }

        // result
        JSONSet("error", "Device Error", "Id invalid" . $_POST['did']);
    }

    // View Device List
    // ----------------------
    if ($_GET['mode'] == 'devviewlist')
    {
        $resData = JSONGet();

        // set
        $resList = array();

        // login
        $sql="select * FROM device_tbl"; 
        $rsgetacc=mysqli_query($connection,$sql);
        while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
        {
            $resList[] = $rowsgetacc;
        }

        JSONSet("ok", "", "", $resList);
    }

    // Add Device
    // ----------------------
    if ($_GET['mode'] == 'devadd')
    {
        $resData = JSONGet();

        // login
        $sql="insert into device_tbl
                (
                    dev_name,
                    dev_temp_max,
                    dev_temp_min,
                    dev_humi_max,
                    dev_humi_min
                )
            values
                (
                    '" . $_POST['rName'] . "',
                    '" . $_POST['rTempHigh'] . "',
                    '" . $_POST['rTempLow'] . "',
                    '" . $_POST['rHumiHigh'] . "',
                    '" . $_POST['rHumiLow'] . "'
                )"; 
        $rsgetacc=mysqli_query($connection,$sql);

        // result
        JSONSet("ok", "Success!", "New Device added successfully.");
    }

    // Edit Device
    // ----------------------
    if ($_GET['mode'] == 'devedit')
    {
        $resData = JSONGet();

        // login
        $sql="update device_tbl set
                    dev_name = '" . $_POST['rName'] . "',
                    dev_temp_max = '" . $_POST['rTempHigh'] . "',
                    dev_temp_min = '" . $_POST['rTempLow'] . "',
                    dev_humi_max = '" . $_POST['rHumiHigh'] . "',
                    dev_humi_min = '" . $_POST['rHumiLow'] . "'
            where id = '" . $_POST['rId'] . "'"; 
        $rsgetacc=mysqli_query($connection,$sql);

        // result
        JSONSet("ok", "Success!", "Device details updated successfully.");
    }

    // Delete Device
    // ----------------------
    if ($_GET['mode'] == 'devdelete')
    {
        $resData = JSONGet();

        // login
        $sql="delete from device_tbl where id = '" . $_POST['rId'] . "'"; 
        $rsgetacc=mysqli_query($connection,$sql);

        // result
        JSONSet("ok", "Success!", "Device details removed successfully.");
    }

    // Update Device (Monitoring)
    // ----------------------
    if ($_GET['mode'] == 'dupdate')
    {
        $resData = JSONGet();

        $getVal = $_GET['dval'];
        $getTemp = explode(',', $getVal)[0];
        $getHumi = explode(',', $getVal)[1];

        // device
        $sql="  update device_tbl set 
                    dev_lastupdate = '" . strtotime($dateResult) . "',
                    dev_temp = '" . $getTemp . "',
                    dev_humi = '" . $getHumi . "'
                where id = '" . $myDeviceId . "'
            "; 
        $rsgetacc=mysqli_query($connection,$sql);

        // log
        $sql="  insert into data_tbl 
                    (
                        data_date,
                        data_device,
                        data_temp,
                        data_humi
                    )
                values
                    (
                        '" . $dateResult . "',
                        '" . $myDeviceId . "',
                        '" . $getTemp . "',
                        '" . $getHumi . "'
                    )
            "; 
        $rsgetacc=mysqli_query($connection,$sql);

        echo $myDeviceId;
    }

    // Update Device (Monitoring Host)
    // ----------------------
    if ($_GET['mode'] == 'dupdatehost')
    {
        $resData = JSONGet();

        $getVal = $_GET['dval'];
        $getTemp = explode(',', $getVal)[0];
        $getHumi = explode(',', $getVal)[1];

        $getId = $_GET['did'];

        // device
        $sql="  update device_tbl set 
                    dev_lastupdate = '" . strtotime($dateResult) . "',
                    dev_temp = '" . $getTemp . "',
                    dev_humi = '" . $getHumi . "'
                where id = '" . $getId . "'
            "; 
        $rsgetacc=mysqli_query($connection,$sql);

        // log
        $sql="  insert into data_tbl 
                    (
                        data_date,
                        data_device,
                        data_temp,
                        data_humi
                    )
                values
                    (
                        '" . $dateResult . "',
                        '" . $getId . "',
                        '" . $getTemp . "',
                        '" . $getHumi . "'
                    )
            "; 
        $rsgetacc=mysqli_query($connection,$sql);

        
        // notif
        $sql="select * FROM device_tbl where id = '" . $getId . "'"; 
        $rsgetacc=mysqli_query($connection,$sql);
        while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
        {
            // email
            {
                if ((float)$rowsgetacc->dev_tar_temp >= (float)$getTemp || (float)$rowsgetacc->dev_tar_humi >= (float)$getHumi)
                {
                    $to = "martinmexico3@gmail.com";
                    $subject = "Web-Based Monitoring System";
                    $txt = "
                                <b>URGENT!</b> <br>
                                Temperature and Humidity Monitoring System has detected a limit extent on Pharmacy Department. <br><br>
                                
                                Values Set: <br><br>
                                
                                Temperature: " . $rowsgetacc->dev_tar_temp . " <br>
                                Humidity: " . $rowsgetacc->dev_tar_humi . " <br><br>
                                
                                Date and Time: " . $dateResult . " <br>
                                Actual Room Temperature: " . $getTemp . "<br>
                                Actual Room Humidity: " . $getHumi . " <br><br>
                                
                                Click the link for more information: <br>
                                https://martorenzo.click/project/th <br>
                                admin@martorenzo.click
                    ";        
                    $headers = "MIME-Version: 1.0\r\n";
                    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                    $headers .= "From: admin@martorenzo.click";
                    mail($to,$subject,$txt,$headers);
                }
            }

            // sms
            
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