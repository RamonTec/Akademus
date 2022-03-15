<?php require_once RUTA_APP . '/vistas/inc/header.php' ?>
<div class="container mt-5">
<h4><p class="text-center pb-3 gestion-usuario">Gestion de secciones</p></h4>
<table class="table table-striped text-center tabla">
	<thead>
		<tr>
			<th>Año</th>
			<th>Seccion</th>
			<th>Turno</th>
      <th>Acciones</th>
		</tr> 
	</thead>
	<tbody>
		<?php foreach($datos['secciones'] as $seccion) : ?>
		<tr>
			<td><?php echo $seccion -> cod_sec ?></td>
			<td><?php echo $seccion -> nom_sec ?></td>
			<td><?php echo $seccion -> turno ?></td>
			<td>
				<a href="<?php echo RUTA_URL;?>/Secciones/editar_seccion/<?php echo $seccion -> id_seccion ?>">Editar</a> - 
				<a href="<?php echo RUTA_URL;?>/Secciones/eliminar_seccion/<?php echo $seccion -> id_seccion ?>">Eliminar</a>				
			</td>
		</tr>
	<?php  endforeach;?>
	</tbody>
</table>

<?php
    if($datos['mensaje'] != '') {
      ?> 
        <div class="row justify-content-center mt-5">

          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php 
              if($datos['mensaje']) echo($datos["mensaje"]);
            ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

        </div>
      <?php
    }

  ?>

  
</div>
<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>