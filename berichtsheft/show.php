<?php
include('db.php');
include('navigation.php');

// Alle Lektionen abrufen
$sql = "SELECT lektionen.id, kurse.kurs, lektionen.inhalt, lektionen.datum 
        FROM lektionen 
        JOIN kurse ON lektionen.kursId = kurse.id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alle Einträge anzeigen</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Alle Lektionen</h2>

<ul>
    <?php while($row = $result->fetch_assoc()) { ?>
        <li><strong><?= $row['kurs']; ?></strong> - <?= $row['inhalt']; ?> (am <?= $row['datum']; ?>)</li>
    <?php } ?>
</ul>

</body>
</html>

<?php
$conn->close();
?>
