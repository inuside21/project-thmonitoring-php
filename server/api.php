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
        $sql="select * FROM device_tbl where id = '" . $_POST['did'] . "'"; 
        $rsgetacc=mysqli_query($connection,$sql);
        while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
        {
            JSONSet("ok", "", "", $rowsgetacc);
        }

        // result
        JSONSet("error", "Device Error", "Id invalid" . $_POST['did']);
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