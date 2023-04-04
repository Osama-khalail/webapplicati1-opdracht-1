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
    $stmt = $dbh->prepare("DELETE FROM menu WHERE id = ?");
    $stmt->execute(array($gerecht_id));
    header("Location: index.php");
    exit;
}
?>

<div class="container">
    <h2>Verwijder een gerecht</h2>
    <form method="POST">
    <a href="index.php" class="terug-button">Terug naar adminplaner </a>
        <label for="gerecht_id">Gerecht ID:</label>
        <input type="text" name="gerecht_id" id="gerecht_id">
        <input type="submit" name="verwijderen" value="Verwijderen">
    </form>
</div>


</html>