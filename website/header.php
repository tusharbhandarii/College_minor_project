<header style="position: sticky; top: 0; z-index: 1000;  color: white;" class="header_section">
<div class="header_top py-2" style="background-color: #444;">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="contact_link-container d-flex gap-3" style="gap: 1.2rem;">
                <a href="#" class="contact_link1 text-white">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    <span>Durgapur, Fuljhor More, 713206</span>
                </a>
                <a href="#" class="contact_link2 text-white">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <span>Call : +91 8765005005</span>
                </a>
            </div>
            <div class="user_section">
                <?php
                if (empty($_SESSION['un'])) {
                ?>
                    <a href="login.php" class="text-white">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span>User Login</span>
                    </a>
                <?php
                } else {
                            // Database connection
                            $con = mysqli_connect("localhost", "root", "", "demoproject");
                            if (!$con) {
                                echo "Error in connection";
                            } else {
                                // Correct the query to avoid space issues
                                $email = mysqli_real_escape_string($con, $_SESSION['un']);
                                $selectquery = "SELECT name FROM customer WHERE email = '$email'";
                                $res = mysqli_query($con, $selectquery);
                    
                                if ($res && mysqli_num_rows($res) > 0) {
                                    $row = mysqli_fetch_assoc($res); 
                                    $name = $row['name'];
                                } else {
                                    $name = "Guest"; // Fallback in case the user is not found
                                }
                            }
                ?>
                            <div style="display: flex; align-items: center; gap: 20px;">
                                <span style="color: #fff;">
                                    Welcome, <?php echo $name; ?>
                                </span>
                                <a href="login.php" class="text-white">
                                    <i class="bi bi-box-arrow-right"></i>
                                </a>
                            </div>
                <?php
                        }
                ?>
            </div>
        </div>
    </div>
    <div class="header_bottom">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg custom_nav-container">
                <a class="navbar-brand text-white" href="index.php">
                    <span>ServeEase</span>
                </a>
                <button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="index.php" >
                                <i class="bi bi-house-door-fill"></i> Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="about.php" >
                                <i class="bi bi-info-circle-fill"></i> About
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="service.php" >
                                <i class="bi bi-tools"></i> Services
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="contact.php" >
                                <i class="bi bi-telephone-fill"></i> Contact Us
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="orders.php" >
                                <i class="bi bi-card-list"></i> My Orders
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
