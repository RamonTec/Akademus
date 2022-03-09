<?php require_once RUTA_APP . '/vistas/inc/header.php';?>
<!----------------------------------------NAVBAR------------------------------------------------------------->
<div class="container mt-5">
<h4><p class="text-center pb-3 gestion-usuario">Gestion de estudiantes</p></h4>
<table class="table table-hover text-center tabla">
	<thead>
		<tr>
			<th>Cedula de identidad</th>
			<th>Primer nombre</th>
			<th>Primer apellido</th>
			<th>Sexo</th>
			<th>Nacionalidad</th>
			<th>Acciones</th>
		</tr> 
	</thead> 
	<tbody>
		<?php foreach($datos['estudiantes'] as $estudiante) : ?>
		<tr>
			<td><?php echo $estudiante -> ci_est ?></td>
			<td><?php echo $estudiante -> pnom ?></td>
			<td><?php echo $estudiante -> pape ?></td>
			<td><?php echo $estudiante -> sexo ?></td>
			<td><?php echo $estudiante -> nacionalidad_e ?></td>
			<td>								
				<a href="<?php echo RUTA_URL;?>/Estudiantes/perfil_estudiante/<?php echo $estudiante -> ci_est ?>">Perfil</a>
			</td>		
		</tr>
	<?php  endforeach;?>
	</tbody>
</table>
</div>





<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>