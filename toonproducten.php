<?php

try{
    $conn = new PDO("mysql:host=localhost;dbname=webshopdb", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->query("SELECT * FROM producten");
    while ($row = $stmt->fetch()) {
        echo "<li>" . $row['naam'] . " : " . $row['prijs']. "</li>";
    }

}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$conn = NULL;
?>  