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
   
    <?php include ('sidebar.php')?>

    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Admin Form</h1>
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
              <form method='post' enctype="multipart/form-data">
                <div class="card-body">
                  <!-- name  -->
                  <div class="form-group">
                    <label for="exampleInputName">Admin Name</label>
                    <input name="name" type="text" class="form-control" id="exampleInputName" placeholder="Enter name">
                  </div>
                  <!-- ph no  -->
                  <div class="form-group">
                    <label for="exampleInputPhno">Mobile Number</label>
                    <input name="phno" type="text" class="form-control" id="exampleInputPhno" placeholder="Enter number">
                  </div>
                  <!-- email  -->
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <!-- image  -->
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="image" type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  <!-- password  -->                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input name="pass" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <!-- repassword  -->
                  <div class="form-group">
                    <label for="exampleInputPassword1">Repassword</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Repassword">
                  </div>

                </div>
                <!-- /.submit button -->

                <div class="card-footer">
                 <center> <button name="btn" type="submit" class="btn btn-primary" >Submit</button></center>
                </div>
              </form>

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
                              $newname="uploadimage/admin/".$image_name;        
                              $copied = copy($_FILES['image']['tmp_name'], $newname);
                              if (!$copied) 
                              {
                                  echo '<h1>Copy unsuccessfull!</h1>';
                                  $errors=1;
                              }
                          }
                      }

                      $Name = $_POST['name'];
                      $Phno = $_POST['phno'];
                      $Email = $_POST['email'];
                      $Pass = $_POST['pass'];
                      
                      $insertQuery = "INSERT INTO admin VALUES('','$Name','$Phno','$Email','$Pass','$image_name')";
                      if(mysqli_query($con,$insertQuery))
                      {
                        echo "<script>alert('data inserted ');window.location.href='AddAdmin.php';</script>";
                      }else{
                        echo "<script>alert('data is not inserted ');window.location.href='AddAdmin.php';</script>";
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
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phn_no</th>
                    <th>Email</th>
                    <th>Image</th>
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
                $selectquery="select * from admin ";
                $res=mysqli_query($con,$selectquery);
                while($row=mysqli_fetch_assoc($res))
                {
                    ?>
                    <tr> <td><?php echo $row['AID'];?></td>
                    <td><?php echo $row['Name'];?></td>
                        <td><?php echo $row['Phno'];?></td>
                        <td><?php echo $row['Email'];?></td>
                        <td><?php echo $row['img'];?></td>
                        <td><a href="EditAdmin.php?q=<?php echo $row['AID'];?>">edit</a></td>
                        <td><a href="DeleteAdmin.php?q=<?php echo $row['AID'];?>">delete</a></td>

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
