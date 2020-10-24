<?php
include_once("header.php");

if (isset($_POST["AgregarSaldo"])){
    $nuevoSaldo = $_SESSION["user"]["Saldo"] + $_POST["AgregarSaldo"];
    
    $updateResult = $usuarios->updateOne(  
        [ 'Email' => $_SESSION["user"]["Email"] ],
        [ '$set' => [ "Saldo" => $nuevoSaldo ]]);
    $_SESSION["user"]["Saldo"] = $nuevoSaldo;
    $insertOneResult = $apuestas->insertOne([
        'Email' => $_SESSION["user"]["Email"],
        'time' => date("d-m-Y"),
        'Descripción' => "Compra creditos",
        'Transaccion' => $_POST["AgregarSaldo"]
        ])
        ?>
<div class="alert alert-success" role="alert">
    Saldo actualizado, tu nuevo saldo es <?php printf($_SESSION["user"]["Saldo"])?>
</div>
<?php } ?>

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
                    <?php 
                    if ( isset($_SESSION["user"]["Email"]) && $_SESSION["user"]["Email"] != "" ){
                        ?>
                    <a class="nav-link" href="Profile.php"><?php printf($_SESSION["user"]["Email"])?></a>
                </span>
                <?php
                }else{ ?>
                <span class="navbar-text">
                    <a class="nav-link" href="login.php">Mi Cuenta</a>
                    <?php }?>
                </span>
            </div>
        </nav>
    </header>

    <main role="main">
        <div class="Formulario-Registro">
            <h1>Tu Perfil</h1>
            <div>
                <fieldset disabled>
                    <div class="form-group">
                        <label for="SaldoActual">Tu saldo actual</label>
                        <input class="form-control" type="text" placeholder=<?php printf($_SESSION["user"]["Saldo"])?>
                            readonly>
                    </div>
            </div>
            <form class="form-inline" method="POST">
                <div class="form-group mb-2">
                    <label for="Agregar" class="sr-only">¿Deseas agregar saldo?</label>
                    <input name="AgregarSaldo" type="number" step="1" min="1000" />
                </div>
                <button type="submit" class="btn btn-danger mb-2">Pagar</button>
            </form>
        </div>
    </main>
    <?php  include_once("Footer.php")?>
</body>

</html>