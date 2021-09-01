<?php 	

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$detbodegaId = $_POST['detbodegaId']; 



 $sql = "DELETE FROM DETALLEBODEGA WHERE DETBODEGAID = $detbodegaId ";

 if($connect->query($sql) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "Eliminado exitosamente";		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Error no se ha podido eliminar";
 }
 
 $connect->close();

 echo json_encode($valid);
 
