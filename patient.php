<!DOCTYPE html>
<html>
<head>
<style>
th, td {
    border:  1px solid #ddd;
    padding:8px;
}
 table{
    border-collapse: collapse;
    width:80%;
    margin:auto;
 }
th {
    height: 20px;
    text-align:left;
}
th, td {
    padding: 15px;
    text-align: left;
}
tr:hover {background-color: #f5f5f5;}
tr:nth-child(even) {background-color: #f2f2f2;}
th {
    background-color: #ffa300;
    color: white;
}
.heading{
    text-align:center;
    font-size:28px;
    font-weight:bold;
    color: #BF0040;
}
hr{
    color:orange;
    width:80%;
    height:4px;
    background-color:orange;
}
</style>
<title>Patients Appointment</title>
</head>
<body>
<div class="heading">Appointment List</div><hr>
<?php
$servername = "fdb19.biz.nf";
$username = "2674802_root";
$password = "anmol@2604";
$dbname = "2674802_root";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name,phone,age,addr,date,description  FROM appointment";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Name</th><th>Phone</th><th>Age</th><th>Address</th><th>date</th><th>Illness</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>". "</td><td>" . $row["name"]. "</td><td>". $row["phone"] . "</td><td>". $row["age"]."</td><td>". $row["addr"].
        "</td><td>". $row["date"]. "</td><td>". $row["description"].
        "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
<br><br><br><br>
</body>
</html>