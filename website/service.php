
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
        <img src="images/hero-bg.jpg" alt="">
      </div>
    </div>
        <!--####################### navbar ######################### -->
        <?php include ('header.php')?>

    <!-- end header section -->
  </div>

  <!-- service section -->

  <section class="service_section layout_padding ">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Our services
        </h2>
      </div>
    <!-- <div class="row">
      <?php
                $con=mysqli_connect("localhost","root","","demoproject");
                if(!$con)
                {
                    echo "error in connection";
                }
                $selectquery="select * from service ";
                $res=mysqli_query($con,$selectquery);
                while($row=mysqli_fetch_assoc($res))
                {
            ?>
            <div class="col-md-4">
              
            <div class="box "> 
            <div class="img-box"> 
              <img src="../uploadimage/servicee/<?php echo $row['image'];?>" width="300px" height="300px">  
            </div>
                <div class="detail-box">
                <h6>
                <?php echo $row['servicename'];?>
                </h6>

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
                <p>
                   Rs <?php echo $row['price'];?>
                </p>
                
                <a href="servicedetails.php?q=<?php echo $row['slno'];?>">
                 Book Now
                </a>
                </div>
            </div>
            </div>

            <?php
                }
            ?>
      </div>
    </div> -->
    <div class="row">
    <?php
        $con = mysqli_connect("localhost", "root", "", "demoproject");
        if (!$con) {
            echo "error in connection";
        }
        
        $selectquery = "SELECT * FROM service";
        $res = mysqli_query($con, $selectquery);
        
        while ($row = mysqli_fetch_assoc($res)) {
    ?>
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm">
            <div class="card-img-top">
                <img src="../uploadimage/servicee/<?php echo $row['image']; ?>" alt="<?php echo $row['servicename']; ?>" class="img-fluid" style="height: 200px; object-fit: cover;">
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['servicename']; ?></h5>
                <p class="card-text">
                    <strong>Category:</strong> <?php echo $row['category']; ?><br>
                    <strong>Subcategory:</strong> <?php echo $row['subcategory']; ?>
                </p>
                <p class="text-muted"><?php echo substr($row['description'], 0, 100); ?>...</p>
                <p class="text-primary fw-bold">Rs <?php echo $row['price']; ?></p>
                <a href="servicedetails.php?q=<?php echo $row['slno']; ?>" class="btn btn-outline-primary btn-sm">View Details</a>
            </div>
            <div class="card-footer">
                <small class="text-muted">Duration: <?php echo $row['duration']; ?> hours</small>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
</div>

  </section>

  <!-- end service section -->

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
              <input type="email" placeholder="Enter your email">
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