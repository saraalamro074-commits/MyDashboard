<?php
include "connect.php";

// عدد المنتجات
$productQuery = mysqli_query($conn, "SELECT COUNT(*) AS total_products FROM sales");
$product = mysqli_fetch_assoc($productQuery);

// إجمالي الكمية
$quantityQuery = mysqli_query($conn, "SELECT SUM(quantity) AS total_quantity FROM sales");
$quantity = mysqli_fetch_assoc($quantityQuery);

// إجمالي المبيعات
$salesQuery = mysqli_query($conn, "SELECT SUM(quantity * price) AS total_sales FROM sales");
$sales = mysqli_fetch_assoc($salesQuery);

?>

<!DOCTYPE html>
<html>
<head>

<title>Sales Dashboard</title>

<style>

body{
    font-family:Arial;
    background:#f4f4f4;
    margin:20px;
}

h1{
    text-align:center;
}

.cards{
    display:flex;
    gap:20px;
    justify-content:center;
    margin-bottom:30px;
}

.card{
    background:white;
    width:220px;
    padding:20px;
    text-align:center;
    border-radius:10px;
    box-shadow:0 0 10px #ccc;
}

.card h2{
    color:#007BFF;
}

table{
    width:100%;
    border-collapse:collapse;
    background:white;
}

th,td{
    border:1px solid #ddd;
    padding:10px;
    text-align:center;
}

th{
    background:#007BFF;
    color:white;
}

button{
    padding:5px 10px;
    border:none;
    border-radius:5px;
    color:white;
    cursor:pointer;
}

.edit{
    background:orange;
}

.delete{
    background:red;
}

.add{
    background:#28a745;
    padding:10px 20px;
    text-decoration:none;
    color:white;
    border-radius:5px;
}

</style>

</head>

<body>


<h1>Sales Dashboard</h1>


<div style="text-align:center;margin-bottom:20px;">
<a class="add" href="add.php">
Add New Sale
</a>
</div>



<div class="cards">

<div class="card">
<h3>Total Products</h3>
<h2>
<?php echo $product['total_products']; ?>
</h2>
</div>


<div class="card">
<h3>Total Quantity</h3>
<h2>
<?php echo $quantity['total_quantity']; ?>
</h2>
</div>


<div class="card">
<h3>Total Sales</h3>
<h2>
$<?php echo $sales['total_sales']; ?>
</h2>
</div>

</div>



<?php

$result = mysqli_query($conn,"SELECT * FROM sales");


echo "<table>";

echo "
<tr>
<th>ID</th>
<th>Product</th>
<th>Category</th>
<th>Quantity</th>
<th>Price</th>
<th>Date</th>
<th>Action</th>
</tr>
";


while($row = mysqli_fetch_assoc($result)){

echo "<tr>";

echo "<td>".$row['id']."</td>";
echo "<td>".$row['product_name']."</td>";
echo "<td>".$row['category']."</td>";
echo "<td>".$row['quantity']."</td>";
echo "<td>".$row['price']."</td>";
echo "<td>".$row['sale_date']."</td>";

echo "
<td>

<a href='edit.php?id=".$row['id']."'>
<button class='edit'>Edit</button>
</a>


<a href='delete.php?id=".$row['id']."' 
onclick=\"return confirm('Are you sure?')\">

<button class='delete'>Delete</button>

</a>

</td>
";


echo "</tr>";

}


echo "</table>";

?>


</body>
</html>