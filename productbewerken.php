<?php
    $productid = $_GET['productid'];
    try {
        $conn = new PDO("mysql:host=localhost;dbname=webshopdb", 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            // let op: dit nog herschrijven als prepared statement
        $statement = $conn->prepare("SELECT * FROM producten WHERE id = :fproductid");
        $statement->execute([
         'fproductid' => $productid
         ]);
         
        while ($row = $statement->fetch()) {
            $productnaam = $row['naam'];
            $productprijs = $row['prijs'];
        }	
            
    }
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    
    $conn = null;	
?>

<form action="dbproductupdate.php" method="POST">

    <input name="productid" placeholder="Product id" value="<?php echo $productid ?>">
    <input name="productnaam" placeholder="Product naam" value="<?php echo $productnaam ?>">
    <input name="productprijs" placeholder="Product prijs" value="<?php echo $productprijs ?>"> 
    <button type="submit">Update</button>

</form>