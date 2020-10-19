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

  <div class="progress">
    <div class="progress-bar bg-info progress-bar-striped" style="width:33.33333%"></div>
  </div>

  <style>
    .row {
      margin-top: 60px;
    }

    .mn {
      font-size: 70px;
    }

    .r {
      font-size: 22px;
      margin-top: 80px;
    }

    .r2 {
      font-size: 23px;
      line-height: 43px;
      letter-spacing: 1px;
    }

    .btn-primary {


      padding: 16px 32px;
    }

    .button {


      width: 300px;
      resize: both;
      overflow: auto;
    }
    .custd {
      font-size: 50px;
      margin-bottom: 50px;
    }
  </style>



  <div class="row">

    <div class="col-sm-1"></div>

    <div class="col-sm-4">
    <div class="card" style="width:400px">
        <img class="card-img-top" src="wdp.jpg" alt="Card image" style="width:100%">
        <div class="card-body">
          <h4 class="card-title">Virat</h4>

        </div>

      </div>
    </div>

    <div class="col-sm-6">
      <div class="r">

      <div class="custd">
          Customer Details
        </div>
        <table class="table">
          <thead class="thead-light">
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Email-id</th>
              <th scope="col">Phone No.</th>
              <th scope="col">Branch</th>
              <th scope="col">Account No.</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Virat</td>
              <td>virat@gmail.com</td>
              <td>9312876421</td>
              <td>Jodhpur</td>
              <td>v3</td>
            </tr>

          </tbody>
        </table>


      </div>

      <div class="r2">
        From:Virat<br>
        <div class="button">
          <form action="to.php" method="post">
            <label for="totextbox">To:</label>
            <input type="text" class="form-control" id="totextbox" name="totextbox"><br>
            <button class="btn btn-primary" type="submit" id="toaf3" name="toaf3">Transfer To Account</button>
          </form>
        </div>
      </div>

    </div>

  </div>
</body>



<?php


echo '<style>';
echo '.err{';
echo 'margin-left:650px';

echo '}';
echo '</style>';

echo '<div class="err">';
if (isset($_GET['error'])) {

  if ($_GET['error'] == "invalidname") {
    echo '<p  style="color:red;" class="signupsucess">Invalid Name</p>';
  } elseif ($_GET['error'] == "emptyfields") {
    echo '<p  style="color:red;" class="signupsucess">Empty fields not allowed</p>';
  }
}
echo '</div>';
?>





<footer>
</footer>


</html>