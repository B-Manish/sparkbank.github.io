<?php

$conn =  mysqli_connect('localhost', 'root', '1234567', 'trytwo');



if (isset($_POST['t'])) {

   

        $fromaccount = "m1";
        $toaccount = "d2";
        $amount = $_POST['amt'];


        $query2 = "SELECT Balance FROM accounttable where AccountNumber='$fromaccount'";
        $manish2 = mysqli_query($conn, $query2);

        //to subtract from senders account
        $query6 = "SELECT Balance  FROM accounttable WHERE AccountNumber='$fromaccount'";
        $manish6 = mysqli_query($conn, $query6);

        while ($row2 = mysqli_fetch_array($manish6)) {
            //echo $row2['Balance'];
            $int2 = (int)$row2['Balance'];
            //echo "$int2";
            if ($int2 > $amount) {
                $int2 = $int2 - $amount;
                //echo $int2;
            } else {
                header("Location: to.php?error=balancebecomeneg");
                exit();
            }
            $query7 = "UPDATE accounttable SET Balance=$int2 WHERE AccountNumber='$fromaccount'";
            $manish7 = mysqli_query($conn, $query7);
        }



        //to add to recievers account
        $query4 = "SELECT Balance  FROM accounttable WHERE AccountNumber='$toaccount'";
        $manish4 = mysqli_query($conn, $query4);
        while ($row = mysqli_fetch_array($manish4)) {
            //echo $row['Balance'];
            $int = (int)$row['Balance'];
            //echo "$int";
            $int = $amount + $int;
            //echo $int;
            if ($int < $amount) {
                $int = $int + 0;
            }
            $query5 = "UPDATE accounttable SET Balance=$int WHERE AccountNumber='$toaccount'";
            $manish5 = mysqli_query($conn, $query5);
        }

        //overallbalance
        while ($row2 = mysqli_fetch_array($manish6) || $row = mysqli_fetch_array($manish4)) {
            if ($amount > $int) {
                $int = $int;
                $int2 = $int2;
                $query8 = "UPDATE accounttable SET Balance=$int WHERE AccountNumber='$accnumber'";
                $manish8 = mysqli_query($conn, $query8);
                $query9 = "UPDATE accounttable SET Balance=$int2 WHERE AccountNumber='$accnumber2'";
                $manish9 = mysqli_query($conn, $query9);
            }
        }


        while ($row2 = mysqli_fetch_array($manish2)) {
            //if entered amount is greater than bank balance        
            if ($amount > $row2['Balance']) {
                echo "egg";
            } else {
                echo " ";
            }
        }
    
 


}