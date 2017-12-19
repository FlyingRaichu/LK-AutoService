
<?php
$host = "127.0.0.1:3306";
$user = "root";
$pass = "";

$con = mysqli_connect($host,$user,$pass,"mechanic");

if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Orders - dashboard</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet">

</head>
<body>

    <div class="col-lg-3">
        <h2>Logged in user:</h2>
    </div>
    <div class="col-lg-9">

        <?php
        $query="SELECT COUNT(id) as com FROM orders WHERE orders.status = 1 ";
        $ran = $con->query($query);
        $number = $ran->fetch_assoc();
        ?>
        <div class="col-lg-3 dash-box"><?php echo $number['com']; ?><h2>Complete</h2></div> <?php
        $query1="SELECT COUNT(id) as decn FROM orders WHERE orders.status = 2 ";
        $ran1 = $con->query($query1);
        $number1 = $ran1->fetch_assoc();
        ?>
        <div class="col-lg-3 dash-box"><?php echo $number1['decn']; ?><h2>Declined</h2></div> <?php
        $query="SELECT COUNT(id) as openn FROM orders WHERE orders.status = 3 ";
        $ran = $con->query($query);
        $number = $ran->fetch_assoc();
        ?>
        <div class="col-lg-3 dash-box"><?php echo $number['openn']; ?><h2>Opened</h2></div> <?php
        $query="SELECT COUNT(id) as total FROM orders WHERE orders.status = 4 ";
        $ran = $con->query($query);
        $number = $ran->fetch_assoc();
        ?>
        <div class="col-lg-3 dash-box"><?php echo $number['total']; ?><h2>Processed</h2></div>



        <table class="table table-striped">
<tr><td>Order no.</td><td>Customer Name</td><td>Phone</td><td>Defect</td><td>Price</td><td>Status</td><td>Tools</td><td></td><td></td></tr>
<?php


$sql = "SELECT orders.id,orders.name,orders.phone, defect.defect, defect.price, status_table.status FROM orders INNER JOIN defect ON orders.defect=defect.id INNER JOIN status_table ON orders.status=status_table.id";

$result = $con->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td> " . $row["name"]. " </td><td> " . $row["phone"]." </td><td>" .$row["defect"].  " </td><td>".$row["price"]. "</td><td>".$row["status"]."</td><td><a href='edit.php?id=".$row["id"]."' class=\"btn btn-info\" role=\"button\">Edit</a></td>
<td>

<form method='get' action='profile.php'>

    <input type='hidden' name='id' id='id' value='".$row["id"]."' >

<input class='btn-danger btn' value='X' id='delete' type='submit' name='delete'>
</form>

</td>
<td>

<form method='get' action='profile.php'>

    <input type='hidden' name='id' id='id' value='".$row["id"]."' >

<input class='btn-success btn' value='Y' id='complete' type='submit' name='complete'>
</form>

</td>
</tr>";

    }
} else {
    echo "0 results";
}

if(isset($_GET['delete'])){
    $delid = $con->real_escape_string($_GET['id']);

    $sqld="DELETE FROM orders WHERE orders.id='$delid'";

    if ($con->query($sqld) === TRUE) {
        echo "Record deleted successfully";
        $page = $_SERVER['PHP_SELF'];
        $sec = "0";
        header("Refresh: $sec; url=$page");
    } else {
        echo "Error deleting record: " . $conn->error;
    }


}

if(isset($_GET['complete'])){
    $delic = $con->real_escape_string($_GET['id']);

    $sqlc="UPDATE orders SET orders.status = '1' WHERE orders.id='$delic'";

    if ($con->query($sqlc) === TRUE) {
        echo "Record deleted successfully";
        $page = $_SERVER['PHP_SELF'];
        $sec = "0";
        header("Refresh: $sec; url=$page");
    } else {
        echo "Error deleting record: " . $conn->error;
    }


}


?>

</table>
    </div>




<?php







    ?>


</body>
</html>
