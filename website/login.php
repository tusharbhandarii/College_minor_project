<?php session_start();
    $_SESSION['un']="";
?>

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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

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
  <?php
        $con=mysqli_connect("localhost","root","","demoproject");
            if(!$con)
            {
            echo "error in connection";
            }
    ?>

  <section class="contact_section layout_padding">
    <div class="contact_bg_box">
      <div class="img-box">
        <img src="images/contact-img2.jpg" alt="">
      </div>
    </div>
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Login Details
        </h2>
      </div>
      <div class="">
        <div class="row">
          <div class="col-md-7 mx-auto">
            <form method="POST">
              <div class="contact_form-container">
                <div>
                  <div>
                    <input type="email" placeholder="Email " name="email"/>
                  </div>

                     <div>
                        <input type="text" placeholder="Password" name="password"/>
                    </div>


                  <div class="btn-box ">
                    <button type="submit" name="btn">
                       login 
                    </button>
                  </div>
                  <div class="btn-box ">
                    <a style="color: white;" href="register.php">New Here? Register Now</a>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
   <!-- Embedded JavaScript -->
        <script>
          function validateForm() {
            const email = document.querySelector("input[name='email']").value;
            const password = document.querySelector("input[name='password']").value;

            if (!email.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)) {
              alert("Please enter a valid email.");
              return false;
            }

            if (password.length < 6) {
              alert("Password must be at least 6 characters long.");
              return false;
            }

            return true;
          }
        </script>
        
        <?php
            if(isset($_POST['btn']))
            {
                $email=$_POST['email'];
                $password=$_POST['password'];
                $logincheck="select * from customer where email='$email' and password='$password'";
                $rescheck=mysqli_query($con,$logincheck);
                $rowcount=mysqli_num_rows($rescheck);
                if($rowcount>0)
                {
                    $_SESSION['un']=$email;
                    echo "<script>
                    alert('successfull login');
                    window.location.href='index.php';
                    </script>";
                }
                else
                {
                    echo "<script>
                        alert('unsuccessfull login');
                        window.location.href='register.php';
                        </script>";
                }
            }
        ?>

  <!-- end contact section -->
  <footer class="container-fluid footer_section">
    <p>
      &copy; <span id="currentYear"></span> All Rights Reserved. 
    </p>
  </footer>

  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/custom.js"></script>
</body>

</html>