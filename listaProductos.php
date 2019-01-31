<?php
include("session.php");
include "errores.php";
set_error_handler("errores");

$select="select productName, quantityInStock from products order by quantityInStock desc;";

$resultado = mysqli_query($db, $select);

if ($resultado && mysqli_num_rows($resultado) > 0) {
	echo "<table border='2'>";
	echo "<tr>";
		echo "<th>Nombre de prodcuto</th><th>Cantidad</th>";
	echo "<tr>";
	while($fila = mysqli_fetch_assoc($resultado)) {
		echo "<tr>";
		   echo "<td>".$fila['productName']."</td><td>".$fila['quantityInStock']."</td>";
		echo "</tr>";
	}
	echo "</table>";
}else{
	echo "No hay productos en este momento";
}

echo "<br><br><br><a href='welcome.php'>Volver</a>";
?>