<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	
    $ReunionesTema = $_POST['ReunionesTema'];
	$ReunionesTipo = $_POST['ReunionesTipo'];
    $ReunionesEntidad = $_POST['ReunionesEntidad'];
    $ReunionesFecha = $_POST['ReunionesFecha'];
    $ReunionesHora = $_POST['ReunionesHora'];
	$ReunionesActa=$_POST['ReunionesActa'];


    

 

	$sql = "INSERT INTO reunion (TEMAREU, TIPOREU,TIPOREUNIONID ,ENTIDADID, FECHAINIREU, HORAREU, ACTA) 
	VALUES ('$ReunionesTema','$ReunionesTipo', 2 ,'$ReunionesEntidad','$ReunionesFecha','$ReunionesHora', '$ReunionesActa')";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Creado exitosamente";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error no se ha podido guardar";
	}

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST