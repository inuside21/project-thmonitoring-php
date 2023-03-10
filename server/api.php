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

    // View User
    // ----------------------
    if ($_GET['mode'] == 'userview')
    {
        $resData = JSONGet();

        // login
        $sql="select * FROM user_tbl where id = '" . $_POST['did'] . "'"; 
        $rsgetacc=mysqli_query($connection,$sql);
        while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
        {
            JSONSet("ok", "", "", $rowsgetacc);
        }

        // result
        JSONSet("error", "Device Error", "Id invalid" . $_POST['did']);
    }

    // View User List
    // ----------------------
    if ($_GET['mode'] == 'userlist')
    {
        $resData = JSONGet();

        // set
        $resList = array();

        // login
        $sql="select * FROM user_tbl"; 
        $rsgetacc=mysqli_query($connection,$sql);
        while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
        {
            $resList[] = $rowsgetacc;
        }

        JSONSet("ok", "", "", $resList);
    }

    // Add User
    // ----------------------
    if ($_GET['mode'] == 'useradd')
    {
        $resData = JSONGet();

        // login
        $sql="insert into user_tbl
                (
                    user_uname,
                    user_pword,
                    user_fname,
                    user_phone,
                    user_email,
                    user_access
                )
            values
                (
                    '" . $_POST['rUname'] . "',
                    '" . $_POST['rPass'] . "',
                    '" . $_POST['rFname'] . "',
                    '" . $_POST['rContact'] . "',
                    '" . $_POST['rEmail'] . "',
                    '" . $_POST['rAccess'] . "'
                )"; 
        $rsgetacc=mysqli_query($connection,$sql);

        // result
        JSONSet("ok", "Success!", "New User added successfully.");
    }

    // Edit User
    // ----------------------
    if ($_GET['mode'] == 'useredit')
    {
        $resData = JSONGet();

        // login
        $sql="update user_tbl set
                    user_uname = '" . $_POST['rUname'] . "',
                    user_pword = '" . $_POST['rPass'] . "',
                    user_fname = '" . $_POST['rFname'] . "',
                    user_phone = '" . $_POST['rContact'] . "',
                    user_email = '" . $_POST['rEmail'] . "',
                    user_access = '" . $_POST['rAccess'] . "'
            where id = '" . $_POST['rId'] . "'"; 
        $rsgetacc=mysqli_query($connection,$sql);

        // result
        JSONSet("ok", "Success!", "User details updated successfully.");
    }

    // Delete User
    // ----------------------
    if ($_GET['mode'] == 'userdelete')
    {
        $resData = JSONGet();

        // login
        $sql="delete from user_tbl where id = '" . $_POST['rId'] . "'"; 
        $rsgetacc=mysqli_query($connection,$sql);

        // result
        JSONSet("ok", "Success!", "User details removed successfully.");
    }

    // View Device Logs
    // ----------------------
    if ($_GET['mode'] == 'devviewlogs')
    {
        $resData = JSONGet();

        // set
        $resList = array();

        // login
        // get every 30th
        $xctr = 1;
        $sql="select * FROM data_tbl where data_device = '" . $_GET['did'] . "' order by id desc"; 
        $rsgetacc=mysqli_query($connection,$sql);
        while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
        {
            if ($xctr % 14400 == 0)
            {
                $resList[] = $rowsgetacc;
            }
            
            $xctr++;
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

    // View Device Data (Monitoring Host)
    // ----------------------
    if ($_GET['mode'] == 'devviewdata')
    {
        $resData = JSONGet();

        // device
        $sql="select * from device_tbl where id = '" . $_GET['did'] . "'"; 
        $rsgetacc=mysqli_query($connection,$sql);
        while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
        {
            echo $rowsgetacc->id . "," . $rowsgetacc->dev_name . "," . $rowsgetacc->dev_temp . "," . $rowsgetacc->dev_humi . "," . $rowsgetacc->dev_temp_max . "," . $rowsgetacc->dev_temp_min . "," . $rowsgetacc->dev_humi_max . "," . $rowsgetacc->dev_humi_min;
        }
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
            // check alert
            if ((int)$rowsgetacc->dev_nextalert <= strtotime($dateResult))
            {
                // next
                $sql="  update device_tbl set 
                            dev_nextalert = '" . strtotime($dateResult) + 300 . "'
                        where id = '" . $getId . "'
                    "; 
                $rsupd=mysqli_query($connection,$sql);
            
                // alert
                $sql="select * FROM user_tbl"; 
                $rsusr=mysqli_query($connection,$sql);
                while ($rowsusr = mysqli_fetch_object($rsusr))
                {
                    // email
                    {
                        if ((float)$rowsgetacc->dev_temp_max <= (float)$getTemp || (float)$rowsgetacc->dev_temp_min >= (float)$getTemp || (float)$rowsgetacc->dev_humi_max <= (float)$getHumi || (float)$rowsgetacc->dev_humi_min >= (float)$getHumi)
                        {
                            $to = $rowsusr->user_email;
                            $subject = "Web-Based Monitoring System";
                            $txt = "
                                        <b>URGENT!</b> <br>
                                        Temperature and Humidity Monitoring System has detected a limit extent on Pharmacy Department. <br><br>
                                        
                                        Values Set: <br>
                                        Temperature: " . $rowsgetacc->dev_temp_max . " Max  / " . $rowsgetacc->dev_temp_max . " Min <br>
                                        Humidity: " . $rowsgetacc->dev_humi_max . " Max  / " . $rowsgetacc->dev_humi_min . " Min <br><br>
                                        
                                        Date and Time: " . $dateResult . " <br>
                                        Actual Room Temperature: " . $getTemp . " c<br>
                                        Actual Room Humidity: " . $getHumi . " %<br><br>
                                        
                                        Click the link for more information: <br>
                                        https://web-based-monthy.com <br>
                                        admin@web-based-monthy.com
                            ";        
                            $headers = "MIME-Version: 1.0\r\n";
                            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                            $headers .= "From: admin@web-based-monthy.com";
                            mail($to,$subject,$txt,$headers);
                        }
                    }
                }
            }

            // check alert
            if ((int)$rowsgetacc->dev_nextalert2 <= strtotime($dateResult))
            {
                // next
                $sql="  update device_tbl set 
                            dev_nextalert2 = '" . strtotime($dateResult) + 1800 . "'
                        where id = '" . $getId . "'
                    "; 
                $rsupd=mysqli_query($connection,$sql);
            
                // alert
                $sql="select * FROM user_tbl"; 
                $rsusr=mysqli_query($connection,$sql);
                while ($rowsusr = mysqli_fetch_object($rsusr))
                {
                    // sms
                    {
                       $txt = "WBMONTHY - URGENT!\n\nSet:\nTemp: " . $rowsgetacc->dev_temp_max . "c / " . $rowsgetacc->dev_temp_max . "c\rRH: " . $rowsgetacc->dev_humi_max . "% / " . $rowsgetacc->dev_humi_min . "%\n\nDate: " . $dateResult . "\nActual Temp: " . $getTemp . "c\nActual RH: " . $getHumi . "%"; 

                        $ch = curl_init();
                        $parameters = array(
                            'apikey' => '', //Your API KEY
                            'number' => $rowsusr->user_phone,
                            'message' => $txt,
                            'sendername' => 'SEMAPHORE'
                        );
                        curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
                        curl_setopt( $ch, CURLOPT_POST, 1 );

                        //Send the parameters set above with the request
                        curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );

                        // Receive response from server
                        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
                        $output = curl_exec( $ch );
                        curl_close ($ch);

                        //Show the server response
                        echo $output;
                    }
                }
            }
        }
    }

    // Update Device (Monitoring Host - Max Min)
    // ----------------------
    if ($_GET['mode'] == 'dupdatehost2')
    {
        // temp
        if ($_GET['dval'] == "0")
        {
            $sql="update device_tbl set dev_temp_max = dev_temp_max + 1 where id = '" . $_GET['did'] . "'
            "; 
            $rsgetacc=mysqli_query($connection,$sql);
        }

        if ($_GET['dval'] == "1")
        {
            $sql="update device_tbl set dev_temp_max = dev_temp_max - 1 where id = '" . $_GET['did'] . "'
            "; 
            $rsgetacc=mysqli_query($connection,$sql);
        }

        if ($_GET['dval'] == "2")
        {
            $sql="update device_tbl set dev_temp_min = dev_temp_min + 1 where id = '" . $_GET['did'] . "'
            "; 
            $rsgetacc=mysqli_query($connection,$sql);
        }

        if ($_GET['dval'] == "3")
        {
            $sql="update device_tbl set dev_temp_min = dev_temp_min - 1 where id = '" . $_GET['did'] . "'
            "; 
            $rsgetacc=mysqli_query($connection,$sql);
        }

        // humi
        if ($_GET['dval'] == "4")
        {
            $sql="update device_tbl set dev_humi_max = dev_humi_max + 1 where id = '" . $_GET['did'] . "'
            "; 
            $rsgetacc=mysqli_query($connection,$sql);
        }

        if ($_GET['dval'] == "5")
        {
            $sql="update device_tbl set dev_humi_max = dev_humi_max - 1 where id = '" . $_GET['did'] . "'
            "; 
            $rsgetacc=mysqli_query($connection,$sql);
        }

        if ($_GET['dval'] == "6")
        {
            $sql="update device_tbl set dev_humi_min = dev_humi_min + 1 where id = '" . $_GET['did'] . "'
            "; 
            $rsgetacc=mysqli_query($connection,$sql);
        }

        if ($_GET['dval'] == "7")
        {
            $sql="update device_tbl set dev_humi_min = dev_humi_min - 1 where id = '" . $_GET['did'] . "'
            "; 
            $rsgetacc=mysqli_query($connection,$sql);
        }

        echo "dval: " . $_GET['dval'] . " did: " . $_GET['did'];
    }



    // Update Device (Monitoring Host - Max Min)
    // ----------------------
    if ($_GET['mode'] == 'notiftest')
    {
        $sql="select * FROM user_tbl"; 
        $rsusr=mysqli_query($connection,$sql);
        while ($rowsusr = mysqli_fetch_object($rsusr))
        {
            // email
            {
                $to = $rowsusr->user_email;
                $subject = "Web-Based Monitoring System";
                $txt = "
                            <b>URGENT!</b> <br>
                            adasdasdasdasdasd TESTING
                ";        
                $headers = "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                $headers .= "From: admin@web-based-monthy.com";
                mail($to,$subject,$txt,$headers);
            }

            // sms
            {
                $txt = "WBMONTHY - URGENT!\n\nSet:\nTemp: 100.00c / 100.00c\rRH: 100.00% / 100.00%\n\nDate: 12-23-2033 12:55:55\nActual Temp: 100.00c\nActual RH: 100.00%";  

                $ch = curl_init();
                $parameters = array(
                    'apikey' => '', //Your API KEY
                    'number' => $rowsusr->user_phone,
                    'message' => $txt,
                    'sendername' => 'SEMAPHORE'
                );
                curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
                curl_setopt( $ch, CURLOPT_POST, 1 );

                //Send the parameters set above with the request
                curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );

                // Receive response from server
                curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
                $output = curl_exec( $ch );
                curl_close ($ch);

                //Show the server response
                echo $output;
            }
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