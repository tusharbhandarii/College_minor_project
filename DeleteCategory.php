<?php
    $q = $_GET['q'];

    include 'db_connection2.php';
    $delequery = "DELETE FROM category WHERE catid='$q'";
    
    if(mysqli_query($con,$delequery)){
        echo "<script> alert('Data Deleted !!');window.location.href ='AddCategory.php'; </script>";
    }else{
        echo "<script> alert('Data not Deleted !!') window.location.href ='AddCategory.php' </script>";
    }
?>