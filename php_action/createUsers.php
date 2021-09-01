<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if ($_POST) {

	$NOMBREUSU = $_POST['NOMBREUSU'];
	$ROLID = $_POST['ROLID'];
	$EMAILUSU = $_POST['EMAILUSU'];
	$TELCUSU = $_POST['TELCUSU'];
	$TELCELUSU = $_POST['TELCELUSU'];
	$CONTRAUSU = md5($_POST['CONTRAUSU']);
	$DIRUSU = $_POST['DIRUSU'];
	$NOMBREAPEUSU = $_POST['NOMBREAPEUSU'];
	$ASOSIACIONID = $_POST['ASOSIACIONID'];
	$CEDULAUSU = $_POST['CEDULAUSU'];
	$STATUSUSU = 1;


	// $sql4 = "SELECT NOMBREUSU FROM USUARIO";
	// $EJECUTADO4 = mysqli_query($connect, $sql4);
	// while ($row = $EJECUTADO2->fetch_array()) {
	// 	$USUARIO = $row[0];
	// }

	// if ($NOMBREUSU == $USUARIO) {

	// 	$valid['success'] = true;
	// 	$valid['messages'] = "Este usuario ya existe";


	// } else {

		$sql1 = "INSERT INTO USUARIO (NOMBREUSU, ROLID,EMAILUSU,TELCUSU,TELCELUSU,CONTRAUSU,DIRUSU,NOMBREAPEUSU,STATUSUSU,CEDULAUSU) 
		VALUES ('$NOMBREUSU', $ROLID,'$EMAILUSU', '$TELCUSU','$TELCELUSU', '$CONTRAUSU', ' $DIRUSU', '$NOMBREAPEUSU',$STATUSUSU,'$CEDULAUSU')";
		$EJECUTADO1 = mysqli_query($connect, $sql1);



		if ($EJECUTADO1) {
			$sql2 = "SELECT LAST_INSERT_ID();";
			$EJECUTADO2 = mysqli_query($connect, $sql2);
			while ($row = $EJECUTADO2->fetch_array()) {
				$ULTIMOINGRESADO = $row[0];
			}

			$sql3 = "INSERT INTO PERTENECEN (USUARIOID,ASOCIACIONID) VALUES ($ULTIMOINGRESADO,$ASOSIACIONID)";
			$EJECUTADO3 = mysqli_query($connect, $sql3);
		}



		if ($EJECUTADO3) {
			$valid['success'] = true;
			$valid['messages'] = "Creado exitosamente";
		} else {
			$valid['success'] = false;
			$valid['messages'] = "Error no se ha podido guardar";
		}


		$connect->close();

		echo json_encode($valid);
	// }
} // /if $_POST