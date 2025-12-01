<?php
include "db.php";

if(!isset($_GET['id'])){
    die("Car not found!");
}

$id = $_GET['id'];
$car = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM cars WHERE id='$id'"));

if($_SERVER['REQUEST_METHOD'] === "POST"){
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $price = $_POST['price_per_day'];
    $fuel = $_POST['fuel_type'];
    $transmission = $_POST['transmission'];
    $image = $_POST['image'];
    $desc = $_POST['description'];

    $q = "UPDATE cars SET 
          name='$name',
          brand='$brand',
          price_per_day='$price',
          fuel_type='$fuel',
          transmission='$transmission',
          image='$image',
          description='$desc'
          WHERE id='$id'";

    if(mysqli_query($conn, $q)){
        echo "<script>alert('Car updated successfully'); window.location.href='admin.php';</script>";
    } else {
        echo "Error: ".mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Car - Admin</title>
<style>
body{font-family:Arial;background:#f2f2f2;margin:0;padding:0;}
.header{background:black;color:white;padding:20px;text-align:center;font-size:28px;}
.box{background:white;width:45%;margin:30px auto;padding:25px;border-radius:12px;box-shadow:0 0 12px #ccc;}
input, textarea, button{width:100%;padding:12px;margin:10px 0;border-radius:8px;border:1px solid #ccc;font-size:16px;}
button{background:black;color:white;cursor:pointer;font-weight:bold;}
button:hover{opacity:0.85;}
</style>
</head>
<body>

<div class="header">Edit Car Details</div>

<div class="box">
<form method="POST">
    <input type="text" name="name" placeholder="Car Name" value="<?php echo $car['name']; ?>" required>
    <input type="text" name="brand" placeholder="Brand" value="<?php echo $car['brand']; ?>" required>
    <input type="number" name="price_per_day" placeholder="Price per Day" value="<?php echo $car['price_per_day']; ?>" required>
    <input type="text" name="fuel_type" placeholder="Fuel Type" value="<?php echo $car['fuel_type']; ?>" required>
    <input type="text" name="transmission" placeholder="Transmission" value="<?php echo $car['transmission']; ?>" required>
    <input type="text" name="image" placeholder="Image URL" value="<?php echo $car['image']; ?>" required>
    <textarea name="description" placeholder="Description" rows="4"><?php echo $car['description']; ?></textarea>
    <button type="submit">Update Car</button>
</form>
</div>

</body>
</html>
