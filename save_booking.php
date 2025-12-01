<?php
include "db.php";

if($_SERVER['REQUEST_METHOD'] !== "POST"){
    die("Invalid access!");
}

$car_id     = $_POST['car_id'];
$fullname   = $_POST['fullname'];
$email      = $_POST['email'];
$phone      = $_POST['phone'];
$start_date = $_POST['start_date'];
$end_date   = $_POST['end_date'];
$message    = $_POST['message'];

$query = "INSERT INTO bookings (car_id, fullname, email, phone, start_date, end_date, message)
VALUES ('$car_id', '$fullname', '$email', '$phone', '$start_date', '$end_date', '$message')";

if(mysqli_query($conn, $query)){
    $last_id = mysqli_insert_id($conn);
} else {
    die("Error saving booking!");
}
?>

<!DOCTYPE html>
<html>
<head>
<script>
// Redirect with JS (NO PHP redirect)
window.location.href = "confirm.php?id=<?php echo $last_id; ?>";
</script>
</head>
<body>
</body>
</html>
