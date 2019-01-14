<?php

try{
    $conn = new PDO("mysql:host=localhost;dbname=webshopdb", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->query("SELECT * FROM producten");
    while ($row = $stmt->fetch()) {
        echo "<LI>" . $row['naam'] . " : " . $row['prijs'] ." ";
        echo "<a href='dbproductverwijderen.php?productid=" . $row['id'] . "'>Verwijder</a>" . " ";
        echo "<a href='productbewerken.php?productid=" . $row['id'] . "'>Wijzigen</a>"; 
        echo "</LI>";
    }

}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$conn = NULL;
?>  