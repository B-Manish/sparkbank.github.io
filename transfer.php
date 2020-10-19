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
</body>
<h1>Transfer Between accounts</h1>

<form action="transferr.php" method="post">

  <label for="amount"> Account No:</label>
  <input type="amount" id="accnumber2" name="accnumber2" autocomplete="off" placeholder="Enter your AccNo."><br><br>



  <label for="accnumber">Transfer to:</label>
  <input type="text" id="accnumber" name="accnumber" autocomplete="off" placeholder="AccNo. to be transferred"><br><br>

  <label for="amount">Amount to be transferred:</label>
  <input type="amount" id="amount" name="amount" autocomplete="off" placeholder="Rs."><br><br>




  <button type="submit" name="transfer" class="btn btn-primary">Transfer</button>
</form>


<?php

require "header.php";




if (isset($_GET['error'])) {

  if ($_GET['error'] == "emptyfields") {
    echo '<p style="color:red;" class="signuperror">Fill in all fields</p>';
  } elseif ($_GET['error'] == "invalidamount") {
    echo '<p style="color:red;" class="signuperror">Enter Valid amount</p>';
  } elseif ($_GET['error'] == "invalidid") {
    echo '<p style="color:red;" class="signuperror">Invalid Account No.</p>';
  } elseif ($_GET['error'] == "insufficientbankbalance0") {
    echo '<p style="color:red;" class="signuperror">NIL Balance</p>';
  } elseif ($_GET['error'] == "insufficientbankbalance") {
    echo '<p style="color:red;" class="signuperror">Insufficient Balance</p>';
  } elseif ($_GET['error'] == "invalidpassword") {
    echo '<p style="color:red;" class="signuperror">Wrong Password Entered</p>';
  } elseif ($_GET['error'] == "balancecantbealphabets") {
    echo '<p style="color:red;" class="signuperror">Invalid Amount Entered</p>';
  } elseif ($_GET['error'] == "balancebecomeneg") {
    echo '<p  style="color:red;" class="signupsucess">Invalid Transaction</p>';
  } elseif ($_GET['error'] == "noerror") {
    echo '<p  style="color:green;" class="signupsucess">Success</p>';
  }
} else {
  echo " ";
  exit();
}


?>


<footer>

</footer>


</html>