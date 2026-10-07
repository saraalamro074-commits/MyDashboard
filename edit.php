<?php
include "connect.php";

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $result = mysqli_query($conn, "SELECT * FROM sales WHERE id=$id");
    $row = mysqli_fetch_assoc($result);
}


if(isset($_POST['update'])){

    $product = $_POST['product'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $date = $_POST['date'];

    $sql = "UPDATE sales SET 
    product_name='$product',
    category='$category',
    quantity='$quantity',
    price='$price',
    sale_date='$date'
    WHERE id=$id";

    if(mysqli_query($conn,$sql)){
        header("Location: index.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Sale</title>

<style>

body{
    font-family:Arial;
    background:#f4f4f4;
}

.container{
    width:400px;
    margin:50px auto;
    background:white;
    padding:20px;
    border-radius:10px;
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
}

</style>

</head>

<body>

<div class="container">

<h2>Edit Sale</h2>

<form method="POST">

<input type="text" name="product" value="<?php echo $row['product_name']; ?>">

<input type="text" name="category" value="<?php echo $row['category']; ?>">

<input type="number" name="quantity" value="<?php echo $row['quantity']; ?>">

<input type="number" step="0.01" name="price" value="<?php echo $row['price']; ?>">

<input type="date" name="date" value="<?php echo $row['sale_date']; ?>">

<button name="update">Update Sale</button>

</form>

</div>

</body>
</html>