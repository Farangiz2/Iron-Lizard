<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        h1 {
            margin-bottom: 20px;
        }
        p {
            font-size: 18px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Post Details</h1>
    <?php
    // Include database configuration
    include 'config.php';

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $vehicle = isset($_POST['vehicle']) ? $_POST['vehicle'] : '';
        $description = isset($_POST['description']) ? $_POST['description'] : '';
        $price = isset($_POST['price']) ? $_POST['price'] : '';
        $color = isset($_POST['color']) ? $_POST['color'] : '';
        $mileage = isset($_POST['mileage']) ? $_POST['mileage'] : '';
        $year = isset($_POST['year']) ? $_POST['year'] : '';

        // Validate required fields
        if ($vehicle && $description && $price && $color && $year) {
            // Handle file upload
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $targetDir = "uploads/";
                $targetFile = $targetDir . basename($_FILES["image"]["name"]);

                // Move uploaded file to the target directory
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                    // Insert post details into database
                    $sql = "INSERT INTO posts (vehicle, description, price, color, year, mileage, image)
                            VALUES (?, ?, ?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ssdssis", $vehicle, $description, $price, $color, $year, $mileage, $targetFile);
                    
                    if ($stmt->execute()) {
                        echo "<p>Your listing has been posted successfully!</p>";
                        echo "<p>Type: $vehicle</p>";
                        echo "<p>Description: $description</p>";
                        echo "<p>Price: $price</p>";
                        echo "<p>Color: $color</p>";
                        echo "<p>Year: $year</p>";
                        echo "<p>Mileage: $mileage</p>";
                        echo "<p>Image uploaded: <img src='$targetFile' width='200'></p>";
                    } else {
                        echo "<p>Failed to insert data into database.</p>";
                    }
                    $stmt->close();
                } else {
                    echo "<p>Sorry, there was an error uploading your image.</p>";
                }
            } else {
                echo "<p>No image uploaded or an error occurred.</p>";
            }
        } else {
            echo "<p>Missing required information. Please go back and try again.</p>";
        }
    } else {
        echo "<p>No data received.</p>";
    }

    // Close database connection
    $conn->close();
    ?>
</body>
</html>
