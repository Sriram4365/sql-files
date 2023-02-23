<?php
  // Connect to the database
  $conn = mysqli_connect("host", "sriram", "7834", "database");
  
  // Check if the connection was successful
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
  // Get the file id from the URL
  $id = $_GET['id'];
  
  // Select the file information from the database
  $sql = "SELECT * FROM files WHERE id=$id";
  $result = mysqli_query($conn, $sql);
  $file = mysqli_fetch_assoc($result);
  
  // Set the content type to force a download
  header("Content-Type: application/pdf");
  header("Content-Disposition: attachment; filename=" . $file['filename']);
  
  // Read the file contents and output them
  readfile("uploads/" . $file['filename']);
  
  // Close the connection
  mysqli_close($conn);
?>
