<?php require_once RUTA_APP . '/vistas/inc/header.php' ?>
<div class="container mt-5">
<h4><p class="text-center pb-3 gestion-usuario">Gestion de usuarios</p></h4>
<table class="table table-hover text-center tabla">
	<thead>
		<tr>
			<th>Usuario</th>
			<th>Privilegio</th>
			<th>Ultima sesion</th>
			<th>Estado</th>
			<th>Acciones</th>
		</tr> 
	</thead>
	<tbody>  
		<?php foreach($datos['usuarios'] as $usuario) : ?>
		<tr>
			<td><?php echo $usuario -> nom_u ?></td>
			<td><?php echo $usuario -> privilegio ?></td>
			<td><?php echo $usuario -> ultima_s ?></td>
			<td><?php echo $usuario -> activo == 1 ? 'Activo' : 'No activo' ?></td>
			<td>
				<a href="<?php echo RUTA_URL;?>/Usuarios/editar_usuario/<?php echo $usuario -> id_u ?>">Editar</a> - 
				<a href="<?php echo RUTA_URL;?>/Usuarios/eliminar_usuario/<?php echo $usuario -> id_u ?>">Eliminar</a>
			</td>

		</tr>
	<?php  endforeach;?>
	</tbody>
</table>
</div>
<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>