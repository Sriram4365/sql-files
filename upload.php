<?php
  // Connect to the database
  $conn = mysqli_connect("host", "sriram", "7834", "database");
  
  // Check if the connection was successful
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
  // Check if the form was submitted
  if (isset($_POST['submit'])) {
    // Get the uploaded file
    $file = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    
    // Move the uploaded file to the desired location
    move_uploaded_file($file_tmp, "uploads/" . $file);
    
    // Insert the file information into the database
    $sql = "INSERT INTO files (filename) VALUES ('$file')";
    if (mysqli_query($conn, $sql)) {
      echo "File uploaded successfully.";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }
  
  // Close the connection
  mysqli_close($conn);
?>
