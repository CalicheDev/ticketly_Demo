<?php
    $projects =mysqli_query($con, "select * from project");
    $priorities =mysqli_query($con, "select * from priority");
    $statuses =mysqli_query($con, "select * from status");
    $kinds =mysqli_query($con, "select * from kind");
    $asesores = mysqli_query($con, "select * from asesor");
    $categories =mysqli_query($con, "select * from category");
?>
    <!-- Modal -->
    <div class="modal fade bs-example-modal-lg-img" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel"> Adjuntar contenido multimedia</h4>
                </div>
                <div class="modal-body">
                    <center>
                    <form action="action/upload-multimedia.php" method="post" id="formulario" enctype="multipart/form-data">
                       <!--  <form class="form-horizontal form-label-left input_mask" method="post" action="action/updticket.php" enctype="multipart/form-data">-->
                        <input type="text" name="nombre" placeholder="Nombre..." value=""/><br></br>
                        <input type="file" name="file"/></br>
                        <input type="submit" value="Aceptar">

                        
                    </form>
                    </center>             
                </div>
                <!--<div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div> -->
            </div>
        </div>
    </div> <!-- /Modal -->

    <!--<script>
    $(function(){
        $("input[name='file']").on("change", function(){
            var formData = new FormData($("#formulario")[0]);
            var ruta = "action/upload-multimedia.php";
            $.ajax({
                url: ruta,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(datos)
                {
                    $("#respuesta").html(datos);
                    $('#upd_data2').attr("disabled", false);

                }
            });
        });
    }); 
    </script> -->