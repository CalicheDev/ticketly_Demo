<!--Modal -->
<form class="form-horizontal" method="post" id="files_ticket" name="files_ticket">
    <div class="modal fade" id="modal_files_ticket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Archivos</h4>
                </div>
                <div class="modal-body">
                    <div class="image view view-first">
                      <img class="thumb-image" style="width: 20%; display: block;" src="images/multimedia/<?php echo $reg3['files_ticket_name']?>" alt="image" />
                      <a class="btn btn-default" title="Download" download href="images/multimedia/<?php echo $reg3['files_ticket_name']?>"><i class="fa fa-paperclip"></i> Descargar archivo</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</form>