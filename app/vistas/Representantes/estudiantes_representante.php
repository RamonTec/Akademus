<?php require_once RUTA_APP . "/vistas/inc/header.php" ?>

<div class="container mt-5">
<h4>
	<p class="text-center pb-3 gestion-usuario">
		Estudiantes representados por:
	</p>
</h4>
<table class="table table-hover text-center tabla">
	<thead>		
		<tr>			
			<th>Cedula de identidad</th>
			<th>Primer nombre</th>
			<th>Primer apellido</th>		
			<th>Parentesco</th>
			<th>Acciones</th>
		</tr> 
	</thead> 
	<tbody> 
		<?php foreach($datos['estudiantes'] as $estudiante) : ?>
		<tr>
			<td><?php echo $estudiante -> ci_escolar ?></td>	
			<td><?php echo $estudiante -> pnom ?></td>	
			<td><?php echo $estudiante -> pape ?></td>
			<td><?php echo $estudiante -> pariente_representate ?></td>
			<td>								
				<a href="<?php echo RUTA_URL;?>/Representantes/actualizar_representante/<?php echo $representante -> id_per ?>">Editar</a> - 
          <a href="<?php echo RUTA_URL;?>/Representantes/eliminar_representante/<?php echo $representante -> id_per ?>">Eliminar</a>
			</td>		
		</tr>
	<?php  endforeach;?>
	</tbody>
</table>
</div>



<?php require_once RUTA_APP . "/vistas/inc/footer.php" ?>