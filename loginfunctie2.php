<!DOCTYPE html>
<html>
<?php
/* Database connection settings */
$db = "mysql:host=localhost; dbname=Wegro; port=3306";
$user = "wegro";
$pass = "SQLWegro@101";
$pdo = new PDO($db, $user, $pass);

session_start();
// Make sure email and hash variables aren't empty
if(isset($_GET['e-mailadres']) && !empty($_GET['e-mailadres']) AND isset($_GET['wachtwoord']) && !empty($_GET['wachtwoord']))
{
    ## $email = $pdo->escape_string($_GET['email']);
    ## $wachtwoord = $pdo->escape_string($_GET['wachtwoord']);
    $email = $pdo->quote($_GET['email']);
    $wachtwoord = $pdo->quote($_GET['wachtwoord']);

    // Select user with matching email and hash, who hasn't verified their account yet (active = 0)
    $result = $pdo->query("SELECT * FROM Klant WHERE e-mailadres='$email' AND wachtwoord='$wachtwoord'");
    $count = $result->rowCount();

    if ($result == 0) {
        print("Minder dat 1 rijen opgehaald, NIET INGELOGT.");
    } elseif ($result == 1) {
        print("BAM KUT INGELOGT");
    }
}
?>
<body>
<form action="/loginfunctie2.php" method="get">
    E-mailadres<br>
    <input type="text" name="e-mailadres" value="e-mailadres">
    <br>
    Wachtwoord<br>
    <input type="text" name="wachtwoord" value="wachtwoord">
    <br><br>
    <input type="submit" value="Submit">
</form>
</body>
</html>