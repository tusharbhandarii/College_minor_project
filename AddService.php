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
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
  <?php include('navbar.php') ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include('sidebar.php')?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>General Form</h1>
          </div>
          <div class="col-sm-12">
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
              <form method="POST" enctype="multipart/form-data" id="serviceForm">
    <div class="card-body">

        <!-- Service Name -->
        <div class="form-group">
            <label for="service">Service Name</label>
            <input type="text" class="form-control" id="service" placeholder="Enter name" name="service">
            <span class="error-message" id="serviceError"></span>
        </div>                  

        <!-- Category -->
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="category" onchange="fetchSubcategories()">
                <option value="">Select Category</option>
                <?php
                    // Connect to the database
                    $con = mysqli_connect("localhost", "root", "", "demoproject");
                    if(!$con) {
                        echo "Error in connection";
                    }

                    // Fetch categories from the database
                    $selectquery = "SELECT * FROM category";
                    $res = mysqli_query($con, $selectquery);
                    while($row = mysqli_fetch_assoc($res)) {
                ?>
                    <option value="<?php echo htmlspecialchars($row['categoryname']); ?>"><?php echo htmlspecialchars($row['categoryname']); ?></option>
                <?php
                    }
                ?>
            </select>
            <span class="error-message" id="categoryError"></span>
        </div>

        <!-- Subcategory -->
        <div class="form-group">
            <label for="subcategory">Subcategory</label>
            <select class="form-control" id="subcategory" name="subcategory">
                <option value="">Select Subcategory</option>
            </select>
            <span class="error-message" id="subcategoryError"></span>
        </div>

        <!-- Description -->
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" placeholder="Enter description" name="description">
            <span class="error-message" id="descriptionError"></span>
        </div> 

        <!-- Price -->
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" id="price" placeholder="Enter price" name="price">
            <span class="error-message" id="priceError"></span>
        </div>  

        <!-- Duration -->
        <div class="form-group">
            <label for="duration">Duration</label>
            <input type="text" class="form-control" id="duration" placeholder="Enter duration" name="duration">
            <span class="error-message" id="durationError"></span>
        </div>

        <!-- Image -->
        <div class="form-group">
            <label for="image">Image</label>
            <div class="input-group">
                <div class="custom-file">
                    <input name="image" type="file" class="custom-file-input" id="image">
                    <label class="custom-file-label" for="image">Choose file</label>
                </div>
                <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                </div>
            </div>
            <span class="error-message" id="imageError"></span>
        </div>   

    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <center><input type="submit" value="Submit" name="btn" class="btn btn-primary"></center>
    </div>
</form>

<!-- fetchSubcategories  -->
<script>
  function fetchSubcategories() {
    var category = document.getElementById('category').value;

    // Make AJAX call to fetch subcategories
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'fetch_subcategories.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        // Populate the subcategory dropdown with the response
        document.getElementById('subcategory').innerHTML = this.responseText;
      }
    };
    xhr.send('category=' + category);
  }
</script>

