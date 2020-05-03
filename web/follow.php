<?php 
include("db_connect.php");
$canBeFollowed = "SELECT * FROM users ";


$result = mysqli_query($conn, $canBeFollowed);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<div class='follwer'>";
        echo "<img src=" . $row["avater"] . " style='width:100px;height:100px;'>";
        echo "<h5>" . $row["userName"] . "</h5>";
        echo "<button>Follow</button>";
        echo "</div>";
    }
} else {
    echo "0 results";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check follow</title>
</head>
<body>


</body>
</html>