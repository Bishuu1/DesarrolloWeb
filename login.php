<?php
include_once("header.php")
?>
<script src="https://www.google.com/recaptcha/api.js"></script>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <a class="navbar-brand" href="/">7Lucky!</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Inicio</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="Ruleta.php">Ruleta</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="Dados.php">Dados</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="CaraSello.php">Cara o Sello</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <a class="nav-link" href="login.php">Mi Cuenta</a>
                </span>
            </div>
        </nav>
    </header>

    <main role="main">
        <div class="Formulario-Registro">
            <h1>Inicio de Sesión</h1>
            <form>
                <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="email" class="form-control" id="Email">
                </div>
                <div class="form-group">
                    <label for="Password">Contraseña</label>
                    <input type="password" class="form-control" id="Password">
                </div>
                <div>
                    <div class="container">
                        <div class="row justify-content-between">
                            <div class="col-5">
                                <button type="submit" class="btn btn-danger">Iniciar sesión</button>
                            </div>
                            <div class="col-4">
                                <a class="btn btn-link" href="SignUp.php" role="button">Registrate</a>
                            </div>
                        </div>
                    </div>

                </div>


            </form>

        </div>
    </main>
    <?php  include_once("Footer.php")?>
</body>

</html>