<?php

$conn =  mysqli_connect('localhost', 'root', '1234567', 'trytwo');

if (isset($_POST['transfer'])) {


  $accnumber2 = $_POST['accnumber2']; //your account number(sender) from
  $accnumber = $_POST['accnumber']; //account no. to be transerred(reciever) to
  $amount = $_POST['amount'];
  $pwd = $_POST['pwd'];

  date_default_timezone_set('Asia/Kolkata');
  $presentdate = date("d/m/Y");
  $presenttime = date("H:i:s");



  //gives password of senders account number
  $query11 = "SELECT Password  FROM accounttable WHERE AccountNumber='$accnumber2'";
  $manish11 = mysqli_query($conn, $query11);
  while ($row11 = mysqli_fetch_array($manish11)) {
    echo $row11['Password'];
    $password = $row11['Password'];
  }


  if (empty($accnumber) || empty($amount) || empty($pwd)) {

    header("Location: transfer.php?error=emptyfields");
    exit();
    //echo "Empty Fields Not Allowed";
  } elseif ($amount <= 0) {
    header("Location: transfer.php?error=invalidamount&accnumber=" . $accnumber);
    exit();
  } elseif (!is_numeric($amount)) {
    header("Location: transfer.php?error=balancecantbealphabets");
    exit();
  } elseif ($password != $pwd) {
    header("Location: transfer.php?error=invalidpassword");
    exit();
  } else {
    //to check if these account numbers are valid or not
    $query = "SELECT AccountNumber  FROM accounttable WHERE AccountNumber='$accnumber'";
    $manish = mysqli_query($conn, $query);

    $query3 = "SELECT AccountNumber  FROM accounttable WHERE AccountNumber='$accnumber2'";
    $manish3 = mysqli_query($conn, $query3);

    if (mysqli_num_rows($manish) > 0 && mysqli_num_rows($manish3) > 0) {
      //formality condition
      if (mysqli_num_rows($manish)) {
        $query2 = "SELECT Balance FROM accounttable where AccountNumber='$accnumber2'";
        $manish2 = mysqli_query($conn, $query2);

        //to subtract from senders account
        $query6 = "SELECT Balance  FROM accounttable WHERE AccountNumber='$accnumber2'";
        $manish6 = mysqli_query($conn, $query6);
        while ($row2 = mysqli_fetch_array($manish6)) {
          echo $row2['Balance'];
          $int2 = (int)$row2['Balance'];
          echo "$int2";
          if ($int2 > $amount) {
            $int2 = $int2 - $amount;
            echo $int2;
          } else {
            header("Location: transfer.php?error=balancebecomeneg");
            exit();
          }
          $query7 = "UPDATE accounttable SET Balance=$int2 WHERE AccountNumber='$accnumber2'";
          $manish7 = mysqli_query($conn, $query7);
        }
        //to add to recievers account
        $query4 = "SELECT Balance  FROM accounttable WHERE AccountNumber='$accnumber'";
        $manish4 = mysqli_query($conn, $query4);
        while ($row = mysqli_fetch_array($manish4)) {
          echo $row['Balance'];
          $int = (int)$row['Balance'];
          echo "$int";
          $int = $amount + $int;
          echo $int;
          if ($int < $amount) {
            $int = $int + 0;
          }
          $query5 = "UPDATE accounttable SET Balance=$int WHERE AccountNumber='$accnumber'";
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
            // $row['Balance'] refers to balance in account of entered account number.
            header("Location: transfer.php?error=insufficientbankbalance");
            exit();
          } else {
            echo " ";
          }
        }

       
      }
    } else {
      header("Location: transfer.php?error=invalidid");
      exit();
    }
  }
} else {
  

}
while(1==1){
$query55 = "INSERT INTO transactions (fromaccount,amounttransferred,toaccount,dateoftrans,timeoftrans) VALUES ('$accnumber2','$amount','$accnumber','$presentdate','$presenttime')";
$manish55 = mysqli_query($conn, $query55);
echo "$manish55";
//header("Location: transfer.php?error=noerror");
exit();
}



?>