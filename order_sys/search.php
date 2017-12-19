
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

<div class="col-lg-1 menu">
    <h2>Logged in user:</h2>
    <ul>
        <li><a href="profile_test.php">Dashboard</a></li>
        <li><a href="new_order.php">New Order</a></li>

        <li><a href="search.php">Order Detail</a></li>
        <li><a>Settings</a></li>

    </ul>
</div>
<div class="col-lg-9 col-lg-offset-1 well well-lg">

    <h2>Search</h2>


    <form action="search.php" method="get">
        <div class="form-group">

            <label><b>Search</b></label>
            <input type="text" placeholder="" id="esearch" name="esearch" value="">
        </div>

        <div class="form-group">

            <input type="submit" value="submit" id="submit" name="submit">
        </div>
    </form>

    <table class="table table-striped">
        <tr><td>Order no.</td><td>Customer Name</td><td>Phone</td><td>Defect</td><td>Status</td><td>Tools</td></tr>
<?php

    if(isset($_GET['submit'])){

        $srch = $con->real_escape_string($_GET['esearch']);


    $sqlc="SELECT orders.id, orders.name, orders.phone, defect.defect, status_table.status FROM orders INNER JOIN defect ON orders.defect = defect.id INNER JOIN status_table ON orders.status = status_table.id WHERE orders.name='$srch' OR orders.id='$srch'";


        $result = $con->query($sqlc);

        if ($result->num_rows > 0) {

            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["id"]."</td><td> " . $row["name"]. " </td><td> " . $row["phone"]." </td><td>" .$row["defect"].  " </td><td>".$row["status"]."</td><td><a href='edit.php?id=".$row["id"]."' class=\"btn btn-info\" role=\"button\">Edit</a></td>

</tr>";

            }
        } else {
            echo "0 results";
        }




    }

    ?>
    </table>
</body>
</html>
