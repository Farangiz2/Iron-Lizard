<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Your Listing</title> 
       <link rel="stylesheet" href="styles.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        select, button {
            padding: 10px;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 20px;
        }

        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        h1 {
            margin-bottom: 20px;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input, select, textarea, button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }
        button {
            background-color: #ff4d4d;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
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
    <h1>Post Your Listing</h1>
    <form method="post" action="process_post.php">
        <label for="vehicle">Select Vehicle Type:</label>
        <select name="vehicle" id="vehicle" required>
            <option value="car">Car</option>
            <option value="bike">Bike</option>
            <option value="truck">Truck</option>
        </select>

        <label for="borough">Select Borough in New York:</label>
        <select name="borough" id="borough" required>
            <option value="Manhattan">Manhattan</option>
            <option value="Brooklyn">Brooklyn</option>
            <option value="Queens">Queens</option>
            <option value="Bronx">Bronx</option>
            <option value="Staten Island">Staten Island</option>
        </select>
        <label for="description">Description:</label>
        <textarea name="description" id="description" rows="4" required></textarea>

        <label for="price">Price ($):</label>
        <input type="number" name="price" id="price" required>

        <label for="color">Color:</label>
        <input type="text" name="color" id="color" required>

        <label for="year">Year:</label>
        <input type="number" name="year" id="year" required>

        <label for="mileage">Mileage (miles):</label>
        <input type="number" name="mileage" id="mileage" required>

        <label for="image">Upload Image:</label>
        <input type="file" name="image" id="image" accept="image/*" required>

        <button type="submit">Post</button>

    </form>
</body>
</html>
