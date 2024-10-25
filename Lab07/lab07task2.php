<?php
$xmlstr = <<<XML
<?xml version='1.0' standalone='yes'?>
<brightstar>
    <name>Sirius</name>
    <magnitude>1.45</magnitude>
    <distance>9</distance>

    <name>canopus</name>
    <magnitude>-5.53</magnitude>
    <distance>310</distance>

    <name>Rigil Kentaurus</name>
    <magnitude>4.34</magnitude>
    <distance>4</distance>
</brightstar>
XML;
$xml = new SimpleXMLElement($xmlstr);

$servername = "localhost";
$username = "username";
$password = "";
$dbname = "db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

foreach ($xml->children() as $star) {
    $name = $star->name;
    $magnitude = $star->magnitude;
    $distance = $star->distance;
    
    $sql = "INSERT INTO stars (name, magnitude, distance) VALUES ('$name', '$magnitude', '$distance')";
    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully<br>";
    } else {
        echo "Error inserting record: " . $conn->error . "<br>";
    }
}
$sql = "SELECT * FROM stars";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <table>
        <tr>
            <th>Name</th>
            <th>Magnitude</th>
            <th>Distance</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) : ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['magnitude']; ?></td>
            <td><?php echo $row['distance']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>