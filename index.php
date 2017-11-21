<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/tablesorter/jquery.tablesorter.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>

</head>
<body>
<h1>My PHP/MySQL notes</h1>
<p>An example of obtaining data from the database.</p>

<?php
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
echo "<!-- Connected successfully -->";

// Construct a query
$sql = "select city.Name as CityName, country.Name as CountryName, city.Population
from city, country
where city.CountryCode = country.Code AND
country.Name = \"Denmark\"
order by Population DESC ;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='table table-striped tablesorter' id='countries' >";
    echo "<thead> 
<tr> 
    <th>City</th> 
    <th>Population</th> 

</tr> 
</thead> ";
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>";
        echo $row["CityName"];
        echo "</td>";
        echo "<td>";
        echo $row["Population"];
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();

?>
<script>$(document).ready(function () {
            $("#countries").tablesorter();
        }
    );
</script>
</body>
</html>
