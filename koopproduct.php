<?php
$productid = $_GET['productid'];
$besteller = 'rmspijker@gmail.com';
$tebetalen = 0.00;

try {
    $conn = new PDO("mysql:host=localhost;dbname=webshopdb", 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // let op: dit nog herschrijven als prepared statement
    $statement = $conn->prepare("SELECT * FROM producten WHERE id = :fproductid");
    $statement->execute([
     'fproductid' => $productid
     ]);
     
    while ($row = $statement->fetch()) {
        $tebetalen = $row['prijs'];
    }	      
}

catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$conn = null;	

try {
    $conn = new PDO("mysql:host=localhost;dbname=webshopdb", 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $statement = $conn->prepare('INSERT INTO bestellingen (email, productid, tebetalen) VALUES (:femail, :fproductid, :ftebetalen)');
    $statement->execute([
    'femail' => $besteller,
    'fproductid' => $productid,
    'ftebetalen' => $tebetalen
    ]);	
}

catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
	
$conn = NULL;

header("Location: index.php");

?>