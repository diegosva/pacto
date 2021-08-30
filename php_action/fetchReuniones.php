<?php 	

require_once 'core.php';

	$sql = "SELECT   TEMAREU, TIPOREU, ENTIDADID, FECHAINIREU, HORAREU, ACTA,REUNIONID
	FROM reunion
	WHERE TIPOREUNIONID = 2";
$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

 // $row = $result->fetch_array();
 


 while($row = $result->fetch_array()) {
 	$reunionesId = $row[6];
	$sql1 = "SELECT entidad.NOMBREENT, TIPOREU FROM reunion, entidad WHERE entidad.ENTIDADID = reunion.ENTIDADID AND REUNIONID = $reunionesId";
	$result1 = $connect->query($sql1);
	while($rows=$result1->fetch_array()){
		$enti = $rows[0];
	}

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Acción <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" data-toggle="modal" id="editReunionesModalBtn" data-target="#editReunionesModal" onclick="editReuniones('.$reunionesId.')"> <i class="glyphicon glyphicon-edit"></i> Editar</a></li>
		<li><a type="button"  href="php_action/removeReuniones.php?reunionesId='.$reunionesId.'" <i class="glyphicon glyphicon-trash"></i> Eliminar</a></li>

		</ul>
	</div>';

 	$output['data'][] = array( 		
 		  $row[0],
          $row[1],
          $enti,
          $row[3],
          $row[4],
          $row[5],
		  $button
 		); 	
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);