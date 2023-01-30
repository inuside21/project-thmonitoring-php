<?php

    // Database
    include("config/config.php");

    $output = passthru("python3 runpython.py " . $_POST['dId'] . " " . $_POST['dNum']);
    echo $output;

    $sql="update dut_tbl set dut_val = '" . rand(-5, 5) . "' where dut_id = '" . $_POST['dId'] . "' and dut_num = '" . $_POST['dNum'] . "'"; 
    $rsupdate=mysqli_query($connection,$sql);
    sleep(1);
?>