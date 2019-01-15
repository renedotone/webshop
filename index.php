<h1>Welkom in de groentewinkel</h1>

<ul>
    <li><a href="producttoevoegen.html">product toevoegen</a></li>
    <li><a href="toonbestellingen.php">Bestellingen</a></li>
    <li>menu item</li>
</ul>

<br><br>
<h2>Productenlijst</h2>

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
        echo "<a href='productbewerken.php?productid=" . $row['id'] . "'>Wijzigen</a>" . " "; 
        echo "<a href='koopproduct.php?productid=" . $row['id'] . "'>Kopen</a>"; 
        echo "</LI>";
    }
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$conn = NULL;
?>  

<br><br>
<h2>Alle Bestellingen</h2>

<?php
  include("toonbestellingen.php");
?>