<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php
include_once("header.php");

if ( isset($_SESSION["user"]["Email"]) && $_SESSION["user"]["Email"] != "" ){
    header("Location: index.php");
die();
}

if ( isset($_POST["Email"]) && isset($_POST["Password"]) && isset($_POST["PassConfirm"]) ){
    if($_POST["Password"] == $_POST["PassConfirm"]){
        $usrRegistro = $usuarios->findOne(array("Email" => $_POST["Email"]));
        if($usrRegistro['Email'] != $_POST["Email"]){
            $insertOneResult = $usuarios->insertOne([
            'Email' => $_POST["Email"],
            'Password' => $_POST["Password"],
            'Saldo' => 10000,
        ]);
        $insertOneResult = $apuestas->insertOne([
            'Email' => $_POST["Email"],
            'time' => date("d-m-Y"),
            'Descripción' => "Regalo inicial de creditos",
            'Transaccion' => 10000
            ]);
?>

<div class="alert alert-success" role="alert">
    Registro completado!
</div>

<script>
setTimeout(function() {
    location.href = "index.php";
}, 4000);
</script>

<?php
}}
else{
?>

<div class="alert alert-dark" role="alert">
    Error al registrar!
</div>

<?php
}}
?>

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
            <h1>Registrate</h1>
            <form method="POST">
                <div class="form-group">
                    <label for="">Email</label>
                    <input name="Email" type="Email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="Pass">Password</label>
                    <input name="Password" type="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="Password">Confirmación de contraseña</label>
                    <input name="PassConfirm" type="password" class="form-control" required>
                    <br />
                    <button type="submit" class="btn btn-danger">Registrarte</button>
                </div>
            </form>

        </div>
    </main>
    <?php  include_once("Footer.php")?>
</body>

</html>