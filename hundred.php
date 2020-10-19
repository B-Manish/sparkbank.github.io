<?php
require "header.php";
?>


<?php

$conn =  mysqli_connect('localhost', 'root', '1234567', 'trytwo');




if (isset($_POST['t']) && isset($_POST['toa'])) {



    if ($_POST['totextbox'] == "MS Dhoni") {
        $toaccount = "d2";
    }
    if ($_POST['totextbox'] == "Virat") {
        $toaccount = "v3";
    } else {
        echo "Inadgdadhvalid Name";
    }


    $fromaccount = "m1";
    $toaccount;
    $amount = $_POST['amt'];
} else {
    echo " ";
}




?>








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


                <a class="nav-link" href="transfer.php">Transfer <span class="sr-only">(current)</span></a>


                <li class="nav-item active">
                    <a class="nav-link" href="transferstable.php">View Transactions<span class="sr-only">(current)</span></a>
                </li>

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

    <style>
        .button {
            font-size: 23px;
            line-height: 43px;
            letter-spacing: 1px;
            margin: 150px 50px 0px 400px;
            padding: 50px 30px 50px 80px;
            height: 270px;
            width: 50%;

            width: 300px;
            resize: both;
            overflow: auto;
        }
    </style>




    <?php

    session_start();
    error_reporting(0);
    $conn =  mysqli_connect('localhost', 'root', '1234567', 'trytwo');

    if (isset($_POST['toaf1'])) {
        $fromaccount = "m1";
        if ($_POST['totextbox'] == "MS Dhoni") {
            $toaccount = "d2";
        } elseif ($_POST['totextbox'] == "Virat") {
            $toaccount = "v3";
        } elseif ($_POST['totextbox'] == "Williamson") {
            $toaccount = "w4";
        } else {
            $toaccount = " ";
        }
    }
    if (isset($_POST['toaf2'])) {
        $fromaccount = "d2";
        if ($_POST['totextbox'] == "C Manish") {
            $toaccount = "m1";
        } elseif ($_POST['totextbox'] == "Virat") {
            $toaccount = "v3";
        } elseif ($_POST['totextbox'] == "Williamson") {
            $toaccount = "w4";
        } else {
            $toaccount = " ";
        }
    }
    if (isset($_POST['toaf3'])) {
        $fromaccount = "v3";
        if ($_POST['totextbox'] == "C Manish") {
            $toaccount = "m1";
        } elseif ($_POST['totextbox'] == "MS Dhoni") {
            $toaccount = "d2";
        } elseif ($_POST['totextbox'] == "Williamson") {
            $toaccount = "w4";
        } else {
            $toaccount = " ";
        }
    }
    if (isset($_POST['toaf4'])) {
        $fromaccount = "w4";
        if ($_POST['totextbox'] == "C Manish") {
            $toaccount = "m1";
        } elseif ($_POST['totextbox'] == "Virat") {
            $toaccount = "v3";
        } elseif ($_POST['totextbox'] == "MS Dhoni") {
            $toaccount = "d2";
        } else {
            $toaccount = " ";
        }
    }


    echo "<div class='button'>";
    echo "<form action='afterpayment.php' method='post'>";
    echo   "Transfer <input type='text' class='form-control' id='amt' name='amt' placeholder='Rs.'> from $fromaccount to $toaccount<br>";
    echo  "<button class='btn btn-primary' type='submit' id='t' name='t'>Transfer Amount</button>";
    echo "</form>";
    echo "</div>";
    $_SESSION['from'] =  $fromaccount;
    $_SESSION['to'] = $toaccount;

    ?>



</body>






<?php

$conn =  mysqli_connect('localhost', 'root', '1234567', 'trytwo');




if (isset($_POST['totextbox'])) {

    if ($_POST['totextbox'] == "MS Dhoni") {
        $toaccount = "d2";
    } elseif ($_POST['totextbox'] == "Virat") {
        $toaccount = "v3";
    } else {
    }
}



if (isset($_GET['error'])) {

    if ($_GET['error'] == "balancebecomeneg") {
        echo '<p  style="color:red;" class="signupsucess">Invalid Transaction</p>';
    }
    elseif($_GET['error'] == "balancenil"){
        echo '<p  style="color:red;" class="signupsucess">Insufficient Balance</p>';
    }
    elseif($_GET['error'] == "noerror"){
        echo '<p  style="color:green;" class="signupsucess">Sucess</p>';
    }
}





?>




<footer>

</footer>


</html>