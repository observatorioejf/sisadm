<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SISADM - Login</title>
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
<!--        <link href="css/bootstrap-reset.css" rel="stylesheet">-->
        <!--external css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/style-responsive.css" rel="stylesheet" />
    </head>

    <body class="login-body">
        <div class="container">
            <form id="frmLogin" class="form-signin" action="controle.php" method="post">
                <h2 class="form-signin-heading">SISADM</h2>
                <div class="login-wrap">
                    <input type="text" name="login" class="form-control" placeholder="Usuário" autofocus>
                    <input type="password" name="senha" class="form-control" placeholder="Senha">
                    <button class="btn btn-lg btn-login btn-block" type="submit" name="enviar" value="Login">Entrar</button>
                     <center> <a href="../../login.php" style="">Voltar</a></center>
                </div>
            </form>
        </div>

        <!-- js placed at the end of the document so the pages load faster -->
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <script>
            //Ao clicar no botão de login, é feita uma requisição ajax
            $("#frmLogin").submit(function (event) {
                event.preventDefault();  //Previne que seja feito o submit autmático do form
                var fd = new FormData(this); //Pega os dados do form e joga na variável fd
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                        if (xmlhttp.responseText === "1") {
                            window.location = 'index.php';
                        } else {
                            alert('Login ou senha incorretos.');
                        }
                    }
                };
                xmlhttp.open("POST", "controle.php", true); //Método e página onde será feita a
                xmlhttp.send(fd);
            });
        </script>

    </body>

</html>
