<?php
 
require "header.php";




if(isset($_GET['error'])){

  if($_GET['error']=="emptyfields"){
    echo '<p class="signuperror">Fill in all fields</p>';
  }
  elseif($_GET['error']=="invalidamount"){
  echo '<p class="signuperror">Enter Valid amount</p>';
  }
  elseif($_GET['error']=="invalidid"){
    echo '<p class="signuperror">Invalid id</p>';
    }
    elseif($_GET['error']=="insufficientbankbalance0"){
      echo '<p class="signuperror">NIL Balance</p>';
  }
  elseif($_GET['error']=="insufficientbankbalance"){
    echo '<p class="signuperror">Insufficient Balance</p>';
 }  
    elseif($_GET['error']=="noerror"){
        echo '<p class="signupsucess">Success</p>';
    }

   }
   else{
     echo " ";
     exit();
   }


  ?> 