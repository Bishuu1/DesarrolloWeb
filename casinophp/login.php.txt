<?php
include_once("header.php");
if ( isset($_SESSION["user"]["Email"]) && $_SESSION["user"]["Email"] != "" ){
    header("Location: index.php");
die();
}
$usrLogin = $usuarios->findOne(array("Email" => $_POST["Email"], "Password" => $_POST["Password"]));
$login = false;
if ( isset($_POST["Email"]) && isset($_POST["Password"] )){  
if($usrLogin['Email'] == $_POST["Email"] && $usrLogin['Password'] == $_POST["Password"]){
    $login = true;
}
if($login == true){
    $_SESSION["user"] = array("Email" => $usrLogin["Email"], "Saldo" => $usrLogin["Saldo"]);
    ?>

<div class="alert alert-success" role="alert">
    Sesión iniciada!
</div>
<script>
location.href = "index.php"
</script>

<?php
}
}
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
            <h1>Inicio de Sesión</h1>
            <form method="POST">
                <div class="form-group">
                    <label for="Email">Email</label>
                    <input name="Email" type="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="Password">Contraseña</label>
                    <input name="Password" type="password" class="form-control" required>
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