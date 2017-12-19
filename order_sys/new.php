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

    $uname = $con->real_escape_string($_GET['ename']);
    $uphone = $con->real_escape_string($_GET['ephone']);
    $udefect = $con->real_escape_string($_GET['defect']);

    $ustatus = $con->real_escape_string($_GET['status']);



    $today = date("Y-m-d H:i:s");

    $sql1 = "SELECT defect.id FROM defect WHERE defect.defect ='$udefect'";
    $ran1 = $con->query($sql1);
    $number1 = $ran1->fetch_assoc();
    $n1 = $number1['id'];

    $sql2 = "SELECT status_table.id FROM status_table WHERE status_table.status ='$ustatus'";
    $ran2 = $con->query($sql2);
    $number2 = $ran2->fetch_assoc();
    $n2 = $number2['id'];

    $sql="INSERT INTO orders (`id`, `name`, `phone`, `defect`, `time`, `status`) VALUES (NULL, '$uname', '$uphone', '$n1', '$today', '$n2')";



    if ($con->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Refresh: 2; url=profile_test.php");



    } else {
        echo "Error updating record: " . $con->error;
    }




}

else {
    echo "problem";
}
?>