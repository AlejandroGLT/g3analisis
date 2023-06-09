<div class="container-fluid">
    <div class="row justify-content-center align-content-center">
        <div class="col-8 barra">
            <div class="row">
                <div class="col-2">
                    <img class="d-none d-md-block" src="../../img/logo.png" alt="Logo" class="img-fluid" width="70">
                    <img class="d-block d-md-none" src="../../g/logo.png" alt="Logo" class="img-fluid" width="40">
                </div>
                <div class="col-10 text-light">
                    <h2 class="d-none d-md-block">Mi App Akatsuki</h2>
                    <h4 class="d-block d-md-none">Mi App Akatsuki</h4>
                </div>
            </div>
        </div>
        <div class="col-4 text-right barra">
            <ul class="navbar-nav mr-auto">
                <li>
                    <a href="#" class="px-3 text-light perfil dropdown-toggle" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="person">
                        <i class="fas fa-user-circle user"></i>
                        <?php echo $_SESSION['email']; ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbar-dropdown">
                        <a class="dropdown-item menuperfil cerrar" href="../../logout.php"><i
                                class="fas fa-sign-out-alt m-1"></i>Salir
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>