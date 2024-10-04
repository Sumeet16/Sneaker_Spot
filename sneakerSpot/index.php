<?php
$conn = new mysqli('localhost', 'root', '', 'sneakerSpot');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";

// Create Operation: Add a new sneaker to the database
if (isset($_POST['create'])) {
    $sneakerName = $_POST['sneakerName'];
    $sneakerDescription = $_POST['sneakerDescription'];
    $quantityAvailable = $_POST['quantityAvailable'];
    $price = $_POST['price'];
    $size = $_POST['size'];

   
    $productAddedBy = 'Sumeet Yadav';

    $sql = "INSERT INTO sneakers (SneakerName, SneakerDescription, QuantityAvailable, Price, Size, ProductAddedBy) 
            VALUES ('$sneakerName', '$sneakerDescription', $quantityAvailable, $price, '$size', '$productAddedBy')";
    
    if ($conn->query($sql) === TRUE) {
        $message = "New sneaker added successfully!";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Update Operation: Update sneaker details in the database
if (isset($_POST['update'])) {
    $sneakerID = $_POST['sneakerID'];
    $sneakerName = $_POST['sneakerName'];
    $sneakerDescription = $_POST['sneakerDescription'];
    $quantityAvailable = $_POST['quantityAvailable'];
    $price = $_POST['price'];
    $size = $_POST['size'];

    // ProductAddedBy remains unchanged, so we don't need to update it
    $sql = "UPDATE sneakers SET SneakerName='$sneakerName', SneakerDescription='$sneakerDescription', 
            QuantityAvailable=$quantityAvailable, Price=$price, Size='$size' WHERE SneakerID=$sneakerID";

    if ($conn->query($sql) === TRUE) {
        $message = "Sneaker updated successfully!";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Delete Operation: Delete a sneaker from the database
if (isset($_POST['delete'])) {
    $sneakerID = $_POST['sneakerID'];

    $sql = "DELETE FROM sneakers WHERE SneakerID=$sneakerID";

    if ($conn->query($sql) === TRUE) {
        $message = "Sneaker deleted successfully!";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Read Operation: Fetch all sneakers from the database
$sql = "SELECT * FROM sneakers";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SneakerSpot Ecommerce Site</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">SneakerSpot</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#availableSneakers">Available Sneakers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link addSneaker" href="#addSneaker"><p>Add Sneaker</p></a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="hero text-center" style="display: flex; justify-content: center; align-items: center;">
        <h1>Welcome to Sneaker Spot</h1>
    </div>

    <div class="container mt-5">
        <p class="text-success text-center"><?php echo $message; ?></p>

        <!-- READ AND DELETE SECTION (Available Sneakers as Cards) -->
        <h2 id="availableSneakers" class="text-center my-4">Find your perfect sneakers below</h2>
        <div class="row">
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-4">';
                    echo '<div class="card mb-4">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row["SneakerName"] . '</h5>';
                    echo '<p class="card-text">' . $row["SneakerDescription"] . '</p>';
                    echo '<p class="price">$' . $row["Price"] . '</p>';
                    echo '<p><strong>Size:</strong> ' . $row["Size"] . '</p>';
                    echo '<p><strong>Quantity Available:</strong> ' . $row["QuantityAvailable"] . '</p>';
                    echo '<p><strong>Added By:</strong> ' . $row["ProductAddedBy"] . '</p>'; // Displaying ProductAddedBy
                    echo '<button class="btn edit btn-sm" onclick="populateForm(' . $row["SneakerID"] . ', \'' . addslashes($row["SneakerName"]) . '\', \'' . addslashes($row["SneakerDescription"]) . '\', ' . $row["QuantityAvailable"] . ', ' . $row["Price"] . ', \'' . addslashes($row["Size"]) . '\')"><a href="#addSneaker">Edit</a></button>';
                    echo '<form method="post" action="" style="display:inline;">
                            <input type="hidden" name="sneakerID" value="' . $row["SneakerID"] . '">
                            <button type="submit" name="delete" class="btn delete btn-sm">Delete</button>
                          </form>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "<p>No sneakers found</p>";
            }
            ?>
        </div>

        <hr>

        <!-- ADD OR UPDATE SNEAKER FORM -->
        <div class="sneaker">
            <h2 id="addSneaker" class="text-center my-4">Add or Update Sneaker</h2>
            <form method="post" action="">
                <input type="hidden" name="sneakerID" id="sneakerID">

                <div class="form-group">
                    <label for="sneakerName">Sneaker Name:</label>
                    <input type="text" name="sneakerName" id="sneakerName" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="sneakerDescription">Sneaker Description:</label>
                    <textarea name="sneakerDescription" id="sneakerDescription" class="form-control" required></textarea>
                </div>

                <div class="form-group">
                    <label for="quantityAvailable">Quantity Available:</label>
                    <input type="number" name="quantityAvailable" id="quantityAvailable" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" name="price" id="price" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="size">Size:</label>
                    <input type="text" name="size" id="size" class="form-control" required>
                </div>

                <button type="submit" name="create" class="btn btn-primary btn-block">Add Sneaker</button>
                <button type="submit" name="update" class="btn btn-success btn-block" style="margin: 1rem 0rem; margin-bottom: 5rem;">Update Sneaker</button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer" style="display: flex; justify-content: center; align-items: center; padding: 4rem 5rem;">
        <p>&copy; 2024 SneakerSpot. All rights reserved.</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function populateForm(id, name, description, quantity, price, size) {
            document.getElementById("sneakerID").value = id;
            document.getElementById("sneakerName").value = name;
            document.getElementById("sneakerDescription").value = description;
            document.getElementById("quantityAvailable").value = quantity;
            document.getElementById("price").value = price;
            document.getElementById("size").value = size;
        }
    </script>
</body>
</html>
