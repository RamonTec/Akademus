<?php require_once RUTA_APP . '/vistas/inc/header.php';?>
<!----------------------------------------NAVBAR------------------------------------------------------------->
<table>
	<thead>
		<tr>
			<th>Cedula de identidad</th>
			<th>Primer nombre</th>
			<th>Primer apellido</th>
			<th>Sexo</th>
			<th>Nacionalidad</th>
			<th>Tipo de estudiante</th>
			<th>Acciones</th>
		</tr> 
	</thead>
	<tbody> 
		<?php foreach($datos['estudiantes'] as $estudiante) : ?>
		<tr>
			<td><?php echo $estudiante -> ci ?></td>
			<td><?php echo $estudiante -> pnombre ?></td>
			<td><?php echo $estudiante -> papellido ?></td>
			<td><?php echo $estudiante -> sexo ?></td>
			<td><?php echo $estudiante -> nacionalidad ?></td>
			<td><?php echo $estudiante -> tipo_est ?></td>
			<td><a href="<?php echo RUTA_URL;?>/Estudiantes/actualizarEstudiante/<?php echo $estudiante -> ci ?>">Editar</a></td>
			<td><a href="<?php echo RUTA_URL;?>/Estudiantes/borrarEstudiante/<?php echo $estudiante -> ci ?>">Eliminar</a></td>
		</tr>
	<?php  endforeach;?>
	</tbody>
</table>





<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>