<?php

require_once 'core.php';
$aso_Id = $_SESSION['asoId'];
$user_Id = $_SESSION['userId'];

$sql = "SELECT 
PRODUCTOID,

NOMPRODUCT,
CATEGORIAPRODUCTO.NOMCAT, 
DESCRIPCIONPRODUCT, 
PRECIOPRODUCT, 
PVPPRODUCT,
USUARIO.NOMBREAPEUSU,
STOCKPRODUCT,
STATUSPRODUCT
FROM PRODUCTO,CATEGORIAPRODUCTO, PERTENECEN, ASOCIACION, USUARIO 
WHERE PRODUCTO.CATEGORIAID = CATEGORIAPRODUCTO.CATEGORIAID 
AND PRODUCTO.PERTENECENID = PERTENECEN.PERTENECENID 
AND USUARIO.USUARIOID = PERTENECEN.USUARIOID 
AND ASOCIACION.ASOCIACIONID = PERTENECEN.ASOCIACIONID
AND  USUARIO.USUARIOID = $user_Id
AND ASOCIACION.ASOCIACIONID = $aso_Id";

$result = $connect->query($sql);

$output = array('data' => array());

$activeProducts = "";

if ($result->num_rows > 0) {


    while ($row = $result->fetch_array()) {

        $productId=$row[0];
        if ($row[8] == 0) {
            // activate member
            $activeProducts = "<label class='label label-danger'>Producto enviado</label>";
        } else {
            // deactivate member
            $activeProducts = "<label class='label label-success'>Producto Disponible</label>";
        }

        $button = '<!-- Single button -->
        <div class="btn-group">
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Acción <span class="caret"></span>
          </button>
          <ul class="dropdown-menu dropdown-menu-right">
            <li><a type="button" data-toggle="modal" id="editProductModalBtn" data-target="#editProductModal" onclick="editProduct(' . $productId . ')"> <i class="glyphicon glyphicon-edit"></i> Editar</a></li>
            <li><a type="button" data-toggle="modal" data-target="#removeProductModal" id="removeProductModalBtn" onclick="removeProduct(' . $productId . ')"> <i class="glyphicon glyphicon-trash"></i> Eliminar</a></li>       
          </ul>
        </div>';

        $output['data'][] = array(
            $row[1],
            $row[2],
            $row[3],
            $row[4],
            $row[5],
            $row[7],
            $activeProducts,
            $button

        );
    } // /while 

} // if num_rows

$connect->close();

echo json_encode($output);
