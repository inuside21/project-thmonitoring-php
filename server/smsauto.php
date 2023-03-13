<?php

    // Database
    include("../config/config.php");


    /*
        ======================================
        MODES
        ======================================
    */

    $currentHour = date('H');
    if ($currentHour != 6 && $currentHour != 14 && $currentHour != 22)
    {
        return;
    }

    // auto sms
    // ----------------------
    // notif
    $sql="select * FROM device_tbl"; 
    $rsgetacc=mysqli_query($connection,$sql);
    while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
    {
        // sms
        $sql="select * FROM user_tbl where user_update = '1'"; 
        $rsusr=mysqli_query($connection,$sql);
        while ($rowsusr = mysqli_fetch_object($rsusr))
        {
            // email
            {
                $to = $rowsusr->user_email;
                $subject = "Web-Based Monitoring System";
                $txt = "
                            Temperature and Humidity Monitoring System - Update " . $rowsgetacc->dev_name ." <br><br>
                            
                            Values Set: <br>
                            Temperature: " . $rowsgetacc->dev_temp_max . " Max  / " . $rowsgetacc->dev_temp_min . " Min <br>
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

            // sms
            {
                $txt = "WBMONTHY - Update\n" . $rowsgetacc->dev_name . "\n\nSet:\nTemp: " . $rowsgetacc->dev_temp_max . "c / " . $rowsgetacc->dev_temp_min . "c\rRH: " . $rowsgetacc->dev_humi_max . "% / " . $rowsgetacc->dev_humi_min . "%\n\nDate: " . $dateResult . "\nActual Temp: " . $rowsgetacc->dev_temp . "c\nActual RH: " . $rowsgetacc->dev_humi . "%"; 

                $ch = curl_init();
                $parameters = array(
                    'apikey' => 'cb74d2b59aebce2fe78f5d359d270dbb', //Your API KEY
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
    
    echo "ok";


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