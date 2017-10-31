<html>  
    <head>  
        <title>Título</title>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
        <style>  
            body  
            {  
                margin:0;  
                padding:0;  
                background-color:#f1f1f1;  
            }  
            .box  
            {  
                width:900px;  
                padding:20px;  
                background-color:#fff;  
                border:1px solid #ccc;  
                border-radius:5px;  
                margin-top:10px;  
            }  
        </style>  
    </head>  
    <body>  
        <div class="container box">  
            <h3 align="center">Título</h3><br />  
            <div class="table-responsive">  
                <br />  
                <button type="button" id="att_button" class="btn btn-info btn-lg">Att</button>
                <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Add</button>  
                <br /><br />  

                <table  style="width: 100%" class="display table table-bordered table-striped " id="user_data" data-order="[[ 0, &quot;asc&quot; ]]">
                    <thead>
                        <tr align="center">
                            <td width="5%"><b>ID</b></td>
                            <td><b>Login</b></td>
                            <td><b>Senha</b></td>
                            <td><b>Tipo de acesso</b></td>
                            <td width="10%"><b>Operações</b></td>
                        </tr>
                    </thead>

                </table>

            </div>  
        </div>  
    </body>  
</html>  

<div id="userModal" class="modal fade">  
    <div class="modal-dialog">  
        <form method="post" id="user_form">  
            <div class="modal-content">  
                <div class="modal-header">  
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  
                    <h4 class="modal-title">Add User</h4>  
                </div>  
                <div class="modal-body">  
                    <label>Enter First Name</label>  
                    <input type="text" name="first_name" id="first_name" class="form-control" />  
                    <br />  
                    <label>Enter Last Name</label>  
                    <input type="text" name="last_name" id="last_name" class="form-control" />  
                    <br />  
                    <label>Select User Image</label>  
                    <input type="file" name="user_image" id="user_image" />  
                    <span id="user_uploaded_image"></span>  
                </div>  
                <div class="modal-footer">  
                    <input type="hidden" name="user_id" id="user_id" />  
                    <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />  
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
            </div>  
        </form>  
    </div>  
</div>  

<script type="text/javascript" language="javascript" >

    $(document).ready(function () {

        $('#add_button').click(function () {
            $('#user_form')[0].reset();
            $('.modal-title').text("Add User");
            $('#action').val("Add");
            $('#user_uploaded_image').html('');
        });

        var dataTable = $('#user_data').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                url: "carregarTabela.php",
                type: "POST"
            },
            "columns": [
                {"data": "id_usuario"},
                {"data": "login_usuario"},
                {"data": "senha_usuario"},
                {"data": "id_tipo_acesso"},
                {"defaultContent": "<a href='#modalEditar' data-toggle='modal'><button title='Editar' type ='submit' class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i></button></a>&nbsp;<a href='#modalExcluir' data-toggle='modal'><button title='Excluir' type ='submit' class='btn btn-primary btn-xs'><i class='fa fa-times'></i></button></a> "}
            ],
        });


        $(document).on('click', '#att_button', function () {
            
                $.ajax({
                    url: "carregarTabela.php",
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function ()
                    {
                        dataTable.ajax.reload();
                    }
                });
        });


        $(document).on('click', '.update', function () {
            var user_id = $(this).attr("id");
            $.ajax({
                url: "carregarTabela.php",
                method: "POST",
                data: {user_id: user_id},
                dataType: "json",
                success: function (data)
                {
                    $('#userModal').modal('show');
                    $('#first_name').val(data.first_name);
                    $('#last_name').val(data.last_name);
                    $('.modal-title').text("Edit User");
                    $('#user_id').val(user_id);
                    $('#user_uploaded_image').html(data.user_image);
                    $('#action').val("Edit");
                }
            })
        });


    });
</script>  