<?php

require_once 'core.php';

$USUARIOID = $_SESSION['userId'];
$ASOID = $_SESSION['asoId'];

$IDHOJA = $_POST['idHoja'];

echo $IDHOJA;


$sql="DELETE FROM HOJADECAMPO WHERE SUBHOJADECAMPOID=$IDHOJA";

$EJECUTADO = mysqli_query($connect, $sql) or die("Problemas al eliminar hojas de campo " . mysqli_error($connect));

if($EJECUTADO){
    $sql2="DELETE FROM SUBTOTALHOJADECAMPO WHERE SUBHOJADECAMPOID=$IDHOJA";
    $EJECUTADO2 = mysqli_query($connect, $sql2) or die("Problemas al eliminar hoja de campo " . mysqli_error($connect));
}

header("location:../hojaCampo.php");