<?php require_once RUTA_APP . '/vistas/inc/header.php'?>
<!---------------------------------------BARRA DE NAVEGACION------------------------------------->
    <div class="bn">
        <section id="banner">
            <div class="container pb-5">
                <div class="row pb-5"> 
                    <!-- carrousel -->
                    <div class="col-md-6 mt-5 pt-5 pb-5">                              
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                <img class="d-block w-100" src="<?php echo RUTA_URL?>/img/img1.jpg" alt="First slide" height="290" alt="...">
                                </div>
                                <div class="carousel-item">
                                <img class="d-block w-100" src="<?php echo RUTA_URL?>/img/BM1.jpg" alt="Second slide" height="290" alt="...">
                                </div>
                                <div class="carousel-item">
                                <img class="d-block w-100" src="<?php echo RUTA_URL?>/img/BM2.jpg" alt="Third slide" height="290" alt="...">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                            </div>                       
                        <blockquote class="promo-title pt-3">
                            "Los profesores pueden cambiar vidas con la mezcla correcta de tiza y desafios"
                        </blockquote> 
                        <cite><p class="text-right">Jhon Henrik Clarke</p></cite>  
                    </div>                    
                    <div class="col-md-4 offset-2 pt-5 mt-4">
                        <div class="row">
                            <div class="mx-auto pb-3">
                                <img class="" src="<?php echo RUTA_URL?>/img/logo-inschool.png" width="80" alt="">
                            </div>
                        </div>
                        <form id="inicio_sesion" class="mx-auto" action="<?php echo RUTA_URL?>/Logins/verificar_sesion" method="POST">
                            <div class="form-group mx-auto">                            
                                <input type="text" class="text-center form-control" name="nom_u" id="nom_u" placeholder="Ingrese su usuario">
                            </div>
                            <div class="form-group mx-auto">                            
                                <input type="password" class="text-center form-control" name="clave" id="clave" placeholder="Ingrese su clave">
                            </div>                                        
                            <div class="form-group mx-auto">
                                <button class="btn w-100 mx-auto boton-de-envio" id="btn_enviar" type="submit">Iniciar Sesión</button>
                            </div>
                            <hr>
                            <a href="<?php echo RUTA_URL ?>/Usuarios/registrar_usuario">¿Quieres registrarte?</a> ó <a href="<?php echo RUTA_URL ?>/Usuarios/recuperar_usuario">¿Quieres recuperar tú usuario?</a>
                        </form>
                    </div>
                </div>
            </div>
        </section class="pb-5">
    </div class="pb-5">
<script src="<?php echo RUTA_URL ?>/js/Validacion_inicio_sesion/validacion_inicio_sesion.js"></script>
<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>