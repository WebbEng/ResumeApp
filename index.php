<?php
// If the form for creating the resume is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['create_resume'])) {
        // Handle the data from the "Create Resume" form
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';

        // Process other form fields as needed

        // Example of how to display or save form data
        echo "<p>Resume Created for: $name ($email)</p>";
        // You can store this data in a database, send via email, etc.
    }

    // If the form for uploading the resume is submitted
    if (isset($_FILES['resume'])) {
        $uploadDir = 'uploads/';  // Make sure this folder is writable
        $uploadFile = $uploadDir . basename($_FILES['resume']['name']);

        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES['resume']['tmp_name'], $uploadFile)) {
            echo "<p>Resume successfully uploaded to $uploadFile</p>";
        } else {
            echo "<p>Error uploading resume.</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Resume</title>
</head>
<body>
<h3>Create Your Resume</h3>
<form action="index.php" method="POST">
    <!-- Form fields for creating resume go here -->
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <!-- Add more form fields as necessary -->

    <input type="hidden" name="create_resume" value="1">
    <input type="submit" value="Create">
</form>

<h3>Upload your Resume</h3>
<form action="index.php" method="POST" enctype="multipart/form-data">
    <label for="resume">Select a file:</label>
    <input type="file" id="resume" name="resume" required><br><br>

    <input type="submit" value="Submit">
</form>
</body>
</html>
