<?php session_start();
   if(empty($_SESSION['un']))
   {
   echo "<script> alert('please Login !!');
          window.location.href ='login.php'; 
          </script>";
}
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
  <!-- Additional Custom CSS for Form Styling -->
  <style>
    /* General Form Styling */
    .contact_form-container {
      background-color: #f7f7f7;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      margin-top: 20px;
    }

    .contact_form-container input[type="text"],
    .contact_form-container input[type="datetime-local"],
    .contact_form-container button {
      width: 100%;
      padding: 10px;
      margin-top: 15px;
      border-radius: 5px;
      border: 1px solid #ddd;
      font-size: 16px;
    }

    /* Input Field Styling */
    .contact_form-container input[type="text"],
    .contact_form-container input[type="datetime-local"] {
      background-color: #fff;
      color: #333;
      transition: border-color 0.3s;
    }

    .contact_form-container input[type="text"]:focus,
    .contact_form-container input[type="datetime-local"]:focus {
      border-color: #3498db;
      outline: none;
    }

    /* Button Styling */
    .btn-box button {
      background-color: #3498db;
      color: #fff;
      border: none;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .btn-box button:hover {
      background-color: #2980b9;
    }
  </style>
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

  <!-- about section -->
        <?php
            $con=mysqli_connect("localhost","root","","demoproject");
            if(!$con)
            {
                echo "error in connection";
            }else{
                $q = $_GET['q'];
                $selectquery = "select * from service where slno='$q' ";
                $res = mysqli_query($con,$selectquery);
                $row = mysqli_fetch_assoc($res); 
                
                $custemail=$_SESSION['un'];
                $selectquery1 = "select * from customer where email='$custemail' ";
                $res1 = mysqli_query($con,$selectquery1);
                $row1 = mysqli_fetch_assoc($res1); 
            }               
        ?>

  <section class="about_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6 px-0">
            <div class="box "> 

              <div class="img-box"> 
                <img src="../uploadimage/servicee/<?php echo $row['image'];?>" width="400px" height="300px">  
              </div>
            </div>
          </div>
        <div class="col-md-6 px-0">
          <div class="detail-box">
            <!-- <div class="heading_container ">
              <h2>
              <?php echo $row['servicename'];?>
              </h2>

              <b><h7>
                Category : <?php echo $row['category'];?>
                </h7><br>
                
                <h7>
                Subcategory : <?php echo $row['subcategory'];?>
                </h7><br><br>
                </b>

                <p>
                <?php echo $row['description'];?>
                </p>
                Rs <?php echo $row['price'];?> 
                <div class="btn-box">
                <input type="submit" href="login.php?q=<?php echo $row['slno'];?>">  
                </a>
                </div>
          </div> -->
          <form method="POST">
              <div class="contact_form-container">
                <div>
                 
                  <div>
                    <input type="text" value="<?php echo $row1['phno'];?>" name="phno" placeholder="phone number"/>
                  </div>
                  <div>
                      <input type="text" value="<?php echo $row1['city'];?>" name="city" placeholder="city"/>
                    </div>
                    <div>
                        <input type="text" value="<?php echo $row1['pincode'];?>" name="pincode" placeholder="pincode"/>
                    </div>
                    <div>
                      <input type="text" value="<?php echo $row1['street'];?>" name="street" placeholder="street"/>
                    </div>
                    <div class="">
                    <input type="text" value="<?php echo $row1['landmark'];?>" class="message_input" name="landmark" placeholder="landmark"/>
                     </div>
                     <div>
                        <input type="datetime-local" placeholder="Booking Date" name="datetime"/>
                    </div>

                  <div class="btn-box ">
                    <button type="submit" name="btn">
                       confirm 
                    </button>
                  </div>
                </div>
              </div>
            </form>
        </div>
      </div>
    </div>
  </section>
            <?php
                        if(isset($_POST['btn'])){
                            $phno=$_POST['phno'];
                            $city=$_POST['city'];
                            $pincode=$_POST['pincode'];
                            $street=$_POST['street'];
                            $landmark=$_POST['landmark'];
                            $datetime=$_POST['datetime'];

                            
                            $editquery = "UPDATE customer SET phno='$phno',city='$city',pincode='$pincode',street='$street',landmark='$landmark' WHERE email='$custemail'";
                            mysqli_query($con, $editquery);

                      //      $insertQuery = "INSERT INTO booking VALUES('','$custemail','$q'," $row['servicename'] ",$servamount,'$datetime','Pending',NOW() ) ";
                            $insertQuery = "INSERT INTO booking VALUES('', '$custemail', '$q', '" . $row['servicename'] . "', '" . $row['price'] . "', '$datetime', 'Pending', NOW())";

                            if(mysqli_query($con, $insertQuery))
                            {
                                echo "<script>
                                 alert('Booking Confirmed !! ');window.location.href='index.php';</script>";
                            }
                            else
                            {
                            echo "<script>
                            alert('Somthing wrong !! ');window.location.href='confirmbooking.php';</script>";
                            }

                        }
                    
                        
            ?>

  <!-- end about section -->

  <!-- info section -->
  <section class="info_section ">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="info_logo">
            <a class="navbar-brand" href="index.html">
              <span>
                Guarder
              </span>
            </a>
            <p>
              dolor sit amet, consectetur magna aliqua. Ut enim ad minim veniam, quisdotempor incididunt r
            </p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_links">
            <h5>
              Useful Link
            </h5>
            <ul>
              <li>
                <a href="">
                  dolor sit amet, consectetur
                </a>
              </li>
              <li>
                <a href="">
                  magna aliqua. Ut enim ad
                </a>
              </li>
              <li>
                <a href="">
                  minim veniam,
                </a>
              </li>
              <li>
                <a href="">
                  quisdotempor incididunt r
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_info">
            <h5>
              Contact Us
            </h5>
          </div>
          <div class="info_contact">
            <a href="" class="">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              <span>
                Lorem ipsum dolor sit amet,
              </span>
            </a>
            <a href="" class="">
              <i class="fa fa-phone" aria-hidden="true"></i>
              <span>
                Call : +01 1234567890
              </span>
            </a>
            <a href="" class="">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              <span>
                demo@gmail.com
              </span>
            </a>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_form ">
            <h5>
              Newsletter
            </h5>
            <form action="#">
              <input type="email" value="Enter your email">
              <button>
                Subscribe
              </button>
            </form>
            <div class="social_box">
              <a href="">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-youtube" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info_section -->




  <!-- footer section -->
  <footer class="container-fluid footer_section">
    <p>
      &copy; <span id="currentYear"></span> All Rights Reserved. Design by
      <a href="https://html.design/">Free Html Templates</a>
    </p>
  </footer>
  <!-- footer section -->

  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/custom.js"></script>
</body>

</html>