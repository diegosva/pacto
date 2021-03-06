<?php

require_once 'core.php';

$ASOID = $_SESSION['asoId'];
$DETALLEID = $_POST['detallefactura'];

$sql = "SELECT 
DETALLEFACTURA.PEDIDOSID, 
USUARIO.NOMBREAPEUSU,
USUARIO.TELCUSU,
USUARIO.TELCELUSU,
USUARIO.EMAILUSU,
USUARIO.DIRUSU,
PRODUCTO.NOMPRODUCT,
DETALLEFACTURA.CANTIDAD,
PRODUCTO.PRECIOPRODUCT, 
PRODUCTO.PVPPRODUCT,
PEDIDOS.FECHAPEDIDO,
ESTADOPEDIDO.NOMBREESPE
FROM DETALLEFACTURA, PEDIDOS, PRODUCTO, ASOCIACION, PERTENECEN, USUARIO ,ESTADOPEDIDO
WHERE DETALLEFACTURA.PEDIDOSID = PEDIDOS.PEDIDOSID  
AND DETALLEFACTURA.PRODUCTOID = PRODUCTO.PRODUCTOID 
AND PRODUCTO.PERTENECENID = PERTENECEN.PERTENECENID 
AND PEDIDOS.USUARIOID = USUARIO.USUARIOID 
AND PEDIDOS.ESTADOPEDIDOID=ESTADOPEDIDO.ESTADOPEDIDOID
AND PERTENECEN.ASOCIACIONID = $ASOID
AND PEDIDOS.STATUSPEDIDO = 1
AND DETALLEFACTURA.PEDIDOSID=$DETALLEID
GROUP BY PRODUCTO.PRODUCTOID";

$result = $connect->query($sql);


$output = array('data' => array());


    while ($row = $result->fetch_array()) {
       
        $output['data'][] = array(

            $row[6],
            $row[7],
            $row[8],
            $row[9]

        );
    }


$connect->close();

echo json_encode($output);

//header("location:../facturaPedido.php");
