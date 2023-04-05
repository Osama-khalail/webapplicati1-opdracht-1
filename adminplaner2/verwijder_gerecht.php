<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerecht verwijderen</title>
    <link rel="stylesheet" href="css/verwijder.css">
    <?php
  require_once './database/conn.php';
?>
</head>
<?php
// Connectie met database...
$dsn = 'mysql:dbname=db_login;host=127.0.0.1';
$user = 'root';
$password = '';
$dbh = new PDO($dsn, $user, $password);

// Verwerk formulier
if (isset($_POST['verwijderen'])) {
    $gerecht_id = $_POST['gerecht_id'];
    
    // Voer query uit om het geselecteerde gerecht te verwijderen
    $stmt = $dbh->prepare("DELETE FROM menu WHERE id = :id");
    $stmt->bindParam(':id', $gerecht_id);
    $stmt->execute();

    header("Location: index.php");
    exit;
}

// Voer query uit om alle gerechten op te halen
$stmt = $dbh->query("SELECT * FROM menu");

// Maak een array van alle gerechten voor gebruik in keuzelijst
$gerechten = array();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $gerechten[$row['id']] = $row['naam'];
}

// Sluit de databaseverbinding
$dbh = null;
?>

<div class="container">
    <h2>Selecteer een gerecht om te verwijderen</h2>
    <form method="POST">
    <a href="index.php" class="terug-button">Terug naar adminplaner </a>
        <label for="gerecht">Gerecht:</label>
        <select name="gerecht_id" id="gerecht">
            <?php foreach ($gerechten as $id => $naam) { ?>
                <option value="<?php echo $id; ?>"><?php echo $naam; ?></option>
            <?php } ?>
        </select>
        <input type="submit" name="verwijderen" value="Verwijderen">
    </form>
</div>



</html>
