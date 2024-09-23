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
              <form method="POST" enctype="multipart/form-data">
                  <div class="card-body">



                    <!-- service  -->
                <div class="form-group">
                    <label for="exampleInputname">SERVICE NAME</label>
                    <input type="text" class="form-control" id="exampleInputname" placeholder="Service Name" name="service">
                </div>                  
                    <!-- category  -->
                <div class="form-group">
                    <label for="exampleInputname">CATEGORY</label>
                    <select class="form-control" id="exampleInputname" name="category" >
                    <?php
                        $con=mysqli_connect("localhost","root","","demoproject");
                        if(!$con)
                        {
                            echo "error in connection";
                        }
                        $selectquery="select * from category ";
                        $res=mysqli_query($con,$selectquery);
                        while($row=mysqli_fetch_assoc($res))
                        {
                    ?>
                        <option value="<?php echo $row['categoryname'] ?>" ><?php echo $row['categoryname']?></option>
                    <?php
                        }
                    ?>
                    </select>
                </div>
                    <!-- subcategory  -->
                <div class="form-group">
                    <label for="exampleInputname">SUBCATEGORY</label>
                    <select class="form-control" id="exampleInputname" name="subcategory" >
                    <?php
                    
                        $selectquery="select * from subcategory ";
                        $res=mysqli_query($con,$selectquery);
                        while($row=mysqli_fetch_assoc($res))
                        {
                    ?>
                        <option value="<?php echo $row['subcategory'] ?>" ><?php echo $row['subcategory']?></option>
                    <?php
                        }
                    ?>
                    </select>
                </div>
                 <!-- description  -->
                <div class="form-group">
                    <label for="exampleInputname">Description</label>
                    <input type="text" class="form-control" id="exampleInputname" placeholder="Description" name="description">
                </div>   
                 <!-- price  -->
                <div class="form-group">
                    <label for="exampleInputname">Price</label>
                    <input type="text" class="form-control" id="exampleInputname" placeholder="Price" name="price">
                </div>   
                 <!-- duration  -->
                <div class="form-group">
                    <label for="exampleInputname">Duration</label>
                    <input type="text" class="form-control" id="exampleInputname" placeholder="Duration" name="duration">
                </div>
                <!-- image  -->
                <div class="form-group">
                      <label for="exampleInputFile">Image</label>
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
                    



                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" value="submit" onclick="return check()" name="btn" class="btn btn-primary">
                </div>
                
              </form>
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
                      
                      $insertQuery = "INSERT INTO service VALUES('','$service','$category','$subcategory','$description','$price','$duration','$image_name')";
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
                    <th>SL NO</th>
                    <th>SERVICE</th>
                    <th>CATEGORY</th>
                    <th>SUBCATEGORY</th>
                    <th>DESCRIPTION</th>
                    <th>PRICE</th>
                    <th>DURATION</th>
                    <th>IMAGE</th>
                  </tr>
                  </thead>
                  <tbody>
                      
                 
            <?php
                $selectquery="select * from service ";
                $res=mysqli_query($con,$selectquery);
                while($row=mysqli_fetch_assoc($res))
                {
            ?>
                    <tr> <td><?php echo $row['slno'];?></td>
                        <td><?php echo $row['servicename'];?></td>
                        <td><?php echo $row['category'];?></td>
                        <td><?php echo $row['subcategory'];?></td>
                        <td><?php echo $row['description'];?></td>
                        <td><?php echo $row['price'];?></td>
                        <td><?php echo $row['duration'];?></td>
                        <td><?php echo $row['image'];?></td>
                        <td><center><a class="btn btn-primary" href="EditSubCategory.php?q=<?php echo $row['scatid'];?>">edit</a></center></td>
                        <td><center><a class="btn btn-primary" href="DeleteSubCategory.php?q=<?php echo $row['scatid'];?>">delete</a></center></td>

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