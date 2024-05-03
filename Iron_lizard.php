<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iron Lizard</title>
    <link rel="stylesheet" href="styles.css" >
    <style>
.post-button-container {
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #ff4d4d;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .post-button-container:hover {
            background-color: #ff3333;
        }

    </style>
</head>
<body>
    <header>
        <h1>Iron Lizard</h1>
        <nav>
            <ul>
                <li><a href="#">Cars</a></li>
                <li><a href="#">Bikes</a></li>
                <li><a href="#">Trucks</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="car-listing">
            <img src="randomcar.jpg" alt="Car 1">
            <h2>Car 1</h2>
            <p>Price: $10,000</p>
            <button onclick="location.href='product.php'">View Details</button>
        </div>
        <div class="car-listing">
            <img src="randomcar2.jpg" alt="Car 2">
            <h2>Car 2</h2>
            <p>Price: $15,000</p>
            <button onclick="location.href='product.html'">View Details</button>
        </div>
        <div class="post-button-container" onclick="location.href='post.php'">Post</div>

    </main>
</body>
</html>
