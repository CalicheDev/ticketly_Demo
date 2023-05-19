<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Soporte Técnico</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="./dist/css/adminlte.min.css">

    <style>
        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            padding: 10px;
            margin: 10px;
        }

        .form1 {
            display: inline-block;
            width: 60%;
        }

        .form2 {
            display: inline-block;
            width: 35%;
            vertical-align: top;
        }

        input[type=text],
        textarea {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: vertical;
        }

        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #3e8e41;
        }

        .warning {
            background-color: #f2b705;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .warning:hover {
            background-color: #d9a004;
        }

        .success {
            background-color: #1c7430;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .success:hover {
            background-color: #175d23;
        }
    </style>
</head>


<body>

    <div class="content-fullscreen">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Enviar un Ticket</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Generar Tickets</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Registre la incidencia</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="procesar_ticket.php" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="selectCliente">Nit:</label>
                                        <input class="form-control" type="number" name="selectCliente" id="selectCliente" required>
                                        <label for="name_cliente">Cliente: </label>
                                        <input class="form-control" type="text" id="name_cliente" name="name_cliente" value="" readonly>
                                        <input class="form-control" type="hidden" id="id_cliente" name="id_cliente" value="" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Asunto:</label>
                                        <input type="text" id="title" name="title" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="adjunto">Adjunto:</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="archivo" name="archivo">
                                                <label class="custom-file-label" for="archivo">Seleccionar archivo</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Descripción:</label>
                                        <textarea id="description" name="description" rows="4" required></textarea>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                    <button type="reset" class="btn btn-danger">Borrar </button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-6">
                        <!-- Form Element sizes -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Consultar un Ticket</h3>
                            </div>
                            <div class="card-body">
                                <form id="form_consultar_ticket">
                                    <label for="numero_ticket">Número de Ticket:</label>
                                    <input class="form-control" type="number" id="numero_ticket" name="numero_ticket" required>
                                    <div class="form-group">
                                        <label for="estado">Estado</label>
                                        <input class="form-control" type="text" id="estado" name="estado" value="" readonly>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-info">Consultar</button>
                                        <button type="button" class="btn btn-default float-right">Cancelar</button>
                                    </div>
                                </form>


                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#form_consultar_ticket').submit(function(event) {
                event.preventDefault();
                var numeroTicket = $('#numero_ticket').val();
                $.ajax({
                    type: 'POST',
                    url: 'consultar_ticket.php',
                    data: {
                        numero_ticket: numeroTicket
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data.estado) {
                            $('#estado').val(data.estado);
                        } else if (data.error) {
                            console.log(data.error);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });

            // Evento keyup del input "selectCliente"
            $('#selectCliente').keyup(function() {
                /* event.preventDefault(); */
                var clienteNit = $(this).val();

                // Realizar la solicitud AJAX
                $.ajax({
                    type: 'POST',
                    url: 'buscar_cliente.php',
                    data: {
                        nit_cliente: clienteNit
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data.estado && data.id) {
                            // Actualizar el valor del campo "name_cliente"
                            $('#name_cliente').val(data.estado);
                            $('#id_cliente').val(data.id);
                        } else if (data.error) {
                            console.log(data.error);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>

</body>

</html>