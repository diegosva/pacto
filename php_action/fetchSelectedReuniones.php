<?php 	

require_once 'core.php';

$reunionesId = $_POST['reunionesId'];

$sql = "SELECT  REUNIONID,TEMAREU,TIPOREU,ENTIDADID,FECHAINIREU,HORAREU,ACTA
FROM reunion 
WHERE REUNIONID = $reunionesId ";


$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);