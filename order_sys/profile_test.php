
<?php
$host = "127.0.0.1:3306";
$user = "root";
$pass = "";

$con = mysqli_connect($host,$user,$pass,"mechanic");



if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$conn = mysqli_connect('127.0.0.1:3306','root','') or trigger_error("SQL", E_USER_ERROR);
$db = mysqli_select_db($conn,'mechanic');
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
    <div class="col-lg-9 col-lg-offset-1 dashboard well well-lg">

        <?php
        $query="SELECT COUNT(id) as com FROM orders WHERE orders.status = 1 ";
        $ran = $con->query($query);
        $number = $ran->fetch_assoc();
        ?>
        <div class="col-lg-3 dash-box dash-com well well-lg"><?php echo $number['com']; ?><h2>Complete</h2></div> <?php
        $query1="SELECT COUNT(id) as decn FROM orders WHERE orders.status = 2 ";
        $ran1 = $con->query($query1);
        $number1 = $ran1->fetch_assoc();
        ?>
        <div class="col-lg-3 dash-box dash-dec well well-lg"><?php echo $number1['decn']; ?><h2>Declined</h2></div> <?php
        $query="SELECT COUNT(id) as openn FROM orders WHERE orders.status = 3 ";
        $ran = $con->query($query);
        $number = $ran->fetch_assoc();
        ?>
        <div class="col-lg-3 dash-box dash-ny well well-lg"><?php echo $number['openn']; ?><h2>Opened</h2></div> <?php
        $query="SELECT COUNT(id) as total FROM orders WHERE orders.status = 4 ";
        $ran = $con->query($query);
        $number = $ran->fetch_assoc();
        ?>
        <div class="col-lg-3 dash-box dash-pr well well-lg"><?php echo $number['total']; ?><h2>Processed</h2></div>



        <table class="table table-striped well well-lg">
<tr><td>Order no.</td><td>Customer Name</td><td>Phone</td><td>Defect</td><td>Price</td><td>Status</td><td>Tools</td><td></td><td></td></tr>
<?php



$sql = "SELECT COUNT(*) FROM orders";
$result = mysqli_query($conn,$sql) or trigger_error("SQL", E_USER_ERROR);
$r = mysqli_fetch_row($result);
$numrows = $r[0];

$rowsperpage = 10;
$totalpages = ceil($numrows / $rowsperpage);

if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
    $currentpage = (int) $_GET['currentpage'];
} else {
    $currentpage = 1;
}
if ($currentpage > $totalpages) {
    $currentpage = $totalpages;
}
if ($currentpage < 1) {
    $currentpage = 1;
}
$offset = ($currentpage - 1) * $rowsperpage;


$sql = "SELECT orders.id,orders.name,orders.phone, defect.defect, defect.price, status_table.status FROM orders INNER JOIN defect ON orders.defect=defect.id
 INNER JOIN status_table ON orders.status=status_table.id LIMIT $offset, $rowsperpage";

$result = mysqli_query($conn,$sql) or trigger_error("SQL", E_USER_ERROR);

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>".$row["id"]."</td><td> " . $row["name"]. " </td><td> " . $row["phone"]." </td><td>" .$row["defect"].  " </td><td>".$row["price"]. "</td><td>".$row["status"]."</td><td><a href='edit.php?id=".$row["id"]."' class=\"btn btn-info\" role=\"button\">Edit</a></td>
<td>

<form method='get' action='profile_test.php?currentpage=".$currentpage."'>

    <input type='hidden' name='id' id='id' value='".$row["id"]."' >

<input class='btn-danger btn' value='X' id='delete' type='submit' name='delete'>
</form>

</td>
<td>

<form method='get' action='profile_test.php'>

    <input type='hidden' name='id' id='id' value='".$row["id"]."' >

<input class='btn-success btn' value='Y' id='complete' type='submit' name='complete'>
</form>

</td>
</tr>";



}

if(isset($_GET['delete'])){
    $delid = $con->real_escape_string($_GET['id']);

    $sqld="DELETE FROM orders WHERE orders.id='$delid'";

    if ($con->query($sqld) === TRUE) {
        echo "Record deleted successfully";
       /* $page = $_SERVER['PHP_SELF'];
        $sec = "0";
        header("Refresh: $sec; url=$page");*/
    } else {
        echo "Error deleting record: " . $conn->error;
    }


}

if(isset($_GET['complete'])){
    $delic = $con->real_escape_string($_GET['id']);

    $sqlc="UPDATE orders SET orders.status = '1' WHERE orders.id='$delic'";

    if ($con->query($sqlc) === TRUE) {
        echo "Record updated successfully";
        /*$page = $_SERVER['PHP_SELF'];
        $page .= "?currentpage=$currentpage";
        $sec = "0";
        print_r($page);
        print_r($delic);
       header("Refresh: $sec; url=$page");*/
    } else {
        echo "Error deleting record: " . $conn->error;
    }


}


?>

</table>
<div class="page-list">

        <?php


        $range = 3;

        if ($currentpage > 1) {
            echo " <a class='pag' href='{$_SERVER['PHP_SELF']}?currentpage=1'> << </a> ";
            $prevpage = $currentpage - 1;
            echo " <a class='pag' href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage'> < </a> ";
        }

        for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
            if (($x > 0) && ($x <= $totalpages)) {
                if ($x == $currentpage) {
                    echo " [<b>$x</b>] ";
                } else {
                    echo " <a class='pag' href='{$_SERVER['PHP_SELF']}?currentpage=$x'>$x</a> ";
                }
            }
        }

        if ($currentpage != $totalpages) {
            $nextpage = $currentpage + 1;
            echo " <a class='pag' href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage'> > </a> ";
            echo " <a class='pag' href='{$_SERVER['PHP_SELF']}?currentpage=$totalpages'> >> </a> ";
        }



        ?>
</div>
    </div>




</body>
</html>
