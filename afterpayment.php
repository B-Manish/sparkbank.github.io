<?php
require "header.php";
?>
<style>
    .s {

        margin-top: 300px;
        margin-left: 650px;
        color: green;
        font-size: 60px;
    }

    .sidenav {
      height: 100%;
      width: 200px;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: #111;
      overflow-x: hidden;
      padding-top: 20px;
      margin-top: 73px;
    }

    .sidenav a {
      padding: 6px 6px 6px 16px;
      text-decoration: none;
      font-size: 20px;
      color: #818181;
      display: block;
    }

    .sidenav a:hover {
      color: #f1f1f1;
    }

    .main {
      margin-left: 200px;
      /* Same as the width of the sidenav */
    }

    @media screen and (max-height: 450px) {
      .sidenav {
        padding-top: 15px;
      }

      .sidenav a {
        font-size: 18px;
      }
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Batchu Manish</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item active">
                    <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                </li>

                <a class="nav-link" href="transferstable.php">View Transactions <span class="sr-only">(current)</span></a>


            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div class="progress">
        <div class="progress-bar bg-info progress-bar-striped" style="width:100%"></div>
    </div>

    <div class="sidenav">
    <a href=""><img src="b.jpg" width="50" height="50" class="d-inline-block align-top" alt=""></a>
    <a href="#"></a>
    <a href="#"></a>
    <a href="#"></a>

    <a href="viewcustomers.php">View Customers</a>
    <a href="#">View a customer</a>
    <a href="#">Transfer Amount</a>
    <a href="#">View Transfers</a>
  </div>

    <div class="s">
        SUCCESS<br>

    </div>
</body>


<?php

session_start();

$conn =  mysqli_connect('localhost', 'root', '1234567', 'trytwo');


if (isset($_POST['t'])) {

    date_default_timezone_set('Asia/Kolkata');
    $presentdate = date("d/m/Y");
    $presenttime = date("H:i:s");

    if ($_SESSION['from'] == "m1" && $_SESSION['to'] == "d2") {

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
            if ($int2 >= $amount) {
                $int2 = $int2 - $amount;
            } elseif ($int2 == 0) {
                $amount = $amount;
                header("Location: to.php?error=balancenil");
                exit();
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
    } elseif ($_SESSION['from'] == "m1" && $_SESSION['to'] == "v3") {

        $fromaccount = "m1";
        $toaccount = "v3";
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
    } elseif ($_SESSION['from'] == "m1" && $_SESSION['to'] == "w4") {

        $fromaccount = "m1";
        $toaccount = "w4";
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





    /////////////////////////////////////////////////////////////////////////////////





    elseif ($_SESSION['from'] == "d2" && $_SESSION['to'] == "m1") {

        $fromaccount = "d2";
        $toaccount = "m1";
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
    } elseif ($_SESSION['from'] == "d2" && $_SESSION['to'] == "v3") {

        $fromaccount = "d2";
        $toaccount = "v3";
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
    } elseif ($_SESSION['from'] == "d2" && $_SESSION['to'] == "w4") {

        $fromaccount = "d2";
        $toaccount = "w4";
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

    ////////////////////////////////////////////////////////////////////////////////////




    elseif ($_SESSION['from'] == "v3" && $_SESSION['to'] == "m1") {

        $fromaccount = "v3";
        $toaccount = "m1";
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
    } elseif ($_SESSION['from'] == "v3" && $_SESSION['to'] == "d2") {

        $fromaccount = "v3";
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
    } elseif ($_SESSION['from'] == "v3" && $_SESSION['to'] == "w4") {

        $fromaccount = "v3";
        $toaccount = "w4";
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

    //////////////////////////////////////////////////////




    elseif ($_SESSION['from'] == "w4" && $_SESSION['to'] == "m1") {

        $fromaccount = "w4";
        $toaccount = "m1";
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
    } elseif ($_SESSION['from'] == "w4" && $_SESSION['to'] == "d2") {

        $fromaccount = "w4";
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
    } elseif ($_SESSION['from'] == "w4" && $_SESSION['to'] == "v3") {

        $fromaccount = "w4";
        $toaccount = "v3";
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

    ///////////////////////////////////////////////////////////////////////////////////////////////////////
    while (1 == 1) {
        $query55 = "INSERT INTO transactions (fromaccount,amounttransferred,toaccount,dateoftrans,timeoftrans) VALUES ('$fromaccount','$amount','$toaccount','$presentdate','$presenttime')";
        $manish55 = mysqli_query($conn, $query55);
        //echo "$manish55";
        //header("Location: transfer.php?error=noerror");
        exit();
    }


    //endendendendendendendendendendendend
}

?>




<footer>

</footer>


</html>