<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "root";
$database = "world";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Construct a query
$sql = "select city.Name as CityName, country.Name as CountryName, city.Population
from city, country
where city.CountryCode = country.Code AND
country.Name = \"Denmark\"
order by Population DESC ;";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    echo '[';

    while($row = $result->fetch_assoc()) {

        $myJSON = json_encode($row);

        echo $myJSON;
        echo ",";

    }

    echo "{}]";
} else {
    echo "0 results";
}

$conn->close();

?>