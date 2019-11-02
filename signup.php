<link rel="stylesheet" href="loginCss.css">

<form action="/practice/signup.inc.php" method="post">
        <div class="container">
        <?php
        
    if(isset($_GET['error'])){
        if($_GET['error'] == "invalidmailuid"){
            echo'<p> invalid email or username </p>';
        }
        elseif($_GET['error'] == "invalidmail"){
            echo'<p> invalid email  </p>';
        }
        elseif($_GET['error'] == "invaliduid"){
            echo'<p> invalid username  </p>';
        }
        elseif($_GET['error'] == "passcheck"){
            echo"<p> password doesn't match  </p>";
        }
        elseif($_GET['error'] == "sqlerror"){
            echo"<p> server error  </p>";
        }
        elseif($_GET['error'] == "usertaken"){
            echo"<p> username is taken  </p>";
        }
    }
    elseif(isset($_GET['signup'])){
        if($_GET['signup'] == "sucess")
        echo "<p> signup sucessfully   </p>";
    }
   
?>
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>

            <label for="uname"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <label for="psw"><b>Repeat password</b></label>
            <input type="password" placeholder="Repeat password" name="re-psw" required>


            <button type="submit" name="signup-submit">Sign Up</button>
            <label>
                <!-- <input type="checkbox" checked="checked" name="remember"> Remember me -->
                <center><a href="login.html" > Login </a> </center>
            </label>
        </div>
    </form>