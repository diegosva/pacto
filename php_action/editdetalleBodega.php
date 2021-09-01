<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

    $PRODUCTOID = $_POST['editdetalleBodegaName'];
    $UNIDADESID = $_POST['editdetalleBodegaUnidades']; 
    $DESCRIPBODEGA = $_POST['editdetalleBodegaDesc']; 
    $STOCKBODEGA = $_POST['editdetalleBodegaStock'];
    $PRECIOBODEGA = $_POST['editdetalleBodegaPrecio'];
    $detalleBodegaId = $_POST['editdetalleBodegaId']; 
    
	$sql = "UPDATE DETALLEBODEGA SET PRODUCTOID  = $PRODUCTOID,UNIDADESID  =  $UNIDADESID, STOCKBODEGA =  $STOCKBODEGA, PRECIOBODEGA =  $PRECIOBODEGA, DESCRIPBODEGA =  '$DESCRIPBODEGA' WHERE DETBODEGAID  = $detalleBodegaId ";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Actualizado exitosamente";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error no se ha podido actualizar";
	}
	 
	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST