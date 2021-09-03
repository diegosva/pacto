<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if ($_POST) {

	$PRODUCTOID = $_POST['editdetalleBodegaName'];
	$UNIDADESID = $_POST['editdetalleBodegaUnidades'];
	$DESCRIPBODEGA = $_POST['editdetalleBodegaDesc'];
	$STOCKBODEGA = $_POST['editdetalleBodegaStock'];
	$PRECIOBODEGA = $_POST['editdetalleBodegaPrecio'];
	$detalleBodegaId = $_POST['editdetalleBodegaId'];


	$sql = "UPDATE DETALLEBODEGA SET PRODUCTOID  = $PRODUCTOID,UNIDADESID  =  $UNIDADESID, STOCKBODEGA =  $STOCKBODEGA, PRECIOBODEGA =  $PRECIOBODEGA, DESCRIPBODEGA =  '$DESCRIPBODEGA' WHERE DETBODEGAID  = $detalleBodegaId ";
	$EJECUTADO = mysqli_query($connect, $sql);


	if ($EJECUTADO) {
		$sql1 = "SELECT SUM(STOCKBODEGA) FROM DETALLEBODEGA WHERE PRODUCTOID = $PRODUCTOID ";
		$EJECUTADO1 = mysqli_query($connect, $sql1);

		while ($row = $EJECUTADO1->fetch_array()) {
			$STOCKSUMA = $row[0];
		}



		if ($EJECUTADO1) {

			// $sql2 = "SELECT STOCKPRODUCT FROM PRODUCTO WHERE PRODUCTOID  = $PRODUCTOID ";
			// $EJECUTADO2 = mysqli_query($connect, $sql2);


			// while ($row = $EJECUTADO2->fetch_array()) {
			// 	$STOCK = $row[0];
			// }


			// if ($EJECUTADO2) {
			$sql3 = "UPDATE PRODUCTO SET STOCKPRODUCT=  $STOCKSUMA  WHERE PRODUCTOID  = $PRODUCTOID ";
			$EJECUTADO3 = mysqli_query($connect, $sql3);
			// }

			if ($EJECUTADO3) {
				$valid['success'] = true;
				$valid['messages'] = "Actualizado exitosamente";
			} else {
				$valid['success'] = false;
				$valid['messages'] = "Error no se ha podido actualizar";
			}
		}
	}








	$connect->close();

	echo json_encode($valid);
} // /if $_POST