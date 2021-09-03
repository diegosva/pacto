<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	


    $ReunionesTema = $_POST['editReunionesTema'];
	$ReunionesTipo = $_POST['editReunionesTipo'];
    $ReunionesEntidad = $_POST['editReunionesEntidad'];
    $ReunionesFecha = $_POST['editReunionesFecha'];
    $ReunionesHora = $_POST['editReunionesHora'];
	$ReunionesActa = $_POST['editReunionesActa'];
	$reunionesId = $_POST['editReunionesId'];

	
	$sql = "UPDATE reunion 	
    SET TEMAREU = '$ReunionesTema',
	 	TIPOREU = '$ReunionesTipo', 
	    ENTIDADID ='$ReunionesEntidad',
	 	FECHAINIREU ='$ReunionesFecha', 
	    HORAREU ='$ReunionesHora', 
		ACTA ='$ReunionesActa'
    
     WHERE REUNIONID = $reunionesId ";

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