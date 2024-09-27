<?php
    $q = $_GET['q'];

    $con = mysqli_connect('localhost','root','','demoproject');
    $delequery = "DELETE FROM admin WHERE AID='$q'";
    
    if(mysqli_query($con,$delequery)){
        echo "<script> alert('Data Deleted !!');window.location.href ='AddAdmin.php'; </script>";
    }else{
        echo "<script> alert('Data not Deleted !!') window.location.href ='AddAdmin.php' </script>";
    }
?>