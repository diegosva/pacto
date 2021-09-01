<?php 	

require_once 'core.php';




$sql = "SELECT USUARIOID , USUARIO.ROLID, 
ROLNOM, NOMBREUSU, EMAILUSU ,TELCUSU, 
TELCELUSU, CONTRAUSU, DIRUSU, 
NOMBREAPEUSU, STATUSUSU FROM USUARIO,ROL WHERE  USUARIO.ROLID = ROL.ROLID";

$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);