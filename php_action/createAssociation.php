<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$NOMBREASO = $_POST['NOMBREASO'];
    $SECTORASO = $_POST['SECTORASO']; 
    $BARRIOASO = $_POST['BARRIOASO']; 
    $PARROQUIAASO = $_POST['PARROQUIAASO']; 
    $LOGOASO = $_POST['LOGOASO']; 
    $STATUSASO = $_POST['STATUSASO']; 

    $sql = "INSERT INTO asociacion (NOMBREASO, SECTORASO, BARRIOASO, PARROQUIAASO, LOGOASO, STATUSASO)
    VALUES ('$NOMBREASO','$SECTORASO','$BARRIOASO','$PARROQUIAASO','$LOGOASO',$STATUSASO)";


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