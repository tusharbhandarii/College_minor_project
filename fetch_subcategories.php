<?php
// Connect to the database
$con = mysqli_connect("localhost", "root", "", "demoproject");

if (!$con) {
    echo "Error in connection";
}

if (isset($_POST['category'])) {
    $category = mysqli_real_escape_string($con, $_POST['category']);

    // Fetch subcategories based on the selected category
    $query = "SELECT * FROM subcategory WHERE category = '$category'";
    $result = mysqli_query($con, $query);

    // Output the options for the subcategory dropdown
    echo '<option value="">Select Subcategory</option>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="' . $row['subcategory'] . '">' . $row['subcategory'] . '</option>';
    }
}
?>
