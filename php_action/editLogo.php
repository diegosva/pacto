<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());	

	
    $ASOID = $_SESSION["asoId"];
    $NOMBREIMG=$_FILES['editAsoLogoImg']['name'];
    $TIPOIMG=$_FILES['editAsoLogoImg']['type'];
    $TAMANIOIMG=$_FILES['editAsoLogoImg']['size'];
	$RAIZ=$_SERVER['DOCUMENT_ROOT'].'/pacto/assests/images/logos/';
	$TEMP = $_FILES['editAsoLogoImg']['tmp_name'];
	
	
    $RUTA = "../pacto/assests/images/logos/$NOMBREIMG";
	
	$sql = "UPDATE ASOCIACION SET LOGOASO = '$RUTA'  WHERE ASOCIACIONID = $ASOID ";

	if($connect->query($sql) === TRUE && move_uploaded_file($TEMP,$RAIZ.$NOMBREIMG)) {
		
	 	$valid['success'] = true;
		$valid['messages'] = "Actualizado exitosamente. Aplicando cambios...";	
		

		header ("location: ../sociousers.php");
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error no se ha podido actualizar";
	}
	 
	$connect->close();

	echo json_encode($valid);
 

