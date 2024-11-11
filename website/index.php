<?php session_start();
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
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <div class="hero_bg_box">
      <div class="img-box">
        <img src="images/hero-bg3.jpg" alt="">
      </div>
    </div>


    
    <!--####################### navbar ######################### -->
    <?php include ('header.php')?>


    <!-- end header section -->
    <!-- slider section -->
    <section class=" slider_section ">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">


          <div class="carousel-item active">
            <div class="container">
              <div class="row">
                <div class="col-md-7">
                  <div class="detail-box">
                    <h1>
                      Home Service <br>
                      <span>
                      Solutions
                      </span>
                    </h1>
                    <p>
                      T u m a r a &nbsp; K a m &nbsp; H a m &nbsp; K a r e n g a  ,  T u m &nbsp;  B a s s &nbsp; A r a m &nbsp; K a r o
                    </p>
                    <div class="btn-box">
                      <a href="" class="btn-1"> Read more </a>
                      <a href="service.php" class="btn-2">Services</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="container">
              <div class="row">
                <div class="col-md-7">
                  <div class="detail-box">
                    <h1>
                      Home Service <br>
                      <span>
                      Solutions
                      </span>
                    </h1>
                    <p>
                      T u m a r a &nbsp; K a m &nbsp; H a m &nbsp; K a r e n g a  ,  T u m &nbsp;  B a s s &nbsp; A r a m &nbsp; K a r o
                    </p>
                    <div class="btn-box">
                      <a href="" class="btn-1"> Read more </a>
                      <a href="service.php" class="btn-2">Services</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="container">
              <div class="row">
                <div class="col-md-7">
                  <div class="detail-box">
                    <h1>
                      Home Service <br>
                      <span>
                      Solutions
                      </span>
                    </h1>
                    <p>
                      T u m a r a &nbsp; K a m &nbsp; H a m &nbsp; K a r e n g a  ,  T u m &nbsp;  B a s s &nbsp; A r a m &nbsp; K a r o
                    </p>
                    <div class="btn-box">
                      <a href="" class="btn-1"> Read more </a>
                      <a href="service.php" class="btn-2">Services</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>



        </div>
        <div class="container idicator_container">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
        </div>
      </div>
    </section>
    <!-- end slider section -->
  </div>

  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6 px-0">
          <div class="img_container">
            <div class="img-box">
              <img src="images/about-img.jpg" alt="" />
            </div>
          </div>
        </div>
        <div class="col-md-6 px-0">
          <div class="detail-box">
            <div class="heading_container ">
              <h2>
                Who Are We?
              </h2>
            </div>
            <p>
              "We are a dedicated team focused on simplifying home services for you. Our mission is to connect you with skilled professionals who deliver high-quality, reliable, and timely services right at your doorstep. From cleaning and maintenance to repairs and installations, we offer a wide range of services to cater to your every household need. We prioritize customer satisfaction, safety, and transparency in every service we provide, ensuring a seamless and hassle-free experience for you. Trust us to make home management easy, so you can focus on what matters most."
            </p>
            <div class="btn-box">
              <a href="">
                Read More
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- service section -->

  <section class="service_section layout_padding">
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
                    <img src="../uploadimage/servicee/<?php echo $row['image'];?>" width="80px" height="80px">  
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
                
                <a href="servicedetails.php?q=<?php echo $row['slno'];?>">
                Rs <?php echo $row['price'];?> 
                </a>
                </div>
            </div>
            </div>

            <?php
                }
            ?>
        
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

    </div>
  </section>

  <!-- end service section -->


  <!-- client section -->

  <section class="client_section layout_padding">
    <div class="container ">
      <div class="heading_container heading_center">
        <h2>
          What is says our clients
        </h2>
      </div>
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="box">
              <div class="img-box">
                <img src="images/client.png" alt="">
              </div>
              <div class="detail-box">
                <h4>
                  Minim Veniam
                </h4>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                  do eiusmod tempor incididunt ut labore et dolore magna
                  aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                  ullamco laboris nisi ut aliquip
                </p>
              </div>
            </div>
          </div>
          <div class="carousel-item ">
            <div class="box">
              <div class="img-box">
                <img src="images/client.png" alt="">
              </div>
              <div class="detail-box">
                <h4>
                  Minim Veniam
                </h4>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                  do eiusmod tempor incididunt ut labore et dolore magna
                  aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                  ullamco laboris nisi ut aliquip
                </p>
              </div>
            </div>
          </div>
          <div class="carousel-item ">
            <div class="box">
              <div class="img-box">
                <img src="images/client.png" alt="">
              </div>
              <div class="detail-box">
                <h4>
                  Minim Veniam
                </h4>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                  do eiusmod tempor incididunt ut labore et dolore magna
                  aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                  ullamco laboris nisi ut aliquip
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel_btn-box">
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- end client section -->

  <!-- contact section -->

  <section class="contact_section layout_padding">
    <div class="contact_bg_box">
      <div class="img-box">
        <img src="images/contact-bg.jpg" alt="">
      </div>
    </div>
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Get In touch
        </h2>
      </div>
      <div class="">
        <div class="row">
          <div class="col-md-7 mx-auto">
            <form action="#">
              <div class="contact_form-container">
                <div>
                  <div>
                    <input type="text" placeholder="Full Name" />
                  </div>
                  <div>
                    <input type="email" placeholder="Email " />
                  </div>
                  <div>
                    <input type="text" placeholder="Phone Number" />
                  </div>
                  <div class="">
                    <input type="text" placeholder="Message" class="message_input" />
                  </div>
                  <div class="btn-box ">
                    <button type="submit">
                      Send
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

  <!-- end contact section -->

  <!-- team section -->

  <section class="team_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Our Guards
        </h2>
        <p>
          Lorem ipsum dolor sit amet, non odio tincidunt ut ante, lorem a euismod suspendisse vel, sed quam nulla mauris
          iaculis. Erat eget vitae malesuada, tortor tincidunt porta lorem lectus.
        </p>
      </div>
      <div class="row">
        <div class="col-md-4 col-sm-6 mx-auto ">
          <div class="box">
            <div class="img-box">
              <img src="images/t1.jpg" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Martin Anderson
              </h5>
              <h6 class="">
                supervisor
              </h6>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 mx-auto ">
          <div class="box">
            <div class="img-box">
              <img src="images/t2.jpg" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Denny Butler
              </h5>
              <h6 class="">
                supervisor
              </h6>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 mx-auto ">
          <div class="box">
            <div class="img-box">
              <img src="images/t3.jpg" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Nathan Mcpherson
              </h5>
              <h6 class="">
                supervisor
              </h6>
            </div>
          </div>
        </div>
      </div>
      <div class="btn-box">
        <a href="">
          View All
        </a>
      </div>
    </div>
  </section>

  <!-- end team section -->

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