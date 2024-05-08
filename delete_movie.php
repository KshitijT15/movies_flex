<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MOVIE SYSTEM</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.1);
        }
        h1, h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: #fff;
        }
        tr:hover {
            background-color: #f2f2f2;
        }
        .poster {
            width: 100px; 
        }
        .no-poster {
            width: 100px; 
            height: auto;
        }
        .search-container {
            text-align: right;
            margin-bottom: 20px;
        }
        .search-container input[type=text] {
            padding: 6px;
            margin-top: 8px;
            margin-bottom: 8px;
            width: 250px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>MOVIE FLIX</h1>
        <div class='search-container'>
            <form action="index.php" method="get">
                <input type="text" placeholder="Search by title..." name="search">
                <button type="submit">Search</button>
            </form>
        </div>
        <h2>Movie List</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Director</th>
                <th>Release Date</th>
                <th>Rating</th>
                <th>Poster</th> 
            </tr>
            <?php
            include 'config.php';

            $search = isset($_GET['search']) ? $_GET['search'] : '';
            $sql = "SELECT * FROM movies WHERE title LIKE '%$search%'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $poster = isset($row['poster']) ? $row['poster'] : 'placeholder.jpg'; 
                    echo "<tr><td>".$row["id"]."</td><td>".$row["title"]."</td><td>".$row["director"]."</td><td>".$row["release_date"]."</td><td>".$row["rating"]."</td><td><img class='poster' src='".$poster."' alt='Movie Poster'></td></tr>";
                }
            } else {
                echo "<tr><td colspan='6'>0 results</td></tr>";
            }

            $total_sql = "SELECT COUNT(*) AS total FROM movies";
            $total_result = $conn->query($total_sql);
            $total_row = $total_result->fetch_assoc();
            $total_movies = $total_row['total'];
            echo "<tr><td colspan='6'>Total Movies: $total_movies</td></tr>";

            $conn->close();
            ?>
        </table>
        
    </div>
</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Movie</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            margin-top: 20px;
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
        .form-group input[type="submit"] {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .form-group input[type="submit"]:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Delete Movie</h1>
        <form action="delete_movie_process.php" method="post">
            <div class="form-group">
                <label for="id">Movie ID:</label>
                <input type="number" id="id" name="id" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Delete Movie">
            </div>
        </form>
    </div>
</body>
</html>


