<?php
if (!isset ($_GET["id"])){
echo "Parametar ID nije prosleđen!";
} else {
$pomocna=$_GET["id"];
//uspostavljanje konekcije
include "Database.php";
$crud = new Database("api_db");
//citanje podataka o proizvodu
$sql="SELECT * FROM products WHERE category_id='".$pomocna."'";
$crud->ExecuteQuery($sql);
$rezultat = $crud -> getResult();
//ispis naziva kolona u tabeli
echo "<table style='width:100%; border-spacing:0;'>
<tr>
<th>Name</th>
<th>Description</th>
<th>Price</th>
</tr>";
//ispis podataka o proizvodu
while($red = $rezultat->fetch_object()){
 echo "<tr>";
 echo "<td>" . $red->name . "</td>";
 echo "<td>" . $red->description . "</td>";
 echo "<td>" . $red->price . "</td>";
 echo "</tr>";
 }
echo "</table>";
}
?>
