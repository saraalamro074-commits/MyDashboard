<?php
include "connect.php";

if(isset($_POST['add'])){

    $product = $_POST['product'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $date = $_POST['date'];

    $sql = "INSERT INTO sales(product_name, category, quantity, price, sale_date)
            VALUES('$product','$category','$quantity','$price','$date')";

    if(mysqli_query($conn, $sql)){
        header("Location: index.php");
        exit();
    }else{
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Sale</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f4f4f4;
        }

        .container{
            width:400px;
            margin:50px auto;
            background:white;
            padding:20px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,.2);
        }

        h2{
            text-align:center;
        }

        input{
            width:100%;
            padding:10px;
            margin:10px 0;
            box-sizing:border-box;
        }

        button{
            width:100%;
            padding:10px;
            background:#007BFF;
            color:white;
            border:none;
            border-radius:5px;
            cursor:pointer;
        }

        button:hover{
            background:#0056b3;
        }
    </style>

</head>
<body>

<div class="container">

<h2>Add New Sale</h2>

<form method="POST">

<input type="text" name="product" placeholder="Product Name" required>

<input type="text" name="category" placeholder="Category" required>

<input type="number" name="quantity" placeholder="Quantity" required>

<input type="number" step="0.01" name="price" placeholder="Price" required>

<input type="date" name="date" required>

<button type="submit" name="add">Add Sale</button>

</form>

</div>

</body>
</html>