<?php
include ("validacao.php");
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_POST['tabela'])) {
    $tabela = $_POST['tabela'];
} elseif (isset($_SESSION['tabela'])) {
    $tabela = $_SESSION['tabela'];
    unset($_SESSION['tabela']);
} else
    header("Location: index.php");
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
        <link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
        <!--toastr-->
        <link href="assets/toastr-master/toastr.css" rel="stylesheet" type="text/css" />
        <!--right slidebar-->
        <link href="css/slidebars.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/style-responsive.css" rel="stylesheet" />
        <style>
            th, td {
                text-align: center; 
            }
            .modal-open {
                overflow: scroll;
            }
            html {
                min-height: 101%;
            }
        </style>
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
                    <div class="row">
                        <div class="col-lg-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    <i class="fa fa-check-square-o fa-1x"></i> <font size="3"><a href="index.php"><b>Voltar</b></a></font><br><br>
                                    <a href="#modalInserir" data-toggle="modal">
                                        <button id="editable-sample_new" class="btn green">
                                            Adicionar Usuário <i class="fa fa-plus"></i>
                                        </button>
                                    </a>
                                    <center><h3>Tabela "<?php echo $tabela; ?>"</h3></center>
                                </header>
                                <div class="panel-body">
                                    <div class="adv-table">
                                        <div class="space15"></div>
                                        <table  style="width: 100%" class="display table table-bordered table-striped " id="example" data-order="[[ 0, &quot;desc&quot; ]]">
                                            <thead>
                                                <tr align="center">
                                                    <td width="6%"><b>ID</b></td>
                                                    <td><b>Login</b></td>
                                                    <td><b>Senha</b></td>
                                                    <td width="10%"><b>Tipo de acesso</b></td>
                                                    <td width="10%"><b>Operações</b></td>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                    <div aria-hidden = "true" aria-labelledby = "modalInserir" role = "dialog" tabindex = "-1" id="modalInserir" class = "modal fade top-modal-without-space">
                        <div class = "modal-dialog">
                            <div class = "modal-content">
                                <div class = "modal-header">
                                    <button aria-hidden = "true"data-dismiss = "modal" class ="close" type = "button">×</button>
                                    <h4 class = "modal-title">Inserir/editar usuário</h4>
                                </div>
                                <div class = "modal-body">
                                    <form role="form" id="frmInserir" action="FuncoesUsuarios.php" method="POST" enctype="multipart/form-data">
                                        <div class = "form-group">
                                            <label>Login</label>
                                            <input type = "text" class = "form-control" id="login" name = "login" required="true"/>
                                        </div>
                                        <div class = "form-group">
                                            <label>Senha</label>
                                            <input type = "text" class = "form-control" id="senha" name = "senha" required="true"/>
                                        </div>
                                        <div class = "form-group">
                                            <label>Tipo de acesso</label>
                                            <input type = "number" class = "form-control" id="tipo_acesso" name = "tipo_acesso" />
                                        </div>
                                        <input type="hidden" name="tabela" id="tabela" value="<?php echo $tabela; ?>" />
                                        <input type="hidden" name="tipo_de_requisicao" id="tipo_de_requisicao" value="inserir" />
                                        <input type="hidden" name="id" id="idAlterar" value="inserir" />
                                        <div class="modal-footer">
                                            <button type = "submit" id="inserir" class = "btn btn-default" name="enviar" value="enviar">Confirmar</button>
                                            <button type="button" id="btnFecharModal" class="btn btn-default" data-dismiss="modal">Fechar</button>   
                                        </div>                                                     
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="modalExcluir" class="modal fade " role="dialog">                                          
                        <div class="modal-dialog">                                                                 
                            <!-- Modal content-->                                                                    
                            <div class="modal-content">                                                              
                                <div class="modal-header">                                                             
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>            
                                    <h4 class="modal-title">Excluir usuário</h4>                                            
                                </div>             
                                <form id="frmExcluir" role = "form" action="FuncoesUsuarios.php" method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">                                                               
                                        <p><center>Tem certeza que deseja excluir este usuário?</center></p> 
                                    </div>                                                                                 
                                    <div class="modal-footer">                                                             
                                        <center> 
                                            <input type="hidden" name="id" id="idExcluir" />
                                            <input type="hidden" name="tabela" value="<?php echo $tabela; ?>" />
                                            <input type="hidden" name="tipo_de_requisicao" value="remover" />
                                            <button id="btnExcluir" type = "submit" class = "btn btn-default" name="enviar" value="enviar">Excluir</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>    
                                        </center>       
                                    </div>                                                                                 
                                </form> 
                            </div>	
                        </div> 
                    </div>
                    <!--page end-->
                </section>
            </section>
            <!--main content end-->
        </section>

        <!-- js placed at the end of the document so the pages load faster -->
        <script src="js/jquery.js"></script>
        <script src="js/jquery-ui-1.9.2.custom.min.js"></script>
        <script src="js/jquery-migrate-1.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
        <script src="js/jquery.scrollTo.min.js"></script>
        <script src="js/slidebars.min.js"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
        <script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>
        <script type="text/javascript" src="assets/gritter/js/jquery.gritter.js"></script>
        <script src="js/respond.min.js" ></script>
        <script type="text/javascript" src="js/jquery.pulsate.min.js"></script>

        <!--toastr-->
        <script src="assets/toastr-master/toastr.js"></script>
        <script src="custom/toastr.js"></script>

        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/dataTables.bootstrap.js"></script>
        <!--botones DataTables-->	
        <script src="js/dataTables.buttons.min.js"></script>

        <!--common script for all pages-->
        <script src="js/common-scripts.js"></script>

        <!--script for this page only (MODAL)-->
        <script src="js/gritter.js" type="text/javascript"></script>
        <script src="js/pulstate.js" type="text/javascript"></script>

        <script>
            $(document).ready(function () {

                var dataTable = $('#example').DataTable({
                    "ajax": {
                        "method": "POST",
                        "url": "carregarTabela.php?tabela=<?php echo '' . $tabela . ''; ?>"
                    },
                    "columns": [
                        {"data": "id_usuario"},
                        {"data": "login_usuario"},
                        {"data": "senha_usuario"},
                        {"data": "id_tipo_acesso"},
                        {"data": "operacoes"}
                    ],
                    "language": {
                        "lengthMenu": "Mostrar _MENU_ registros por página",
                        "zeroRecords": "Não foram encontrados registros",
                        "info": "Página _PAGE_ de _PAGES_",
                        "infoEmpty": "Nenhum registro disponível",
                        "infoFiltered": "(filtered from _MAX_ total records)"
                    },
                    responsive: true
                });

                $("#frmInserir").submit(function (event) {
                    event.preventDefault();
                    var fd = new FormData(this);
                    xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function (data) {
                        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                            if (xmlhttp.responseText === "1")
                                msgSucesso("Operação efetuada com sucesso.", "Sucesso");
                            else
                                msgErro("Houve um erro na solicitação.\n"+xmlhttp.responseText, "Erro");
                            $("#modalInserir").modal('hide');
                            dataTable.ajax.reload();
                        }
                    };
                    xmlhttp.open("POST", "FuncoesUsuarios.php", true);
                    xmlhttp.send(fd);
                });

                $(document).on('click', '.update', function () {
                    var user_id = $(this).attr("id");
                    $("#idAlterar").val(user_id);
                    var fd = new FormData();
                    fd.append("tipo_de_requisicao", "buscarPorId");
                    fd.append("id", user_id);
                    fd.append("tabela", "<?php echo $tabela; ?>");
                    xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                            var data = JSON.parse(xmlhttp.responseText);
                            $("#login").val(data.login_usuario);
                            $("#senha").val(data.senha_usuario);
                            $("#tipo_acesso").val(data.id_tipo_acesso);
                            $("#tipo_de_requisicao").val("alterar");
                            $("#modalInserir").modal('show');
                        }
                    };
                    xmlhttp.open("POST", "FuncoesUsuarios.php", true);
                    xmlhttp.send(fd);
                });

                $(document).on('click', '.excluir', function () {
                    var user_id = $(this).attr("id");
                    $("#idExcluir").val(user_id);
                    $("#modalExcluir").modal('show');
                });

                $("#frmExcluir").submit(function (event) {
                    event.preventDefault();
                    var fd = new FormData(this);
					fd.append("teste", "valor");
					fd.append("testea", "<?php echo $tabela; ?>");
                    xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                            if (xmlhttp.responseText === "1")
                                msgSucesso("Excluído com sucesso.", "Sucesso");
                            else
                                msgErro("Houve um erro na solicitação.", "Erro");
                            dataTable.ajax.reload();
                            $("#modalExcluir").modal('hide');
                        }
                    };
                    xmlhttp.open("POST", "FuncoesUsuarios.php", true);
                    xmlhttp.send(fd);
                });

                $('#modalInserir').on('hidden.bs.modal', function () {
                    $("#tipo_de_requisicao").val("inserir");
                    $("#frmInserir")[0].reset();
                });

            });
        </script>
    </body>

</html>