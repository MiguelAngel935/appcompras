<?php
include("session.php");
include "errores.php";
set_error_handler("errores");

$f1=$_POST['f1'];
$f2=$_POST['f2'];


$select="select productName, quantityOrdered, priceEach, orders.orderNumber as numPed, orderDate, status
from orders, orderdetails, products where orders.customerNumber=(select id from admin where username='".$_SESSION['login_user']."') and
orders.orderNumber=orderdetails.orderNumber and orderdetails.productCode=products.productCode and (orders.requiredDate between '".$f1."' and '".$f2."');";

$resultado = mysqli_query($db, $select);


		if ($resultado && mysqli_num_rows($resultado) > 0) {
		
			echo "<table border='2'>";
			echo "<tr>";
				echo "<th>Nombre de producto</th><th>Cantidad</th><th>Precio unidad</th><th>Numero pedido</th><th>Fecha pedido</th><th>Estado</th>";
			echo "<tr>";
			while($fila = mysqli_fetch_assoc($resultado)) {
				echo "<tr>";
				   echo "<td>".$fila['productName']."</td><td>".$fila['quantityOrdered']."</td><td>".$fila["priceEach"]."</td><td>".$fila['numPed']."</td><td>".$fila['orderDate']."</td><td>".$fila['status']."</td>";
				echo "</tr>";
			}
			echo "</table>";
		}else{
			echo "No hay pedidos";
		}
echo "<br><br><br><a href='welcome.php'>Volver</a>";

?>