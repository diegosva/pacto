<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if ($_POST) {

    $USUARIOPEDIDO = $_SESSION['userId'];
    $ASOCIAIONID = $_SESSION['asoId'];
    $NOMPRODUCT = $_POST['NOMPRODUCT'];
    $CATEGORIAID = $_POST['CATEGORIAID'];
    $DESCRIPCIONPRODUCT = $_POST['DESCRIPCIONPRODUCT'];
    $PRECIOPRODUCT = $_POST['PRECIOPRODUCT'];
    $STOCKPRODUCT = $_POST['STOCKPRODUCT'];


    $sql = "SELECT PERTENECENID FROM PERTENECEN  WHERE USUARIOID= $USUARIOPEDIDO AND ASOCIACIONID= $ASOCIAIONID";
    $EJECUTADO = mysqli_query($connect, $sql);

    while ($row = $EJECUTADO->fetch_array()) {
        $PERTENECENID = $row[0];
    }


    if ($EJECUTADO) {
        $sql2 = "INSERT INTO PRODUCTO (CATEGORIAID,PERTENECENID,NOMPRODUCT,DESCRIPCIONPRODUCT,PRECIOPRODUCT,STOCKPRODUCT,PVPPRODUCT,STATUSPRODUCT) 
        VALUES ($CATEGORIAID,$PERTENECENID,'$NOMPRODUCT', '$DESCRIPCIONPRODUCT', $PRECIOPRODUCT, $STOCKPRODUCT ,($PRECIOPRODUCT+($PRECIOPRODUCT*0.12)), 0)";
        $EJECUTADO2 = mysqli_query($connect, $sql2);
    }


    if ($EJECUTADO2) {
        $valid['success'] = true;
        $valid['messages'] = "Creado exitosamente";
    } else {
        $valid['success'] = false;
        $valid['messages'] = "Error no se ha podido guardar";
    }

    $connect->close();

    echo json_encode($valid);
}
