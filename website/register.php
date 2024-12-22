<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

  <title>Guarder</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,600,700&display=swap" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
    <div class="hero_bg_box">
      <div class="img-box">
        <img src="images/hero-bg2.jpg" alt="">
      </div>
    </div>

        <!--####################### navbar ######################### -->
        <?php include ('header.php')?>
    <!-- end header section -->
  </div>

  <!-- contact section -->

  <section class="contact_section layout_padding">
    <div class="contact_bg_box">
      <div class="img-box">
        <img src="images/contact-img2.jpg" alt="">
      </div>
    </div>
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Registration Form 
        </h2>
      </div>
      <div class="">
        <div class="row">
          <div class="col-md-7 mx-auto">
            <form method="POST" onsubmit="return validateForm()">
              <div class="contact_form-container">
                <div>
                  <div>
                    <input type="text" placeholder="Full Name" name="name" id="name" />
                  </div>
                  <div>
                    <input type="email" placeholder="Email " name="email" id="email"/>
                  </div>
                  <div>
                    <input type="text" placeholder="Phone Number" name="phno" id="phno"/>
                  </div>
                  <div>
                      <input type="text" placeholder="City" name="city" id="city"/>
                    </div>
                    <div>
                        <input type="text" placeholder="Zip / Postal Code" name="pincode" id="pincode"/>
                    </div>
                    <div>
                      <input type="text" placeholder="Street Address" name="street" id="street"/>
                    </div>
                    <div class="">
                    <input type="text" placeholder="Land Mark" class="message_input" name="landmark" id="landmark"/>
                     </div>
                     <div>
                        <input type="text" placeholder="Password" name="password" id="password"/>
                    </div>
                    <div>
                        <input type="text" placeholder="Repassword" name="repassword" id="repassword"/>
                    </div>

                  <div class="btn-box ">
                    <button type="submit" name="btn">
                       register 
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Validation Script -->
  <script>
    function validateForm() {
      const name = document.getElementById("name").value.trim();
      const email = document.getElementById("email").value.trim();
      const phno = document.getElementById("phno").value.trim();
      const city = document.getElementById("city").value.trim();
      const pincode = document.getElementById("pincode").value.trim();
      const street = document.getElementById("street").value.trim();
      const landmark = document.getElementById("landmark").value.trim();
      const password = document.getElementById("password").value;
      const repassword = document.getElementById("repassword").value;

      if (name === "") {
        alert("Name is required.");
        return false;
      }
      if (!email.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)) {
        alert("Please enter a valid email.");
        return false;
      }
      if (!phno.match(/^\d{10}$/)) {
        alert("Please enter a valid 10-digit phone number.");
        return false;
      }
      if (city === "") {
        alert("City is required.");
        return false;
      }
      if (!pincode.match(/^\d{5,6}$/)) {
        alert("Please enter a valid 5 or 6-digit postal code.");
        return false;
      }
      if (street === "") {
        alert("Street address is required.");
        return false;
      }
      if (landmark === "") {
        alert("Landmark is required.");
        return false;
      }
      if (password.length < 6) {
        alert("Password must be at least 6 characters long.");
        return false;
      }
      if (password !== repassword) {
        alert("Passwords do not match.");
        return false;
      }

      return true;
    }
  </script>
        <?php
                include 'db_connection.php';
                    if(isset($_POST['btn'])) 
                    {
                        $name=$_POST['name'];
                        $email=$_POST['email'];
                        $phno=$_POST['phno'];
                        $city=$_POST['city'];
                        $pincode=$_POST['pincode'];
                        $street=$_POST['street'];
                        $landmark=$_POST['landmark'];
                        $password=$_POST['password'];

                        $insertQuery = "INSERT INTO customer VALUES('$name','$email','$phno','$city','$pincode','$street','$landmark','$password')";
                        if(mysqli_query($con,$insertQuery))
                        {
                            "<script>alert('Register Successful ');window.location.href='servicedetails.php';</script>";
                        }else{
                            "<script>alert('Register Unsuccessful ');window.location.href='index.php';</script>";
                        }
                    }
          ?>

  <!-- end contact section -->

  <!-- footer section -->
  <footer class="container-fluid footer_section">
    <p>
      &copy; <span id="currentYear"></span> All Rights Reserved. 
    </p>
  </footer>
  <!-- footer section -->

  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/custom.js"></script>
</body>

</html>