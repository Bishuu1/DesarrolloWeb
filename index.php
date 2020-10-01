<?php
include_once("header.php")
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
                </ul>
                <span class="navbar-text">
                    <a class="nav-link" href="login.php">Mi Cuenta</a>
                </span>
            </div>
        </nav>
    </header>

    <main role="main">

        <div class="MainImg"><img src="assets/images/Main.png" class="img-fluid" alt="Responsive image"></div>



        <div class="container marketing">

            <!-- Three columns of text below the carousel -->
            <div class="row">
                <div class="col-lg-4">
                    <img src="assets/images/ruleta_thumbnail.png" alt="Miniatura Ruleta" class="rounded-circle">
                    <h2>Ruleta</h2>
                    <h6>Arriesgate!</h6>
                    <p><a class="btn btn-secondary" href="Ruleta.php" role="button">Jugar &raquo;</a></p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img src="assets/images/dados_thumbnail.png" alt="Miniatura Dados" class="rounded-circle">
                    <h2>Dados</h2>
                    <h6>Ya vienen con la suerte</h6>
                    <p><a class="btn btn-secondary" href="Dados.php" role="button">Jugar &raquo;</a></p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img src="assets/images/moneda_thumbnail.png" alt="Miniatura CaraSello" class="rounded-circle">
                    <h2>Cara o Sello</h2>
                    <h6>Prueba tu suerte con la moneda</h6>
                    <p><a class="btn btn-secondary" href="CaraSello.php" role="button">Jugar &raquo;</a></p>
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->



        </div><!-- /.container -->
    </main>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <div class="text">
                <a href="AboutUs.php">Sobre Nosotros</a>
            </div>
            <div class="text">
                <a class="UsoResponsable" href="UsoResponsable.php">Uso Responsable</a>
            </div>
            <div class="copyright">
                <h7>Powerby Bishuu1</h7>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script>
    window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')
    </script>
    <script src="/docs/4.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous">
    </script>
</body>

</html>