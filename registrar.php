<?php
session_start();
if(isset($_SESSION["UserName"], $_SESSION["UserEmail"])){
    header("location: painel.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial scale=1.0, shrink-to-fit=no">
    <title>Registrar</title>
    <link rel="stylesheet" href="sass/styles.css" type="text/css">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="body">

    <aside class="login">
        <div class="login-area">
            <div class="login-area-title">
                Faça o Cadastro
            </div>
            <div class="login-area-form form-group">
                <form class="formulario">
                    <div class="form-group">
                        <label for="textNome">Nome</label>
                        <input type="text" id="textNome" class="form-control" autofocus rules="required,max=25">
                    </div>
                    <div class="form-group">
                        <label for="textEmail">Email</label>
                        <input type="email" id="textEmail" class="form-control" rules="required,max=50">
                    </div>
                    <div class="form-group">
                        <label for="textPassword">Senha</label>
                        <input type="password" id="textPassword" class="form-control" rules="required,min=4">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-primary" style="cursor: pointer;"
                            value="Cadastrar" key="2">
                    </div>
                    <div class="fomr-group mb-3" align="center">
                        <small style="font-weight: bold">Ou</small>
                    </div>
                    <div class="form-group" align="center">
                        <a type="button" class="btn btn-primary form-control w-75" style="cursor: pointer;"
                            href="index.php">Fazer Login</a>
                    </div>
                </form>
            </div>
        </div>
    </aside>



    <div class="aviso-area">
    </div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/validar.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>