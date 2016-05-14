<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ip2location";

$input = htmlspecialchars($_GET['ip']);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$ip= ip2long($input);
$sql = "SELECT country_name,region_name,city_name FROM `ip2location_db3` where $ip between ip_from and ip_to;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["city_name"]. ", " . $row["region_name"]. ", " . $row["country_name"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>