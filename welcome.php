<?php
// Initialize the session
session_start();

// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: error.html");
  exit;
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
    <title>Welcome</title>
   <link rel="stylesheet" href="./style/noname(3).css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; 
      
        
        }.logout{
        padding:10px;
        background:red;
        color:#fff;
        text-decoration:none;
        }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION['username']); ?></b>. Here Your Lab Tests Will Appear.</h1>
    </div><br><br>
    <p><a href="logout.php" class="logout">Sign Out of Your Account</a></p>
    <br><br><br><br>
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
    <a href="whatsapp://send?phone=918002106713&text=Hello"class="whatsapp">
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
</body>
</html>