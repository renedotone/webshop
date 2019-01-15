<?php
$klantnaam = $_POST['klantnaam'];
$klantplaats = $_POST['plaatsnaam'];
$klantemail = $_POST['email'];

try{
$conn = new PDO("mysql:host=localhost;dbname=webshopdb", "root", "");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare("INSERT INTO klanten (naam, woonplaats, email) VALUES (:fnaam, :fwoonplaats, :femail)");

$stmt->execute([
    'fnaam' => $klantnaam,
    'fwoonplaats' => $klantplaats,
    'femail' => $klantemail
]);

}

catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$conn = NULL;

header("Location: index.php");

?>  