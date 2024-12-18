<?php
    $q = $_GET['q'];

    include 'db_connection2.php';
    $delequery = "DELETE FROM subcategory WHERE scatid='$q'";
    
    if(mysqli_query($con,$delequery)){
        echo "<script> alert('Data Deleted !!');window.location.href ='AddSubCategory.php'; </script>";
    }else{
        echo "<script> alert('Data not Deleted !!') window.location.href ='AddSubCategory.php' </script>";
    }
?>