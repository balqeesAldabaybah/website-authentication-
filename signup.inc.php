<?php
include 'db_connection.php';
$conn = openConn();

if(isset($_POST['signup-submit'])){
    
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $pass = $_POST['psw'];
    $repass = $_POST['re-psw'];

    
    if(!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z-0-9]*$/",$username)){
        header("location: signup.php?error=invalidmailuid");
        exit();
    }
    else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
         header("location: signup.php?error=invalidmail&uid=".$username);
         exit();
    }
    else if(!preg_match("/^[a-zA-Z-0-9]*$/",$username)){
        header("location : signup.php?error=invaliduid&mail=".$email);
        exit();
    }
    else if($pass !== $repass){
        header("location: signup.php?error=passcheck&uid=".$username."&email=".$email);
        exit();
    }
    else{
        $sql = "SELECT uidUsers FROM users WHERE uidUsers =?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location : signup.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt,"s",$username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            $resultCheck = mysqli_stmt_num_rows($stmt);

            if($resultCheck >0){
                header("location: signup.php?error=usertaken&mail=".$email);
                exit();
            }
            else{
                $sql = "insert into users (uidUsers, emailUsers, pwdusers) values (?,?,?) " ;
                $stmt = mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt,$sql)){
                    header("location: signup.php?error=sqlerror");
                    exit();
                }
                else{
                    $hashpwd = password_hash($pass , PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt,"sss",$username,$email,$hashpwd);
                    mysqli_stmt_execute($stmt);
                    header("location: signup.php?signup=sucess");
                    exit();
                }
            }
        }
    }
}
else{
    header("location : signup.php");
    exit();
}

closeConn($conn);
?>