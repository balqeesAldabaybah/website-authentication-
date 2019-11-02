<?php 
    include 'db_connection.php';
    
    if(isset($_POST['login-submit'])){
        $conn = openConn();

        $username =  $_POST['uname'];
        $pass =  $_POST['psw'];

        $sql = "SELECT * FROM users WHERE uidUsers =? or emailusers=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location : signup.php?error=sqlerror");
            exit();
        }
        else{
             mysqli_stmt_bind_param($stmt,"ss",$username,$username);
             mysqli_stmt_execute($stmt);
             $result = mysqli_stmt_get_result($stmt);
           
             if($row = mysqli_fetch_assoc($result)){
                $pwdCheck = password_verify($pass,$row['pwdUsers']);
                
                 if($pwdCheck == false){
                    header("location: login.html?error=wrongpwd");
                     exit();
                 }elseif($pwdCheck == true){
                     session_start();
                     $_SESSION['userid'] = $row['idUsers'];
                     $_SESSION['useruid'] = $row['uidUsers'];

                     header("location: index.html?login=success");
                     exit();
                 }else{
                    header("location: login.html?error=wrongpwd");
                    exit();
                 }
            }
             else{
                header("location: login.html?error=wrongpwd");
                exit();
             }
        }

    }
   else{
       header('location:signup.php');
       exit();
   }

    closeConn($conn);

?>