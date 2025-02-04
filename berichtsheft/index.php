<?php
include('db.php');
include('navigation.php');

// Kursauswahl für das Dropdown-Menü abrufen
$kurse_result = $conn->query("SELECT * FROM kurse");

if (isset($_POST['add_lektion'])) {
    $kursID = $_POST['kursID'];
    $inhalt = $_POST['inhalt'];

    $sql = "INSERT INTO lektionen (kursId, inhalt) VALUES ('$kursID', '$inhalt')";

    if ($conn->query($sql) === TRUE) {
        header('Location: success.php');
    } else {
        echo "Fehler: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neue Lektion hinzufügen</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Neue Lektion hinzufügen</h2>

<form method="POST">
    <label for="kursID">Wähle einen Kurs:</label>
    <select name="kursID" id="kursID" required>
        <?php while($row = $kurse_result->fetch_assoc()) { ?>
            <option value="<?= $row['id']; ?>"><?= $row['kurs']; ?></option>
        <?php } ?>
    </select>

    <br>

    <label for="inhalt">Inhalt der Lektion:</label>
    <textarea id="inhalt" name="inhalt" required></textarea>

    <br>

    <button type="submit" name="add_lektion">Lektion hinzufügen</button>
</form>

</body>
</html>

<?php
$conn->close();
?>
