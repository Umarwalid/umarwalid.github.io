<?php
include('database/mydb.php');
 

?>
<html lang="en"> 
<head> 
<meta charset="utf-8"> 
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
<title>initiate</title> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="icon" type="images/x-icon" href="images/favicon.png">
</head>

<body style="background-color: gray;">

<div class ="success">
<h1 style="text-align: center; font-size:50px">TRANSFER TO ACCOUNT NAME:

<?php

 echo "<p style='color:white;'>".$_GET['name']; ;"</p>";
?>

</h1>
<div class="verify">



<h1 style="text-align: center;font-size:50px"> AMOUNT:
<?php

echo "<p style='color:white;'>".$_GET['amount']; ;"</p>";
?>
   NGN</h1>

 
 <h1 style="text-align: center;font-size:50px"> STATEMENT:
 <?php


echo "<p style='color:white;'>".$_GET['reason']; ;"</p>";

?>
<br> <br>SUCCESSFULL
</h1>
 





<div class="buttonpos"><a href="mainpage.php"  class="btn btn-primary mb-3" style="width: 300px; height: 100px;background:#17CB07;
    border-radius: 99px; font-size: 50px;">Back </a>
    </div> 

  
    </div>


</body>
