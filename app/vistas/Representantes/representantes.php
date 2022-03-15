<?php require_once RUTA_APP . "/vistas/inc/header.php" ?>

<div class="container mt-5">
<h4><p class="text-center pb-3 gestion-usuario">Gestion de representantes</p></h4>
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
		<?php foreach($datos['representantes'] as $representante) : ?>
		<tr>
			<td><?php echo $representante -> ci ?></td>	
			<td><?php echo $representante -> pnombre ?></td>	
			<td><?php echo $representante -> papellido ?></td>	
			<td><?php echo $representante -> sexo_p ?></td>			
			<td><?php echo $representante -> nacionalidad ?></td>
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