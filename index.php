<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "product_management");

//Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error)
}
//Add Products
if (isset($_POST['add'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $conn->query("INSERT INTO products (title, description, quantity, price") VALUES ('$title', '$description', $quantity, $price)):
}
// Delete Product
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM products WHERE id=$id");
}
$result = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Management</title>
</head>
<body>
    <h1>Product Management</h1>

    <!-- Add Product Form -->
     <form method="POST">
        <h2>Add Product</h2>
        <input type="text" name="title" placeholder="Product Title" required>
        <textarea name="description" placeholder="Description"></textarea>
        <input type="number" name="quantity" placeholder="Quantity" required>
        <input type="number" step="0.01" name="price" placeholder="Price" required>
        <button type="submit" name="add">Add Product</button>
</form>

<!-- Product List -->
 <h2>Product List</h2>
 <table products="1">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Quantity</th>
        <th>Price</th>
</tr>