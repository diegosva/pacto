<!-- add categories -->
<div class="modal fade" id="addReunionesModal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<form class="form-horizontal" id="submitReunionesForm" action="php_action/createReuniones.php" method="POST" enctype="multipart/from-data">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><i class="fa fa-plus"></i> Agregar reunión</h4>
				</div>
				<div class="modal-body">

					<div id="add-reuniones-messages"></div>

					<div class="form-group">
						<label for="ReunionesTema" class="col-sm-4 control-label">Tema: </label>

						<div class="col-sm-7">
							<input type="text" class="form-control" id="ReunionesTema" placeholder="Tema" name="ReunionesTema" autocomplete="off">
						</div>
					</div>
					<!--
                 /form-group-->
					<div class="form-group">
						<label for="ReunionesTipo" class="col-sm-4 control-label">Tipo: </label>

						<div class="col-sm-7">
							<select class="form-control" id="ReunionesTipo" name="ReunionesTipo">
								<option disabled>-- Selecciona --</option>
								<option value="Reunion">Reunión</option>
								<option value="Capacitación">Capacitación</option>
							</select>
						</div>
					</div> <!-- /form-group-->

					<div class="form-group">
						<label for="ReunionesEntidad" class="col-sm-4 control-label">Entidad: </label>

						<div class="col-sm-7">
							<select name="ReunionesEntidad" id="ReunionesEntidad" class="form-control">
								<?php $query = mysqli_query($connect, "SELECT NOMBREENT, ENTIDADID FROM entidad"); ?>
								<?php
								while ($especies = mysqli_fetch_array($query)) { ?>
									<option value=" <?php echo $especies['ENTIDADID']; ?> "> <?php echo $especies['NOMBREENT']; ?></option><br>
								<?php
									// $connect->close();
								} ?>
							</select>
						</div>


					</div> <!-- /form-group-->
					<div class="form-group">
						<label for="ReunionesFecha" class="col-sm-4 control-label">Fecha: </label>

						<div class="col-sm-7">
							<input type="date" class="form-control" id="ReunionesFecha" p name="ReunionesFecha" autocomplete="off">
						</div>
					</div> <!-- /form-group-->
					<div class="form-group">
						<label for="ReunionesHora" class="col-sm-4 control-label">Hora: </label>

						<div class="col-sm-7">
							<input type="time" class="form-control" id="ReunionesHora" name="ReunionesHora" autocomplete="off">
						</div>
					</div> <!-- /form-group-->



					<div class="form-group">
						<label for="ReunionesActa" class="col-sm-4 control-label">Acta: </label>

						<div class="col-sm-7">
							<input type="text" class="form-control" id="ReunionesActa" placeholder="Acta" name="ReunionesActa" autocomplete="off">

						</div>
					</div> <!-- /form-group-->




				</div> <!-- /modal-body -->

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Cerrar</button>

					<button type="submit" class="btn btn-primary" id="createReunionesBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Guardar cambios</button>
				</div> <!-- /modal-footer -->
			</form> <!-- /.form -->
		</div> <!-- /modal-content -->
	</div> <!-- /modal-dailog -->
</div>
<!-- /add categories -->

<!-- edit categories brand -->
<div class="modal fade" id="editReunionesModal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">

			<form class="form-horizontal" id="editReunionesForm" action="php_action/editReuniones.php" method="POST">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><i class="fa fa-edit"></i> Editar Reunión</h4>
				</div>
				<div class="modal-body">

					<div id="edit-reuniones-messages"></div>

					<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
						<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Cargando...</span>
					</div>

					<div class="edit-reuniones-result">
						<div class="form-group">
							<label for="editReunionesTema" class="col-sm-4 control-label">Tema: </label>

							<div class="col-sm-7">
								<input type="text" class="form-control" id="editReunionesTema" placeholder="Tema Reunión" name="editReunionesTema" autocomplete="off">
							</div>
						</div> <!-- /form-group-->
						<div class="form-group">
							<label for="editReunionesTipo" class="col-sm-4 control-label">Tipo: </label>

							<div class="col-sm-7">
								<select class="form-control" id="editReunionesTipo" name="editReunionesTipo">
									<option value="">-- Selecciona --</option>
									<option value="Reunión">Reunión</option>
									<option value="Capacitación">Capacitación</option>
								</select>
							</div>
						</div> <!-- /form-group-->


						<div class="form-group">
							<label for="editReunionesEntidad" class="col-sm-4 control-label">Entidad:</label>

							<div class="col-sm-7">
								<select class="form-control" id="editReunionesEntidad" name="editReunionesEntidad">
									<option disabled>-- Selecciona --</option>
									<option value="1">Entidad1</option>
									<option value="2">Entidad2</option>
								</select>
							</div>
						</div> <!-- /form-group-->

						<div class="form-group">
							<label for="editReunionesFecha" class="col-sm-4 control-label">Fecha: </label>

							<div class="col-sm-7">
								<input type="date" class="form-control" id="editReunionesFecha" p name="editReunionesFecha" autocomplete="off">
							</div>
						</div> <!-- /form-group-->

						<div class="form-group">
							<label for="editReunionesHora" class="col-sm-4 control-label">Hora: </label>

							<div class="col-sm-7">
								<input type="time" class="form-control" id="editReunionesHora" name="editReunionesHora" autocomplete="off">
							</div>
						</div> <!-- /form-group-->
						<div class="form-group">
							<label for="editReunionesActa" class="col-sm-4 control-label">Acta: </label>

							<div class="col-sm-7">
								<input type="text" class="form-control" id="editReunionesActa" placeholder="Acta" name="editReunionesActa" autocomplete="off">
							</div>
						</div> <!-- /form-group-->
					</div>
					<!-- /edit brand result -->
				</div> <!-- /modal-body -->

				<div class="modal-footer editReunionesFooter">
					<button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Cerrar</button>

					<button type="submit" class="btn btn-success" id="editReunionesBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Guardar cambios</button>
				</div>
				<!-- /modal-footer -->
			</form>
			<!-- /.form -->
		</div>
		<!-- /modal-content -->
	</div>
	<!-- /modal-dailog -->
</div>
<!-- /categories brand -->



















<!-- categories brand -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeReunionesModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Eliminar Reunión</h4>
			</div>
			<div class="modal-body">
				<p>Realmente deseas eliminar este registro ?</p>
			</div>
			<div class="modal-footer removeReunionesFooter">
				<button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Cerrar</button>
				<button type="button" class="btn btn-primary" id="removeReunionesBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Guardar cambios</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->