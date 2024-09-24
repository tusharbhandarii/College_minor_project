<?php
    $q = $_GET['q'];

    $con = mysqli_connect('localhost','root','','demoproject');
    $delequery = "DELETE FROM service WHERE slno='$q'";
    
    if(mysqli_query($con,$delequery)){
        echo "<script> alert('Data Deleted !!');window.location.href ='AddService.php'; </script>";
    }else{
        echo "<script> alert('Data not Deleted !!') window.location.href ='AddService.php' </script>";
    }
    
?>