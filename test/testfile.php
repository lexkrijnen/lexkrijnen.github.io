<?php
$db = "mysql:host=localhost; dbname=Wegro; port=3306";
$user = "wegro";
$pass = "SQLWegro@101";
$pdo = new PDO($db, $user, $pass);

//MEER WERK
$stmt3 = $pdo->prepare("SELECT klant_nummer, voornaam FROM Klant");
$stmt3->execute();
$queryresult3 = $stmt3->fetchAll();
var_dump($queryresult3);



foreach ($queryresult3 AS $klant) {
print($klant["klant_nummer"] . "<br>");
print($klant["voornaam"] . "<br>");
}

?>


<form>
<label>Klant Nummer </label>
<select name="klant_nummer">
    <?php
    foreach ($queryresult3 AS $klant) {
        print ('<option value="' . $klant["klant_nummer"] . '">' . $klant["voornaam"] . '</option>');
    }
    ?>
</select>
</form>