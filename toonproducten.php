
<form>
    <input name="naamfilter" placeholder="Naam bevat...">
    <input type="submit" value="Filter">
</form>

<?php

if(isset($_GET['naamfilter']))
    {
        $naamfilter = $_GET['naamfilter'];
    }
    else
    {  
        $naamfilter = "";
    }    

try{
    $conn = new PDO("mysql:host=localhost;dbname=webshopdb", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->query("select * from producten WHERE naam LIKE '%$naamfilter%'");
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