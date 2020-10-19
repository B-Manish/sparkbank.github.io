<?php
require "header.php";
?>




<?php

//require "one.php";
//require "one.php";


$conn =  mysqli_connect('localhost', 'root', '1234567', 'trytwo');




date_default_timezone_set('Asia/Kolkata');
$presentdate = date("d/m/Y");
$presenttime = date("H:i:s");


//$qqq=$_GET['totextbox'];

//echo "$qqq";



?>

<style>
  .heading {
    margin-left: 500px;
    font-size: 60px;
    margin-top: 100px;
  }

  .ttt {

    margin-top: 70px;
    margin-left: 200px;
    margin-right: 200px;

    font-size: 20px;
  }
</style>

<div class="heading">
  Customer Details
</div>

<div class="ttt">

  <table class="table">

    <thead class="thead-light">
      <tr>
        <th scope="col">From Account</th>
        <th scope="col">Amount</th>
        <th scope="col">To Account</th>
        <th scope="col">Date</th>
        <th scope="col">Time</th>

      </tr>
    </thead>

    <tbody>
      <tr>
        <td>C Manish</td>
        <td>C Manish</td>
        <td>manish@gmail.com</td>
        <td>9177453476</td>
        <td>T Nagar</td>
      </tr>

      <tr>
        <td>C Manish</td>
        <td>Dhoni</td>
        <td>dhoni@gmail.com</td>
        <td>9874552856</td>
        <td>Kamalpur</td>

      </tr>

      <tr>
        <td>C Manish</td>
        <td>Virat</td>
        <td>virat@gmail.com</td>
        <td>9312876421</td>
        <td>Jodhpur</td>

      </tr>

      <tr>
        <td>C Manish</td>
        <td>Williamson</td>
        <td>williamson@gmail.com</td>
        <td>9625417853</td>
        <td>Auckland</td>

      </tr>

    </tbody>
  </table>

</div>

</body>





<footer>
</footer>


</html>