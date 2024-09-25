<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | General Form Elements</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- stylesheet for validation  -->
   <style>
      /* Input valid and invalid states */
      input.is-invalid {
          border-color: red;
      }

      input.is-valid {
          border-color: green;
      }

      /* Error message styling */
      .error-message {
          color: red;
          font-size: 0.9em;
          margin-top: 5px;
      }
   </style>


  
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->

  <?php include ('navbar.php')?>

  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
   
    <?php include ('sidebar.php') ?> 

    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->






            <!-- form start -->
            <form id="technicianForm" method='post' enctype="multipart/form-data">
              <div class="card-body">
              <!-- name -->
              <div class="form-group">
                  <label for="exampleInputName">Technician Name</label>
                  <input name="name" type="text" class="form-control" id="name" placeholder="Enter name">
                  <div class="error-message" id="nameError"></div>
              </div>
              <!-- ph no -->
              <div class="form-group">
                  <label for="exampleInputPhno">Mobile Number</label>
                  <input name="phno" type="text" class="form-control" id="phno" placeholder="Enter number">
                  <div class="error-message" id="phnoError"></div>
              </div>
              <!-- address -->
              <div class="form-group">
                  <label for="exampleInputAddress">Address</label>
                  <input name="address" type="text" class="form-control" id="address" placeholder="Enter address">
                  <div class="error-message" id="addressError"></div>
              </div>
              <!-- email -->
              <div class="form-group">
                  <label for="exampleInputEmail">Email address</label>
                  <input name="email" type="text" class="form-control" id="email" placeholder="Enter email">
                  <div class="error-message" id="emailError"></div>
              </div>
              <!-- specialization -->
              <div class="form-group">
                  <label for="exampleInputSpecialize">Specialization</label>
                  <input name="specialize" type="text" class="form-control" id="specialize" placeholder="Enter specialization">
                  <div class="error-message" id="specializeError"></div>
              </div>
              <!-- image -->
              <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <div class="input-group">
                      <div class="custom-file">
                          <input name="image" type="file" class="custom-file-input" id="image">
                          <label class="custom-file-label" for="image">Choose file</label>
                      </div>
                      <div class="input-group-append">
                          <span class="input-group-text">Upload</span>
                      </div>
                  </div>
                  <div class="error-message" id="imageError"></div>
              </div>
              <!-- password -->
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input name="pass" type="text" class="form-control" id="password" placeholder="Password">
                <div class="error-message" id="passwordError"></div>
              </div>

              <!-- repassword -->
              <div class="form-group">
                  <label for="exampleInputRepassword">Re-enter Password</label>
                  <input type="text" class="form-control" id="repassword" placeholder="Repassword">
                  <div class="error-message" id="repasswordError"></div>
              </div>

              <!-- submit button -->
              <div class="card-footer">
                  <center><button name="btn" type="submit" class="btn btn-primary">Submit</button></center> 
              </div>
            </form>

            <!-- script file  -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('technicianForm');

    form.addEventListener('submit', function (e) {
        let valid = true;

        // Get form elements
        const nameInput = document.getElementById('name');
        const phnoInput = document.getElementById('phno');
        const addressInput = document.getElementById('address');
        const emailInput = document.getElementById('email');
        const specializeInput = document.getElementById('specialize');
        const imageInput = document.getElementById('image');
        const passwordInput = document.getElementById('password');
        const repasswordInput = document.getElementById('repassword');

        // Clear previous error messages
        clearErrors();

        // Validate Name
        if (nameInput.value.trim() === "") {
            showError(nameInput, 'Name is required', 'nameError');
            valid = false;
        } else {
            markValid(nameInput);
        }

        // Validate Mobile Number (10 digits)
        const phonePattern = /^[0-9]{10}$/;
        if (!phonePattern.test(phnoInput.value.trim())) {
            showError(phnoInput, 'Invalid phone number (must be 10 digits)', 'phnoError');
            valid = false;
        } else {
            markValid(phnoInput);
        }

        // Validate Address
        if (addressInput.value.trim() === "") {
            showError(addressInput, 'Address is required', 'addressError');
            valid = false;
        } else {
            markValid(addressInput);
        }

        // Validate Email
        const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
        if (!emailPattern.test(emailInput.value.trim())) {
            showError(emailInput, 'Invalid email address', 'emailError');
            valid = false;
        } else {
            markValid(emailInput);
        }

        // Validate Specialization
        if (specializeInput.value.trim() === "") {
            showError(specializeInput, 'Specialization is required', 'specializeError');
            valid = false;
        } else {
            markValid(specializeInput);
        }

        // Validate Image Upload
        if (imageInput.files.length === 0) {
            showError(imageInput, 'Image file is required', 'imageError');
            valid = false;
        } else {
            markValid(imageInput);
        }

        // Validate Password (Non-Empty)
        const passwordValue = passwordInput.value.trim();
        if (passwordValue === "") {
            showError(passwordInput, 'Password is required', 'passwordError');
            markInvalid(passwordInput);
            valid = false;
        } else {
            markValid(passwordInput);
        }

        // Validate Repassword (Password Match Check)
        if (repasswordInput.value.trim() === "") {
            showError(repasswordInput, 'Please confirm your password', 'repasswordError');
            markInvalid(repasswordInput);
            valid = false;
        } else if (passwordValue !== repasswordInput.value.trim()) {
            showError(repasswordInput, 'Passwords do not match', 'repasswordError');
            markInvalid(repasswordInput);
            valid = false;
        } else {
            markValid(repasswordInput);
        }

        // Prevent form submission if invalid
        if (!valid) {
            e.preventDefault();
        }
    });

    // Helper functions for showing and clearing errors
    function showError(input, message, errorElementId) {
        input.classList.add('is-invalid');
        document.getElementById(errorElementId).innerText = message;
    }

    function markValid(input) {
        input.classList.remove('is-invalid');
        input.classList.add('is-valid');
    }

    function markInvalid(input) {
        input.classList.remove('is-valid');
        input.classList.add('is-invalid');
    }

    function clearErrors() {
        const errorElements = document.querySelectorAll('.error-message');
        errorElements.forEach(el => el.innerText = '');

        const inputs = document.querySelectorAll('input');
        inputs.forEach(input => {
            input.classList.remove('is-invalid', 'is-valid');
        });
    }
});

