<?php
session_start();
$aux = $_SESSION['userRol'];

if ($aux != 3) {

    header('location: index.php');
}

?>
<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/headerSocio.php'; ?>
<?php require_once 'modal/productSocioModal.php'; ?>


<div class="row">
    <div class="col-mx-12">

        <ol class="breadcrumb">
            <li><a href="socdashboard.php">Inicio</a></li>
            <li class="active">Productos</li>
        </ol>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Listado de productos</div>
            </div> <!-- /panel-heading -->
            <div class="panel-body">



                <div class="remove-messages"></div>


                <div class="div-action pull pull-right" style="padding-bottom:20px;">
                    <button class="btn btn-default button1" data-toggle="modal" id="addProductModalBtn" data-target="#addProductModal"> <i class="glyphicon glyphicon-plus-sign"></i> Agregar producto </button>
                </div> <!-- /div-action -->


                <table class="table  table-striped" id="manageProductSocioTable">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Categoría</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>PVP</th>
                            <th>Stock</th>
                            <th>Status</th>
                            <th>Opciones</th>

                        </tr>
                    </thead>
                </table>
                <!-- /table -->

            </div> <!-- /panel-body -->
        </div> <!-- /panel -->
    </div> <!-- /col-md-12 -->
</div> <!-- /row -->






<script src="custom/js/productSocio.js"></script>

<?php require_once 'includes/footer.php'; ?>