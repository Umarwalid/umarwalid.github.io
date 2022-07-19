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
<div class=Details>
<p class="labelstyle" style="text-align: center;"> ACCOUNT DETAILS</p>


<div class="input">
<label class="labelstyle" for="fn">Firstname: </label>  
<div type="text" class="form-control" name="ln" style="float: left;width: 700px;height: 139px;background: #D6D6D6;border-radius: 10px; font-size:100px;"
alue="" disabled >
 <?php 
echo "<p style=';
font-family: Roboto;
font-style: normal;
font-weight: normal;
font-size: 64px;
line-height: 75px;
color: #000000;'>".$_SESSION['userfn'];"</p>";
?>
 </div>
  
</div>
    
 
<div class="input">
<label class="labelstyle" for="fn">Lastname: </label>  
<div type="text" class="form-control" name="ln" style="float: left;width: 700px;height: 139px;background: #D6D6D6;border-radius: 10px; font-size:100px;"
value="" disabled >
<?php 
echo "<p style=';
font-family: Roboto;
font-style: normal;
font-weight: normal;
font-size: 64px;
line-height: 75px;
color: #000000;'>".$_SESSION['userln'];"</p>";
?>
</div>
  
</div>
      
<div class="input">
<label class="labelstyle" for="fn">Username: </label>  
<div type="text" class="form-control" name="ln" style="float: left;width: 700px;height: 139px;background: #D6D6D6;border-radius: 10px; font-size:100px;"
value="" disabled >
<?php 
echo "<p style=';
font-family: Roboto;
font-style: normal;
font-weight: normal;
font-size: 64px;
line-height: 75px;
color: #000000;'>".$_SESSION['userid'];"</p>";
  ?>
 </div>
  
</div>
    
<div class="input">
<label class="labelstyle" for="fn"> Card Number: </label>  
<div type="text" class="form-control" name="ln" style="float: left;width: 700px;height: 139px;background: #D6D6D6;border-radius: 10px; font-size:100px;"
value="" disabled >
<?php 
echo "<p style=';
font-family: Roboto;
font-style: normal;
font-weight: normal;
font-size: 64px;
line-height: 75px;
color: #000000;'>".$_SESSION['usercard'];"</p>";
  ?>
 </div>
  
 </div>
 <div class="input">
<label class="labelstyle" for="fn">Email Address: </label>  
<div type="text" class="form-control" name="ln" style="float: left;width: 700px;height: 139px;background: #D6D6D6;border-radius: 10px; font-size:100px;"
value="" disabled >
<?php 
echo "<p style=';
font-family: Roboto;
font-style: normal;
font-weight: normal;
font-size: 64px;
line-height: 75px;
color: #000000;'>".$_SESSION['useremail'];"</p>";
  ?>
 </div></div>
    
    

<div class="buttonpos2"> <a href="mainpage.php" class="btn btn-primary mb-3" style="width: 300px; height: 100px;background: #17CB07;
    border-radius: 99px; font-size: 50px;">Back 
     </a></div>
</form>
</div>
