<?php
    $q = $_GET['q'];

    include 'db_connection2.php';
    $delequery = "DELETE FROM technician WHERE slno='$q'";
    
    if(mysqli_query($con,$delequery)){
        echo "<script> alert('Data Deleted !!');window.location.href ='AddTechnician.php'; </script>";
    }else{
        echo "<script> alert('Data not Deleted !!') window.location.href ='AddTechnician.php' </script>";
    }
?>