</script>
           
              <!-- fetching image  -->
              <?php
                $con = mysqli_connect('localhost','root','','demoproject');
                if(!$con){
                  echo "Error in connection";
                }else{
                  function getExtension($str) 
                  {
                      $i = strrpos($str,".");
                      if (!$i) { return ""; }
                      $l = strlen($str) - $i;
                      $ext = substr($str,$i+1,$l);
                      return $ext;
                  }
                  $errors=0;
                  if(isset($_POST['btn'])) 
                  {
                     $image=$_FILES['image']['name'];
                     if ($image) 
                     {
                       $filename = stripslashes($_FILES['image']['name']);
                        $extension = getExtension($filename);
                       $extension = strtolower($extension);
                          if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif") && ($extension != "bmp")) 
                       {
                         echo '<h1>Unknown extension!</h1>';
                         $errors=1;
                       }
                       else
                       {
                              $image_name=time().'.'.$extension;
                              $newname="uploadimage/technician/".$image_name;        
                              $copied = copy($_FILES['image']['tmp_name'], $newname);
                              if (!$copied) 
                              {
                                  echo '<h1>Copy unsuccessfull!</h1>';
                                  $errors=1;
                              }
                          }
                      }

                      $name = $_POST['name'];
                      $phno = $_POST['phno'];
                      $address = $_POST['address'];
                      $email = $_POST['email'];
                      $specialize = $_POST['specialize'];
                      $pass = $_POST['pass'];
                      
                      $insertQuery = "INSERT INTO technician VALUES('','$name','$phno','$address','$email','$image_name','$specialize','$pass')";
                      if(mysqli_query($con,$insertQuery))
                      {
                        echo "<script>alert('data inserted ');window.location.href='AddTechnician.php';</script>";
                      }else{
                        echo "<script>alert('data is not inserted ');window.location.href='AddTechnician.php';</script>";
                      }
                    }
                  }
              ?>





            </div>
            <!-- /.card -->


          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-12">
            <!-- Form Element sizes -->


          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Number</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Specialize</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>


     
            <?php
                $con=mysqli_connect("localhost","root","","demoproject");
                if(!$con)
                {
                    echo "error in connection";
                }
                $selectquery="select * from technician ";
                $res=mysqli_query($con,$selectquery);
                while($row=mysqli_fetch_assoc($res))
                {
            ?>
                    <tr> 
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['phno'];?></td>
                        <td><?php echo $row['address'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['image'];?></td>
                        <td><?php echo $row['specialize'];?></td>
                        <td><a class="btn btn-primary" href="EditTechnician.php?q=<?php echo $row['slno'];?>">edit</a></td>
                        <td><a class="btn btn-primary" href="DeleteTechnician.php?q=<?php echo $row['slno'];?>">delete</a></td>

                </tr>
            <?php
                }
            ?>
                
                 
             
                
               
              
                  
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
