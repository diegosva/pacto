<?php

require_once 'core.php';

$aso_Id=$_SESSION['asoId'];

$sql = "SELECT 
 REUNIONID,
 TEMAREU,
 FECHAINIREU,
 HORAREU,
 HORAFINREU,
 TIPOREU,
 STATUSREUID,
 ACTA FROM REUNION
 WHERE TIPOREUNIONID = 2 AND ASOCIACIONID = $aso_Id";

$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

	// $row = $result->fetch_array();
	$activeREU = ""; 
   
	while($row = $result->fetch_array()) {
		$reunionesId = $row[0];
	  
   
		// active 
		
		if($row[6] == 1) {
			// activate member
			$activeREU = "<label class='label label-success'>PENDIENTE</label>";
		} else if($row[6] == 2){
			// deactivate member
			$activeREU = "<label class='label label-danger'>EN CURSO</label>";
		} else{
			$activeREU = "<label class='label label-danger'>FINALIZADA</label>";
		}
   
	  
   
   
		$button = '<!-- Single button -->
	   <div class="btn-group">
		 <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		   Acción <span class="caret"></span>
		 </button>
		 <ul class="dropdown-menu dropdown-menu-right">
		   <li class="dropdown-item"><a type="button" data-toggle="modal" id="editReunionesModalBtn" data-target="#editReunionesModal" onclick="editReuniones('. $reunionesId.')"> <i class="glyphicon glyphicon-edit"></i> Editar</a></li>
		   <li class="dropdown-item"><a type="button" data-toggle="modal" data-target="#removeReunionesModal" id="removeReunionesModalBtn" onclick="removeReuniones('. $reunionesId.')"> <i class="glyphicon glyphicon-trash"></i> Eliminar</a></li>       
		 </ul>
	   </div>';
   
   
   
		$output['data'][] = array( 		
			$row[1],
			$row[2],
			$row[3],
			$row[4],
			$row[5],
			$activeREU,	
			$row[7],	
			$button	
			); 	
	} // /while 
   
   }
   
$connect->close();

echo json_encode($output);