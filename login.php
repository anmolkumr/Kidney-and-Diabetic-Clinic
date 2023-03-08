<?php
// Include config file
require_once 'config.php';

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = 'Please enter username.';
    } else{
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if(empty(trim($_POST['password']))){
        $password_err = 'Please enter your password.';
    } else{
        $password = trim($_POST['password']);
    }

    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT username, password FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            /* Password is correct, so start a new session and
                            save the username to the session */
                            session_start();
                            $_SESSION['username'] = $username;
                            header("location: welcome.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = 'The password you entered was not valid.';
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = 'No account found with that username.';
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

 <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119385157-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-119385157-1');
</script> 
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     <meta name="description" content="Best Kidney and Diabetes Transplant and Dialysis Clinic In Muzaffarpur with best Nephologist in the State of Bihar Dr. Dharmendra Prasad.">
  <meta name="keywords" content="Diabetes,Kidney,Chronic,transplantation,Transplant,Dialysis,">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script> 
    $(document).ready(function(){
    $("#toggle").click(function(){
    $("#menu").slideToggle("fast");
    });
    });
    
    
    
    </script>
    
    <title>Get Your Lab Tests | Kidney and Diabetic Clinic</title>
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:700" rel="stylesheet">
          <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet"href="./style/design.css"type="text/css">
    
</head>
<body>
  <div class="clinic"><img src="./images/logo.png" alt="logo">Kidney and Diabetic Clinic</div><br> 
<div id="toggle"><a href="index.html" >Kidney and Diabetic Clinic</a>
<div class="container" onclick="myNavi(this)">
  <div class="bar1"></div>
  <div class="bar2"></div>
  <div class="bar3"></div>
</div>
</div>

<div id="menu">

	<a href="index.html" ><li>Home</li></a>
	<a href="appoint.php" ><li>Appointment</li></a>
	<a href="about.html" ><li>About</li></a>
	<a href="location.html" ><li>Location</li></a>
	<a href="login.php" ><li>Test Results</li></a>
	
</div>
<br> <br>
 <div class="login">Get Your Lab Tests Here
    <div class="">
        <p class="prodetail">Please, Provide your Details Here.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="username <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">

                  <input type="text" name="username"value="<?php echo $username; ?>"placeholder="Your Patient Id.">
                  <br><span class="help-block"><?php echo $username_err; ?></span>

            </div>
            <div class="ppassword <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">

                <input type="text" name="password"placeholder="Password">
                <br><span><?php echo $password_err; ?> </span>
            </div>
            <div class="form-group">
                <input type="submit"  value="Get Lab Tests">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>
    </div>
    <br><br><br>
    </div>
    <br><br>
    
    <div class="footer-down">
    <br>
    <br>
    <div class="follow" style="text-align:center;">Follow us on</div>
    <br><br>
    <div class="followitem">
    
    <a href="https://www.facebook.com/dharmendrapd"class="fb">
    <i class="fa fa-facebook-square"></i></a>
    <a href="https://goo.gl/hFJv1F"class="gp">
    <i class="fa fa-google-plus"></i></a>
    <a href="https://www.twitter.com"class="tweet">
    <i class="fa fa-twitter"></i></a>
    <a href="whatsapp://send?text=*Kidney and Diabetic Clinic* https://www.kidneydiabetic.cf/"class="whatsapp" >
    <i class="fa fa-whatsapp"></i></a>
    </div>
    <br><br>
    
    <div class="follow" style="text-align:center;">Contact Us</div>
    <br><br>
    <div class="followitem">
    
    <a href="tel:+916372638944"class="whatsapp">
    <i class="fa fa-phone"></i></a>
    <a href="mailto:kidneydiabetic@gmail.com"class="gp">
    <i class="fa fa-envelope"></i></a>
    <a href="whatsapp://send?phone=916372638944&text=Hello"class="whatsapp">
    <i class="fa fa-whatsapp"></i></a>
    </div><br><br>
    
    <div class="copyrights">&copy;Content owned by Dr. Dharmendra Prasad |
    Designed by <a href="https://plus.google.com/117968052456189118254">Anmol Kumar</a>
    </div>
    <br>
    <div id="copyrights">
    <a href="privacy_policy.html">Privacy Policy</a>&nbsp;|&nbsp;<a href="copyright_policy.html">Copyright Policy</a>&nbsp;|&nbsp;
    <a href="hyperlinking_policy.html">Hyperlinking Policy</a>
    </div>
    </div>
 <script >
 function myNavi(x) {
 x.classList.toggle("change");
 }
 </script>
</body>
</html>