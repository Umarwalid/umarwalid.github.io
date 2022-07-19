<?php require "header.php"; ?>





<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="icon" type="images/x-icon" href="images/favicon.png">
</head> 

<body style="background-color: grey;">
<div class=mainpage>
<p class=accountname> WELCOME</p>
    <?php
   
     echo "<p style='text-align:center ;
     font-family: Roboto;
 font-style: normal;
 font-weight: normal;
 font-size: 64px;
 line-height: 75px;
 color: #FFFFFF;'>".$_SESSION['userid'];"</p>";
    ?>
   
    <div class="balance">

    000000NGN
    </div>




    

    <a href="verify.php"><div class="buttonpos3" style="background: #001988;">  Transfer 
</div></a>

<a href="benefit.html"><div class="buttonpos3" style="background: #008812;"> Beneficaries  
</div></a>

<a href=""><div class="buttonpos3" style="background: #bebb0a;"> Add Funds
</div></a>

<a href="details.php"><div class="buttonpos3" style="background: #244b04;"> Account Details
</div></a>

<a href=""><div class="buttonpos3" style="background: #424f86;"> Contact Us 
</div></a>

<a href="index.php"><div class="buttonpos3" style="background: #f50000;"> Log Out
</div></a>





    </body>