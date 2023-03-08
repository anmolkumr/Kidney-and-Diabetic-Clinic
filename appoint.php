<?php
require_once 'best.php';
$name = $email = $phone = $age = $addr = $adate = $desc = "";
$nameErr = $emailErr = $phoneErr = $ageErr = $addrErr = $adateErr = $descErr = "";
$min = 0;
$max = 200;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
   if(empty($_POST["name"]))
      {
        $nameErr = "You Must give a Name for Appointment";
      }
    else {
      $name =  test_input($_POST["name"]);
      if(!preg_match("/^[a-zA-Z ]*$/",$name))
      {
        $nameErr = "Only letters and Space is Allowed";
      }
      }
      /*
      if (empty($_POST["email"])) {
        $emailErr = "Email is Required";
      }
      else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid E-mail Format";
        }
      }*/
      if (empty($_POST["phone"])) {
        $phoneErr = "Phone is Required";
      }
      else if(!is_numeric(test_input($_POST["phone"]))) {
      $phoneErr = "Data entered was not numeric";
  } else if(strlen(test_input($_POST["phone"])) != 10) {
      $phoneErr = "The number entered was not 10 digits long";
  }else {
    $phone = test_input($_POST["phone"]);
    }

      if (empty($_POST["age"])) {
        $ageErr = "Age is Required";
        }
      else {
        $age = test_input($_POST["age"]);
        if (filter_var($age,FILTER_VALIDATE_INT,array("options" => array("min_range"=>$min,"max_range" => $max)))=== false) {
          $ageErr = "Only Digits from 0 to 200 are  Allowed";

        }
      }
      if (empty($_POST["addr"])) {
        $addrErr = "Address is Required";
      }

      else {
        $addr = test_input($_POST["addr"]);
      }
      if (empty($_POST["date"])) {
        $adateErr = "Date is Mandatory";
  }

  else {
    $adate = test_input($_POST["date"]);
  }

  if (empty($_POST["desc"])) {
    $descErr = "Description is Required";
  }
  else {
  $desc = test_input($_POST["desc"]);
  }

  if(empty($nameErr) && empty($emailErr) && empty($phoneErr) && empty($ageErr) && empty($addrErr) && empty($dateErr) && empty($descErr))
  {

    $sql = "INSERT INTO appointment (name,email,phone,age,addr,date,description) VALUES ('$name','$email','$phone','$age','$addr','$adate','$desc')";

    if ($conn->query($sql) === TRUE) {
        header("location: success.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }

}
  function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Appointment Booking | Kidney and Diabetic Clinic </title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     <meta name="description" content="Best Kdney and Diabetes Transplant and Dialysis Clinic In Muzaffarpur with best Nephologist inState of Bihar Dr. Dharmendra Prasad.">
  <meta name="keywords" content="Diabetes,Kidney,Chronic,transplantation,Transplant,Dialysis,">
  <link rel="stylesheet"href="./style/icon/flaticon.css">
    <link rel="stylesheet"href="./style/global.css"type="text/css">
<link rel="stylesheet"href="./style/noname(3).css">
<style type="text/css">

input[type=text], textarea {

outline: none;
border: 1px solid #DDDDDD;
transition:0.3s;
}
input[type=text]:focus, textarea {

outline: none;
border: 1px solid #111;
transition:0.3s;
}


</style>
</head>
<script>
  $(document).ready(function(){
  $("#toggle").click(function(){
  $("#menu").slideToggle("fast");
  });
  });



  </script>

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

    <br>
  <h2>    Book an Appointment</h2>


    <form class="appointment_booking" acion="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
<div class="book_it_now">
  <i class="material-icons"style="float:left">person_outline</i> <input type="text" name="name" value="<?php echo $name;?>"placeholder="Please, Enter Your Name"id="name"><br>
  <span class="error"><?php echo $nameErr;?> </span>
  <br>
  <i class="material-icons"style="float:left">mail_outline</i> <input type="text" name="email" value="<?php echo $email ;?>"placeholder="Enter Your E-mail">
  <br>
  <span class="error"><?php echo $emailErr;?> </span>
  <br>

  <i class="material-icons"style="float:left">dialpad</i> <input type="text" name="phone" value="<?php echo $phone;?>"placeholder="Enter Your Phone Number">  <br>
  <span class="error"><?php echo $phoneErr;?> </span>
  <br>
  <i class="material-icons"style="float:left">face</i><input type="text" name="age" value="<?php echo $age;?>"placeholder="Enter your age (0 to 200 allowed)"><br>
  <span class="error"><?php echo $ageErr;?> </span>
  <br>
  <i class="material-icons"style="float:left">person_pin_circle</i> <input type="text" name="addr" value="<?php echo $addr;?>"placeholder="Your Address"><br>
  <span class="error"><?php echo $addrErr;?> </span>
  <br>
  <i class="material-icons"style="float:left">date_range</i><input type="date" name="date" value="<?php echo $adate;?>"> <br>
  <span class="error"><?php echo $adateErr;?> </span>
  <br>
  DESCRIPTION:<br>
   <textarea name="desc" rows="5" cols="40" value="<?php echo $desc;?>"placeholder="Please! Give a Brief Description"></textarea><br>
  <span class="error"><?php echo $descErr;?> </span>
  <br>
  <input type="submit" name="submit" onclick="myFunction()" value="Book Appointment">
<br><br>

<?php
date_default_timezone_set("Asia/Kolkata");
echo "Appointment will be Booked at ".date("h:i:sa")." on ".date("l").",".date("d/m/Y");
?>
</div>
<br><br>


<div id="snackbar"style="">Proccessing Appointment Form...</div>
    </form>
    <br>
    <div class="footer-down">
    <br>
    <br>
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

    <script>
function myFunction() {
    var x = document.getElementById("snackbar");
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
</script>

  <script >
  function myNavi(x) {
  x.classList.toggle("change");
  }
  </script>


  </body>
</html>