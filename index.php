<h1>Welkom in de groentewinkel</h1>

<ul>
    <li><a href="producttoevoegen.html">product toevoegen</a></li>
    <li><a href="toonbestellingen.php">Bestellingen</a></li>
    <li>menu item</li>
</ul>

<br><br>
<h2>Productenlijst</h2>

<?php
    include ('toonproducten.php');
?>

<br><br>
<h2>Alle Bestellingen</h2>

<?php
  include("toonbestellingen.php");
?>