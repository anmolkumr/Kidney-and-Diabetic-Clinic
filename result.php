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
  <meta charset="UTF-8">
  <title>Get Your Lab Tests | Kidney and Diabetic Clinic</title>
  <meta name="description" content="Best Kidney and Diabetes Transplant and Dialysis Clinic In Muzaffarpur with best Nephologist in the State of Bihar Dr. Dharmendra Prasad.">
  <meta name="keywords" content="Diabetes,Kidney,Chronic,transplantation,Transplant,Dialysis,">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Droid+Serif:700" rel="stylesheet">
  <link rel="stylesheet"href="./style/noname(3).css"type="text/css">
  <link rel="stylesheet"href="./style/icon/flaticon.css"type="text/css">
  <link rel="stylesheet"href="./style/normalize.css"type="text/css">
  <link rel="stylesheet"href="./style/result.css"type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
    $("#toggle").click(function(){
    $("#menu").slideToggle("fast");
    });
    });
   </script>
</head>
<body>

  <div class="clinic h2"><img src="./images/mylogo.svg" alt="logo">
    &nbsp;Kidney and Diabetic Clinic</div><br>
  <div class="menu-desktop">
    <table style="width:100%;margin:auto;">
      <tr>
        <td>
          <a href="index.html">
          <i class="flaticon-health"></i><br>Home</td>
          </a>
        <td>
          <a href="appoint.php">
          <i class="flaticon-appointment"></i><br>Appointment</a></td>
        <td>
          <a href="location.html">
          <i class="flaticon-placeholder"></i><br>location</a></td>
        <td>
          <a href="about.html">
          <i class="flaticon-customer-service"></i><br>About</a></td>
        <td>
          <a href=result.php>
          <i class="flaticon-three-test-tubes"></i><br>Test Results</a></td>
      </tr>
    </table>

  </div>
  <div class="mob-menu">

    <div id="tog"><a href="index.html" style="Color:#fff;">Kidney and Diabetic Clinic</a>
    <div class="cont" onclick="myNavi(this)">
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
    	<a href="result.php" ><li>Test Results</li></a>

    </div><br>
  </div><br>
  <div class="box">
    <div class="large">Please! Login First</div>
    <div class="input">

   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
     <div class="username<?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
        <input type="text" name="username" autocomplete="false" value="<?php echo $username; ?>"placeholder="Your Patient Id.">
        <br><span class="help-block"><?php echo $username_err; ?></span>
    </div><br><br>

    <div class="username<?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
        <input type="text" name="password"placeholder="Password">
        <br><span><?php echo $password_err; ?> </span>
    </div>
    <div class="username">
        <input type="submit" class="submit" value="Get Lab Tests">
    </div>
    <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
 </form>
</div>
</div>
 <div class="footer-down"><br><br>
  <div class="follow" style="text-align:center;">Follow us on</div>
    <br><br>
    <div class="followitem">
      <a href="https://www.facebook.com/dharmendrapd"class="fb">
      <i class="flaticon-facebook"></i></a>
      <a href="https://goo.gl/hFJv1F"class="gp">
      <i class="flaticon-google-plus"></i></a>
      <a href="https://www.twitter.com"class="tweet">
      <i class="flaticon-twitter"></i></a>
      <a href="whatsapp://send?text=*Kidney and Diabetic Clinic* https://www.kidneydiabetic.cf/"class="whatsapp" >
      <i class="flaticon-whatsapp"></i></a>
    </div>
    <br><br>
    <div class="follow" style="text-align:center;">Contact Us</div>
   <br>
    <div class="followitem">

    <a href="tel:+916372638944"class="whatsapp">
    <i class="material-icons" style="color:#4caf50">call</i></a>
    <a href="mailto:kidneydiabetic@gmail.com"class="gp">
    <i class="material-icons">mail</i></a>
    <a href="whatsapp://send?phone=916372638944&text=Hello"class="whatsapp">
    <i class="flaticon-whatsapp"></i></a>
    </div><br><br>


    <div class="copyrights">&copy;Content owned by Dr. Dharmendra Prasad |
    Designed & Developed by <a href="https://plus.google.com/117968052456189118254">Anmol Kumar</a>
    </div>
    <br>
    <div id="copyrights">
    <a href="privacy_policy.html">Privacy Policy</a>&nbsp;|&nbsp;<a href="copyright_policy.html">Copyright Policy</a>&nbsp;|&nbsp;
    <a href="hyperlinking_policy.html">Hyperlinking Policy</a>
    </div>
    </div>
   </div><div class="striped">
     </div>

 <script >
 function myNavi(x) {
 x.classList.toggle("change");
 }
 </script>
</body>
</html>
