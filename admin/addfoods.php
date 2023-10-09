<?php
include('../includes/connect.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $productName = $_POST["productName"];
  $description = $_POST["description"];
  $price = $_POST["price"];

  // Check if a file was uploaded
  if (isset($_FILES['image'])) {
    $file = $_FILES['image'];

    // Get file information
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];

    // Check if file is uploaded without errors
    if ($fileError === 0) {
      // Move the uploaded file to your desired location
      $targetDir = "../uploads/"; // Create this directory if it doesn't exist
      $targetFile = $targetDir . basename($fileName);

      move_uploaded_file($fileTmpName, $targetFile);

      // Now, you can insert the file path into your database or perform any other necessary actions.
      $insert_query = "insert into `foods_table` (food_name,food_description,price,image_path) values ('$productName','$description',$price,'$fileName')";
      $result = mysqli_query($conn, $insert_query);
      if ($result) {
        echo "<script>alert('successfully added')</script>";
      }
    } else {
      echo "Error uploading file.";
    }
  }
}
?>

<div class="container">
  <div class="add-item">
    <h1>Add Product</h1>

    <form action="index.php?addfoods" method="post" enctype="multipart/form-data">
      <label for="productName">Product Name:</label>
      <input type="text" id="productName" name="productName" required /><br /><br />

      <label for="description">Description:</label><br />
      <textarea id="description" name="description" rows="4" cols="50" required></textarea><br /><br />

      <label for="price">Price:</label>
      <input type="number" id="price" name="price" min="0" step="0.01" required /><br /><br />

      <label for="image">Image:</label>
      <input type="file" id="image" name="image" accept="image/*" required /><br /><br />

      <button type="submit" class="btn-success" value="Submit">Add item</button>
    </form>
  </div>
</div>