<!-- valiadtion  -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('serviceForm');

    form.addEventListener('submit', function (e) {
        let valid = true;

        // Get form elements
        const nameInput = document.getElementById('service');
        const categorySelect = document.getElementById('category');
        const subcategorySelect = document.getElementById('subcategory');
        const descInput = document.getElementById('description');
        const priceInput = document.getElementById('price');
        const durationInput = document.getElementById('duration');
        const imageInput = document.getElementById('image');

        // Clear previous error messages
        clearErrors();

        // Validate Service Name
        const namePattern = /^[a-zA-Z\s]+$/;
        if (nameInput.value.trim() === "") {
            showError(nameInput, 'Service Name is required', 'serviceError');
            valid = false;
        } else if (!namePattern.test(nameInput.value.trim())) {
            showError(nameInput, 'Service Name must contain only letters and spaces', 'serviceError');
            valid = false;
        } else {
            markValid(nameInput);
        }

        // Validate Category
        if (categorySelect.value === "") {
            showError(categorySelect, 'Please select a category', 'categoryError');
            valid = false;
        } else {
            markValid(categorySelect);
        }

        // Validate Subcategory
        if (subcategorySelect.value === "") {
            showError(subcategorySelect, 'Please select a subcategory', 'subcategoryError');
            valid = false;
        } else {
            markValid(subcategorySelect);
        }

        // Validate Description
        if (descInput.value.trim() === "") {
            showError(descInput, 'Description is required', 'descriptionError');
            valid = false;
        } else {
            markValid(descInput);
        }

        // Validate Price
        const pricePattern = /^\d+(\.\d{1,2})?$/; // Allows integers and decimals up to 2 places
        if (priceInput.value.trim() === "") {
            showError(priceInput, 'Price is required', 'priceError');
            valid = false;
        } else if (!pricePattern.test(priceInput.value.trim())) {
            showError(priceInput, 'Invalid price format', 'priceError');
            valid = false;
        } else {
            markValid(priceInput);
        }

        // Validate Duration
        if (durationInput.value.trim() === "") {
            showError(durationInput, 'Duration is required', 'durationError');
            valid = false;
        } else {
            markValid(durationInput);
        }

        // Validate Image Upload
        const allowedExtensions = ['image/jpeg', 'image/png', 'image/gif'];
        if (imageInput.files.length === 0) {
            showError(imageInput, 'Image file is required', 'imageError');
            valid = false;
        } else {
            const fileType = imageInput.files[0].type;
            if (!allowedExtensions.includes(fileType)) {
                showError(imageInput, 'Only JPEG, PNG, or GIF files are allowed', 'imageError');
                valid = false;
            } else {
                markValid(imageInput);
            }
        }

        // If the form is invalid, prevent submission
        if (!valid) {
            e.preventDefault();
        }
    });

    // Helper functions for showing and clearing errors
    function showError(input, message, errorElementId) {
        input.classList.add('is-invalid');
        const errorElement = document.getElementById(errorElementId);
        if (errorElement) {
            errorElement.innerText = message;
        }
    }

    function markValid(input) {
        input.classList.remove('is-invalid');
        input.classList.add('is-valid');
    }

    function clearErrors() {
        const errorElements = document.querySelectorAll('.error-message');
        errorElements.forEach(el => el.innerText = '');

        const inputs = document.querySelectorAll('input, select, textarea');
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
                              $newname="uploadimage/servicee/".$image_name;        
                              $copied = copy($_FILES['image']['tmp_name'], $newname);
                              if (!$copied) 
                              {
                                  echo '<h1>Copy unsuccessfull!</h1>';
                                  $errors=1;
                              }
                          }
                      }

                            $service=$_POST['service'];
                            $category = mysqli_real_escape_string($con, $_POST['category']);
                            $subcategory = mysqli_real_escape_string($con, $_POST['subcategory']);
                            $description=$_POST['description'];
                            $price=$_POST['price'];
                            $duration=$_POST['duration'];
                      
                      $insertQuery = "INSERT INTO service VALUES('','$category','$service','$subcategory','$description','$price','$duration','$image_name')";
                      if(mysqli_query($con,$insertQuery))
                      {
                        echo "<script>alert('data inserted ');window.location.href='AddService.php';</script>";
                      }else{
                        echo "<script>alert('data is not inserted ');window.location.href='AddService.php';</script>";
                      }
                    }
                  }
              ?>
         
                    <!-- /.card -->


          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-12">
            <!-- Form Element sizes -->
            
            <!-- /.card -->

            
            <!-- /.card -->

            <!-- general form elements disabled -->
            
            <!-- /.card -->
            <!-- general form elements disabled -->
            
            <!-- /.card -->
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
                    <th>Service</th>
                    <th>Category</th>
                    <th>Subcategory</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Duration</th>
                    <th>Image</th>
                  </tr>
                  </thead>
                  <tbody>
                      
                 
            <?php
                $selectquery="select * from service ";
                $res=mysqli_query($con,$selectquery);
                while($row=mysqli_fetch_assoc($res))
                {
            ?>
                        <td><?php echo $row['servicename'];?></td>
                        <td><?php echo $row['category'];?></td>
                        <td><?php echo $row['subcategory'];?></td>
                        <td><?php echo $row['description'];?></td>
                        <td><?php echo $row['price'];?></td>
                        <td><?php echo $row['duration'];?></td>
                        <td><?php echo $row['image'];?></td>
                        <td><center><a class="btn btn-primary" href="EditService.php?q=<?php echo $row['slno'];?>">edit</a></center></td>
                        <td><center><a class="btn btn-danger" href="DeleteService.php?q=<?php echo $row['slno'];?>">delete</a></center></td>

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
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>