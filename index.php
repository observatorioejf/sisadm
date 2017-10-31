<?php
include ("validacao.php");
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Mosaddek">
        <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
        <link rel="shortcut icon" href="img/favicon.png">

        <title>SISADM</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-reset.css" rel="stylesheet">
        <!--external css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="assets/gritter/css/jquery.gritter.css" />
        <!--dynamic table-->
        <link href="assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
        <link href="assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
        <link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
        <!--toastr-->
        <link href="assets/toastr-master/toastr.css" rel="stylesheet" type="text/css" />

        <!--right slidebar-->
        <link href="css/slidebars.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/style-responsive.css" rel="stylesheet" />

    </head>
    <body>
        <section id="container" class="sidebar-closed" style="padding-left: 7%; padding-right: 7%">
            <!--header start-->
            <header class="header blue-bg" style="background-color: #00cccc;text-align: center" >
                <!--logo start-->
                <a href="index.php" class="logo" ><center>SISADM</center></a>
                <!--logo end-->
                <div class="top-nav ">
                    <ul class="nav pull-right top-menu" style="margin-top: 7px">
                        <div class="btn-group">
                            <a href="logout.php">
                                <button id="editable-sample_new" class="btn green">
                                    Sair <i class="fa fa-reply-all"></i>
                                </button>
                            </a>
                        </div>
                    </ul>
                </div>
            </header>
            <!--header end-->
            <!--main content start-->
            <section id="main-content">
                <section class="wrapper ">
                    <!-- page start-->
                    <form class="form-signin" >
                        <h2 class="form-signin-heading">Escolha o sistema:</h2>
                        <div class="login-wrap">
                            <input class="btn btn-lg btn-login btn-block" type="button" value="Portifolio usuários"  onclick="enviar('Portifolio usuários')"/>
                            <input class="btn btn-lg btn-login btn-block" type="button" value="SAMCJF usuários" onclick="enviar('SAMCJF usuários')" />
                            <input class="btn btn-lg btn-login btn-block" type="button" value="SAMJF usuários" onclick="enviar('SAMJF usuários')" />
                            <input class="btn btn-lg btn-login btn-block" type="button" value="SAMPRO usuários" onclick="enviar('SAMPRO usuários')" />
                            <input class="btn btn-lg btn-login btn-block" type="button" value="SAPJE usuários" onclick="enviar('SAPJE usuários')" />
                            <input class="btn btn-lg btn-login btn-block" type="button" value="Notícias usuários" onclick="enviar('Notícias usuários')" />
                            <input class="btn btn-lg btn-login btn-block" type="button" value="SISADM usuários" onclick="enviar('SISADM usuários')" />
                            <input class="btn btn-lg btn-login btn-block" type="button" value="Logs" onclick="window.location.href = 'logs.php'" />
                        </div>
                    </form>
                    <form id="formulario" method="post" action="lista_de_usuarios.php" enctype="multipart/form-data">
                        <input id="tabela" type="hidden" name="tabela"/>
                    </form>
                    <!--page end-->
                </section>

            </section>
            <!--main content end-->
        </section>


        <!-- js placed at the end of the document so the pages load faster -->
        <script>
            function enviar($nomeDoBotao) {
                $tabela = document.getElementById("tabela");
                $form = document.getElementById("formulario");
                switch ($nomeDoBotao) {
                    case 'Portifolio usuários':
                        $tabela.value = "portfolio_usuario";
                        break;
                    case 'SAMCJF usuários':
                        $tabela.value = "samcjf_usuario";
                        break;
                    case 'SAMJF usuários':
                        $tabela.value = "samjf_usuario";
                        break;
                    case 'SAMPRO usuários':
                        $tabela.value = "sampro_usuario";
                        break;
                    case 'SAPJE usuários':
                        $tabela.value = "sapje_tb_usuario";
                        break;
                    case 'Notícias usuários':
                        $tabela.value = "tb_noticias_usuario";
                        break;
                    case 'SISADM usuários':
                        $tabela.value = "tb_sisadm_usuario";
                        break;
                }
                $form.submit();
            }
            ;
        </script>
    </body>

</html>