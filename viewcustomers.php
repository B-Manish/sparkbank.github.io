<?php
require "header.php";
?>


<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Spark Bank</a>
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

  <style>
    .heading {
      margin-left: 550px;
      font-size: 60px;
      margin-top: 80px;
    }

    .ttt {

      margin-top: 70px;
      margin-left: 250px;
      margin-right: 200px;

      font-size: 20px;
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
      margin-top: 55px;
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

  <div class="heading">
    Customer Details
  </div>

  <div class="ttt">

    <table class="table">
      <thead class="thead-light">
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Name</th>
          <th scope="col">Email-id</th>
          <th scope="col">Phone No.</th>
          <th scope="col"> </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>C Manish</td>
          <td>manish@gmail.com</td>
          <td>9177453476</td>

          <td>
            <form action="one.php" method="post">
              <button onclick="location.href = 'one.php';" type="submit" name="1" id="1" class="btn btn-primary" method="post">View Details</button><br>
            </form>
          </td>
        </tr>

        <tr>
          <th scope="row">2</th>
          <td>Dhoni</td>
          <td>dhoni@gmail.com</td>
          <td>9874552856</td>

          <td>
            <form action="two.php" method="post">
              <button onclick="location.href = 'two.php';" type="submit" name="2" id="2" class="btn btn-primary" method="post">View Details</button><br>
            </form>
          </td>
        </tr>

        <tr>
          <th scope="row">3</th>
          <td>Virat</td>
          <td>virat@gmail.com</td>
          <td>9312876421</td>

          <td>
            <form action="three.php" method="post">
              <button onclick="location.href = 'three.php';" type="submit" name="2" id="2" class="btn btn-primary" method="post">View Details</button><br>
            </form>
          </td>
        </tr>

        <tr>
          <th scope="row">4</th>
          <td>Williamson</td>
          <td>williamson@gmail.com</td>
          <td>9625417853</td>

          <td>
            <form action="four.php" method="post">
              <button onclick="location.href = 'four.php';" type="submit" name="2" id="2" class="btn btn-primary" method="post">View Details</button><br>
            </form>
          </td>
        </tr>

      </tbody>
    </table>

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




</body>





<footer class="page-footer font-small blue">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
  </div>
  <!-- Copyright -->

</footer>


</html>