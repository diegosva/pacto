<?php require_once 'includes/Socioheader.php'; ?>
<?php include('modal/reunionesModal.php'); ?>




<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
			<li><a href="asodashboard.php">Inicio 2 </a></li>
			<li class="active">Reuniones Esteban </li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Listado de reuniones</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-default button1" data-toggle="modal" id="addReunionesModalBtn" data-target="#addReunionesModal"> <i class="glyphicon glyphicon-plus-sign"></i> Agregar reunión </button>
				</div> <!-- /div-action -->


			

				<table class="table" id="manageReunionesTable">
					<thead>
						<tr>

							<th>Tema</th>
							<th>Tipo</th>
							<th>Entidad</th>
							<th>Fecha</th>
							<th>Hora</th>
							<th>Acta</th>
							<th style="width: 15%;"> Acciones</th>

						</tr>
					</thead>
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->

<script src="custom/js/reuniones.js"></script>
<?php require_once 'includes/footer.php'; ?>