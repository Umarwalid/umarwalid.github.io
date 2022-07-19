<?php

if (isset($_POST['login-submit'])){
    require "mydb.php";
    $username= $_POST['user'];
    $password= $_POST['password'];

    if (empty( $username) || empty( $password)){
    header("Location: ../index.php?error=emptyfields");
    exit();
    }
    else{
        $sql= "SELECT * FROM account WHERE username=? OR email=?;";
        $stmt= mysqli_stmt_init($con);
        if (!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../index.php?error=sqlerror");
            exit();
          }
          else {
             mysqli_stmt_bind_param($stmt,"ss", $username,$username );
             mysqli_stmt_execute($stmt);
             $result = mysqli_stmt_get_result($stmt);
             if( $row=mysqli_fetch_assoc( $result)){
                 $pwdcheck= password_verify($password,$row['Apassword']);
                 if( $pwdcheck == false){
                    header("Location: ../index.php?error=wrongpassword");
                    exit();
             }

             else if ($pwdcheck == true){
                 session_start();
                 $_SESSION['userno']= $row['id'];
                 $_SESSION['userid']= $row['username'];
                 $_SESSION['userfn']= $row['firstname'];
                 $_SESSION['userln']= $row['lastname'];
                 $_SESSION['useremail']= $row['email'];
                 $_SESSION['usercard']= $row['cardno'];

                 header("Location: ../mainpage.php?login=SUCCESSFULL");
              exit();
            }
            else{
                header("Location: ../index.php?error=wrongpassword");
                exit();
            }
        }
            
        }
      }
      
}

else{
  header("Location: ../index.php");
}
