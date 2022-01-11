<?php
//  PHP: mysqli::$connect_error - Manual[^]
$server = "localhost";
$username = "root";
$password = "";
$database = "jobs";

session_start();
$conn = mysqli_connect($server, $username, $password, $database, "3307") or die('Not connected : Ah sh*t ' . mysqli_connect_error());
// if ($conn->connect_error) {
//     die("Connection Failed: $conn->connect_error");
// }
echo "";

if (isset($_POST['Submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $number = mysqli_real_escape_string($conn, $_POST['phone_no']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $sql = "INSERT INTO register(`Name`, `email`, `password`, `phone_no`)VALUES('$name','$email','$password','$number')";
    if (mysqli_query($conn, $sql)) {
        echo "Records inserted successfully";
    } else {
        echo "ERROR: Could not able to execute $sql." . mysqli_error($conn);
    }
}
if (isset($_POST['Login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * FROM register WHERE `email`='$email' AND `password`='$password'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if (mysqli_num_rows($result) == 1) {
        header("location: index.php");
    } else {
        $error = "Incorrect Email Id or Password";
    }
}
if (isset($_POST['job'])) {
    $cname = mysqli_real_escape_string($conn, $_POST['cname']);
    $position = mysqli_real_escape_string($conn, $_POST['position']);
    $Jdesc = mysqli_real_escape_string($conn, $_POST['Jdesc']);
    $skills = mysqli_real_escape_string($conn, $_POST['skills']);
    $CTC = mysqli_real_escape_string($conn, $_POST['CTC']);

    $job = "INSERT INTO `jobs`(`cname`, `position`, `Jdesc`, `skills`, `CTC`) VALUES('$cname','$position','$Jdesc','$skills','$CTC')";
    mysqli_query($conn, $job);
}
// mysqli_close($conn);
