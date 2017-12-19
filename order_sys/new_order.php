
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

    <h2>New Order</h2>


    <form action="new.php" method="get">
        <div class="form-group">

            <label><b>Name</b></label>
            <input type="text" placeholder="Enter Name" id="ename" name="ename" value="">
        </div>
        <div class="form-group">

            <label><b>Phone</b></label>
            <input type="tel" placeholder="Enter Phone" name="ephone" value="" >
        </div>
        <div class="form-group">

            <label><b>Defect</b></label>
            <select name="defect" >
                <?php
                $sqll="SELECT defect FROM defect";

                $res = $con->query($sqll);

                while ($row1 = $res->fetch_assoc()){
                    /* echo "<option value="'.$row1['defect'].'" >" . $row1['defect'] . "</option>"; */

                        echo '<option  value = "'.$row1['defect'].'">'.$row1['defect'].'</option>';

                }
                ?>

            </select>
        </div>

        <div class="form-group">


            <label><b>Status</b></label>
            <select name="status">
                <?php
                $sqll="SELECT status FROM status_table";

                $res = $con->query($sqll);

                while ($row1 = $res->fetch_assoc()){


                        echo '<option  value = "'.$row1['status'].'">'.$row1['status'].'</option>';

                }
                ?>
            </select>
        </div>
        <div class="form-group">

            <input type="submit" value="submit" id="submit" name="submit">
        </div>
    </form>

</body>
</html>
