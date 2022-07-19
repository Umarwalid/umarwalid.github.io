<?php

if (isset($_POST['createAccount'])){
    require "mydb.php";
    $username= $_POST['user'];
    $email= $_POST['email'];
    $password= $_POST['password'];
    $passwordRepeat= $_POST['passwordRe'];
    $Firstname= $_POST['fn'];
    $lastname= $_POST['ln'];
    $Cardno= $_POST['cardno'];
    $ccv= $_POST['ccv'];
    $expiryDate= $_POST['expiry'];


    if ( empty( $username) ||  empty( $email) ||   empty( $password) ||   empty($passwordRepeat) ||   empty($Firstname) || 
      empty(  $lastname) ||   empty( $Cardno) ||   empty($ccv) ||   empty(  $expiryDate) ){
          header("Location: ../signup.inc.php?error=emptyfields&user=".$username."&email=".$email."&fn=".$Firstname."&ln=".$lastname."&cardno=".$Cardno."&expiry=".$expiryDate);
          exit();
      }

      else if($password !== $passwordRepeat){
        header("Location: ../signup.inc.php?error=passworddontmatch&user=".$username."&email=".$email."&fn=".$Firstname."&ln=".$lastname."&cardno=".$Cardno."&expiry=".$expiryDate);
        exit();
      }

      else{
        $sql="INSERT INTO account (firstname,lastname,cardno,ccv,expirydate,username,email,Apassword) VALUES(?,?,?,?,?,?,?,?)";
        $stmt= mysqli_stmt_init($con);
        if (!mysqli_stmt_prepare($stmt,$sql)){
          header("Location: ../signup.php?error=sqlerror");
          exit();
        }
      
        else {
          $hashedPwd = password_hash($password,PASSWORD_DEFAULT);
           mysqli_stmt_bind_param($stmt,"ssssssss", $Firstname, $lastname,$Cardno,$ccv,$expiryDate,$username, $email, $hashedPwd );
           mysqli_stmt_execute($stmt);
           header("Location: ../index.php?signup=SUCCESSFULL");
        exit();
      }
    }
      mysqli_stmt_close($stmt);
      mysqli_close($scon);


}
else{
  header("Location: ../createacct.php");
}
