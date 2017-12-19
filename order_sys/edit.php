<?php
$host = "127.0.0.1:3306";
$user = "root";
$pass = "";

$con = mysqli_connect($host,$user,$pass,"mechanic");

if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}



if (isset($_GET))  {
    $uid = $con->real_escape_string($_GET['id']);


}

else {
    echo "problem";
}



$sql = "SELECT orders.id,orders.name,orders.phone, defect.defect, defect.price, status_table.status FROM orders INNER JOIN defect ON orders.defect=defect.id INNER JOIN status_table ON orders.status=status_table.id WHERE orders.id=$uid";

$result = $con->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {

        $uname = $row["name"];
        $uphone = $row["phone"];
        $udefect = $row["defect"];
        $uprice = $row["price"];
        $ustatus = $row["status"];
    }
} else {
    echo "0 results";
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
<div class="col-lg-9 col-lg-offset-1 well well-lg>

<form action="update.php" method="get">
    <input type="hidden" name="id" id="id" value="<?php echo $uid; ?>" />
    <div class="form-group">

    <label><b>Name</b></label>
    <input type="text" placeholder="Enter Name" id="ename" name="ename" value="<?php echo $uname ?>">
    </div>
    <div class="form-group">

    <label><b>Phone</b></label>
    <input type="tel" placeholder="Enter Age" name="ephone" value="<?php echo $uphone?>" >
    </div>
    <div class="form-group">

    <label><b>Defect</b></label>
        <select name="defect" >
            <?php
            $sqll="SELECT defect FROM defect";

            $res = $con->query($sqll);

            while ($row1 = $res->fetch_assoc()){
                /* echo "<option value="'.$row1['defect'].'" >" . $row1['defect'] . "</option>"; */
                if($row1['defect']==$udefect) {
                    echo '<option selected value = "'.$row1['defect'].'">'.$row1['defect'].'</option>';

                }
                else {
                    echo '<option  value = "'.$row1['defect'].'">'.$row1['defect'].'</option>';

                }
            }
            ?>

        </select>
    </div>
    <div class="form-group">

    <label><b>Price</b></label>
    <input type="text" placeholder="Enter Superpower" name="eprice" value="<?php echo $uprice ?>">
    </div>
    <div class="form-group">


    <label><b>Status</b></label>
    <select name="status">
        <?php
        $sqll="SELECT status FROM status_table";

        $res = $con->query($sqll);

        while ($row1 = $res->fetch_assoc()){

            if($row1['status']==$ustatus) {
                echo '<option selected value = "'.$row1['status'].'">'.$row1['status'].'</option>';

            }
            else {
            echo '<option  value = "'.$row1['status'].'">'.$row1['status'].'</option>';        }

        }
        ?>
    </select>
    </div>
    <div class="form-group">

    <input type="submit" value="submit" id="submit" name="submit">
    </div>
</form>

</div>
</body>
</html>
