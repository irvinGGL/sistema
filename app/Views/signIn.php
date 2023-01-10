<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title> Inicio de sesión </title>
    <link rel="icon" type="image/x-icon" href="../src/assets/img/favicon.png"/>
    <link href="../layouts/vertical-light-menu/css/light/loader.css" rel="stylesheet" type="text/css" />
    <link href="../layouts/vertical-light-menu/css/dark/loader.css" rel="stylesheet" type="text/css" />
    <script src="../layouts/vertical-light-menu/loader.js"></script>
    
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../src/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    
    <link href="../layouts/vertical-light-menu/css/light/plugins.css" rel="stylesheet" type="text/css" />
    <link href="../src/assets/css/light/authentication/auth-boxed.css" rel="stylesheet" type="text/css" />
    <link href="../src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    
    <link href="../layouts/vertical-light-menu/css/dark/plugins.css" rel="stylesheet" type="text/css" />
    
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" type="text/css" href="../src/plugins/src/vanillaSelectBox/vanillaSelectBox.css">
    
    <link href="../src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../src/plugins/css/light/vanillaSelectBox/custom-vanillaSelectBox.css">

    <link href="../src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../src/plugins/css/dark/vanillaSelectBox/custom-vanillaSelectBox.css">
    <!--  END CUSTOM STYLE FILE  -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" type="text/css" href="../src/assets/css/light/elements/alert.css">
    <link rel="stylesheet" type="text/css" href="../src/assets/css/dark/elements/alert.css">
    <!--  END CUSTOM STYLE FILE  -->
    
</head>
<body class="form" data-bs-spy="scroll" data-bs-target="#navSection" data-bs-offset="100">

<?php if(session('mensaje')){ ?>
<div class="alert alert-light-danger alert-dismissible fade show border-0 mb-4" role="alert"> 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> 
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-bs-dismiss="alert">
    <line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button> 
    <strong><center><?php echo session('mensaje') ?></center></strong> 
</div>
<?php } ?>

    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <div class="auth-container d-flex">

        <div class="container mx-auto align-self-center">
    
            <div class="row">
    
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center mx-auto">
                    <div class="card mt-3 mb-3">
                        <div class="card-body">
    
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <h2>Inicia sesión</h2>
                                    <p>Selecciona el cargo e ingresa tu contraseña</p>
                                </div>
                                <form action="/login" method="post">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Cargo</label>
                                            <?=old('cargo') ?>
                                            <br>
                                            <select id="selectCargo" name="cargo" class="form-control">
                                            {<?php if(session('mensaje')){ ?>
                                                <?php if(old('cargo')== "Agente municipal"){ ?>
                                                <option selected value="Agente municipal">Agente municipal</option>
                                                <option value="Secretario del agente municipal">Secretario del agente municipal</option>
                                                <option value="Alcalde municipal">Alcalde municipal</option>
                                                <option value="Secretario del alcalde municipal">Secretario del alcalde municipal</option>
                                                <option value="Tesorero">Tesorero</option>
                                            <?php }?>
                                            <?php if(old('cargo')== "Secretario del agente municipal"){ ?>
                                                <option value="Agente municipal">Agente municipal</option>
                                                <option selected value="Secretario del agente municipal">Secretario del agente municipal</option>
                                                <option value="Alcalde municipal">Alcalde municipal</option>
                                                <option value="Secretario del alcalde municipal">Secretario del alcalde municipal</option>
                                                <option value="Tesorero">Tesorero</option>
                                            <?php }?>
                                            <?php if(old('cargo')== "Alcalde municipal"){ ?>
                                                <option value="Agente municipal">Agente municipal</option>
                                                <option value="Secretario del agente municipal">Secretario del agente municipal</option>
                                                <option selected value="Alcalde municipal">Alcalde municipal</option>
                                                <option value="Secretario del alcalde municipal">Secretario del alcalde municipal</option>
                                                <option value="Tesorero">Tesorero</option>
                                            <?php }?>
                                            <?php if(old('cargo')== "Secretario del alcalde municipal"){ ?>
                                                <option value="Agente municipal">Agente municipal</option>
                                                <option value="Secretario del agente municipal">Secretario del agente municipal</option>
                                                <option value="Alcalde municipal">Alcalde municipal</option>
                                                <option selected value="Secretario del alcalde municipal">Secretario del alcalde municipal</option>
                                                <option value="Tesorero">Tesorero</option>
                                            <?php }?>
                                            <?php if(old('cargo')== "Tesorero"){ ?>
                                                <option value="Agente municipal">Agente municipal</option>
                                                <option value="Secretario del agente municipal">Secretario del agente municipal</option>
                                                <option value="Alcalde municipal">Alcalde municipal</option>
                                                <option value="Secretario del alcalde municipal">Secretario del alcalde municipal</option>
                                                <option selected value="Tesorero">Tesorero</option>
                                            <?php }?>
                                                <?php } else{ ?>
                                                    <option value="Agente municipal">Agente municipal</option>
                                                    <option value="Secretario del agente municipal">Secretario del agente municipal</option>
                                                    <option value="Alcalde municipal">Alcalde municipal</option>
                                                    <option value="Secretario del alcalde municipal">Secretario del alcalde municipal</option>
                                                    <option value="Tesorero">Tesorero</option>
                                                <?php }?>}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-4">
                                            <label class="form-label">Contraseña</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-4">
                                            <button class="btn btn-secondary w-100" type="submit">Ingresar</button>
                                        </div>
                                    </div>
                                </form>
                                
                                
                                

                                <div class="col-12">
                                    <div class="text-center">
                                        <p class="mb-0">¿Olvidaste tu contraseña? <a href="restablecer-contraseña" class="text-warning"> Recupérala</a></p>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>

    </div>
    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="../src/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../src/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../src/plugins/src/mousetrap/mousetrap.min.js"></script>
    <script src="../layouts/vertical-light-menu/app.js"></script>
    <script src="../src/plugins/src/highlight/highlight.pack.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="../src/plugins/src/vanillaSelectBox/vanillaSelectBox.js"></script>
    <script src="../src/plugins/src/vanillaSelectBox/custom-vanillaSelectBox.js"></script>
    <script src="../src/assets/js/scrollspyNav.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->

</body>
</html>