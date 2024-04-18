<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if file was uploaded without errors
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $uploadDir = "uploads/";
        $uploadFile = $uploadDir . basename($_FILES["image"]["name"]);

        // Check file size
        if ($_FILES["image"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
        } else {
            // Try to move the uploaded file to the specified directory
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $uploadFile)) {
                echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "No file uploaded.";
    }
}
?>
