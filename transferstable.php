<?php
require "header.php";
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
          <a class="nav-link" href="transferstable.php">View Transactions <span class="sr-only">(current)</span></a>
        </li>

      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>

  <div class="h">
    <h1>Transactions</h1>
  </div>

  <style>
    #customers {
      border-collapse: collapse;
      width: 80%;
    }

    #customers td,
    #customers th {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    #customers tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    #customers tr:hover {
      background-color: #ddd;
    }

    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #4CAF50;
      color: white;
    }



    #customers2 {
      border-collapse: collapse;
      width: 80%;
    }

    #customers2 td,
    #customers2 th {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    #customers2 tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    #customers2 tr:hover {
      background-color: #ddd;
    }

    #customers2 th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #4CAF50;
      color: white;
    }
    .h{
      margin-left:600px;
      margin-top:30px;
    }
  </style>




</body>

<?php

$conn =  mysqli_connect('localhost', 'root', '1234567', 'trytwo');

$query = "SELECT * FROM transactions";
$result = mysqli_query($conn, $query);
$numrow = mysqli_num_rows($result);


echo '<style>';

echo '.top{';
echo 'margin-left:90px';
echo '}';

echo '.top2{';
echo 'margin-left:90px';
echo '}';

echo '</style>';

echo '<div class="top">';
echo '<table id="customers2" >';

echo '<tr>';
echo '<th style="width:20%">From </th>';
echo '<th style="width:20%">Amount</th>';
echo '<th style="width:20%">To </th>';
echo '<th style="width:20%">Date</th>';
echo '<th style="width:20%">Time</th>';
echo '</tr>';

echo '</table >';
echo '</div>';

if ($numrow > 0) {


  while ($row = mysqli_fetch_assoc($result)) {



    echo '<div class="top2">';
    echo '<table id="customers" >';

    echo '<tr>';
    echo '<td style="width:20%">' . $row['fromaccount'] . '</td>';
    echo '<td style="width:20%">' . $row['amounttransferred'] . '</td>';
    echo '<td style="width:20%">' . $row['toaccount'] . '</td>';
    echo '<td style="width:20%">' . $row['dateoftrans'] . '</td>';
    echo '<td style="width:20%">' . $row['timeoftrans'] . '</td>';
    echo '</tr>';

    echo '</table>';
    echo '</div>';
  }
} else {
  echo " ";
}
mysqli_close($conn);


?>




<footer>
</footer>


</html>