<?php
    $title ="Eventos | ";
    include "head.php";
    include "sidebar.php"; 

//$sql = "SELECT id, title, start, final, color FROM events "; 
$events=mysqli_query($con, "SELECT id, title, start, end, color FROM events");
//$req = $con->prepare($sql);
//$events = mysqli_fetch_array($req);
//$req = $con->prepare($sql);
//$req->execute(); 
//$events = $req->fetchAll();
?>
    <!-- Navigation -->   
    
    <!-- Page Content -->
    <div class="right_col" role="main">
    <div class="container-fluid">
            <div class="page-title">
                <div class="clearfix"></div>
                <div class="col-md-12 col-sm-12 col-xs-12"> 
                <div class="x_panel">
                <div class="app-title">                    
                        <h2><i class="fa fa-calendar"></i> Calendario para administrar eventos</h2>
                        <!-- <p class="lead">Completa con rutas de archivo predefinidas que no tendrás que cambiar!</p> -->
                        <div id="calendar" class="col-centered"> </div>                    
                        <div class="clearfix"></div>
                  </div>
                </div>
                <!-- /.row -->
                <?php
                  include("modal/new_evento.php");
                  include("modal/upd_evento.php");
                ?>
                </div>
            </div>       
    </div>
    </div>
    <!-- /.container -->
 
    <!-- jQuery Version 1.11.1 / Se actualiza la version del jQuery v2.2.3 el dìa 10-Marzo-2021-->
    <script src="js/jquery/dist/jquery.js"></script> 

    <script> 
    $(document).ready(function() {

       //var calendarEl = document.getElementById('calendar'); 
       var date = new Date();
       var yyyy = date.getFullYear().toString();
       //var yyyy = (date.getFullYear()).toString().length == 1 ? "0"+(date.getFullYear()).toString() : (date.getFullYear()).toString();
       var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
       var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();
        
        $('#calendar').fullCalendar({
            header: {
                language: 'es',
                left: 'prev,next today',
                center: 'title',
                //right: 'month,basicWeek,basicDay',
                right: 'month,agendaWeek,agendaDay,listDay,listWeek'
                //right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
 
            },
            views: {
                listDay: { buttonText: 'List Day' },
                listWeek: { buttonText: 'List Week' }
              },
            defaultDate: yyyy+"-"+mm+"-"+dd,
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar
            eventLimit: true, // allow "more" link when too many events
            selectable: true,
            selectHelper: true,
            navLinks: true, // can click day/week names to navigate views
            nowIndicator: true,  
            //weekNumbers: true,
            //dayMaxEvents: true,          

            select: function(start, end) {
                
                $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
                $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
                $('#ModalAdd').modal('show');
            },
            eventRender: function(event, element) {
                element.bind('dblclick', function() {
                    $('#ModalEdit #id').val(event.id);
                    $('#ModalEdit #title').val(event.title);
                    $('#ModalEdit #color').val(event.color);
                    $('#ModalEdit').modal('show');
                });
            },
            eventDrop: function(event, delta, revertFunc) { // si changement de position
 
                edit(event);
 
            },
            eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur
 
                edit(event);
 
            },
            events: [
            <?php 
            foreach($events as $event){ 
            
                //$start=$event['start'];
                $start = explode(" ", $event['start']);
                $end = explode(" ", $event['end']);
                
                if($start[1] == '00:00:00'){
                    $start = $start[0];
                }else{
                    $start = $event['start'];
                }
                if($end[1] == '00:00:00'){
                    $end = $end[0];
                }else{
                    $end = $event['end'];
                }
            ?>
                {
                    id: '<?php echo $event['id']; ?>',
                    title: '<?php echo $event['title']; ?>',
                    start: '<?php echo $start; ?>',
                    end: '<?php echo $end; ?>',
                    color: '<?php echo $event['color']; ?>',
                },

            <?php  
                
                }

              ?> 

            ]
        });
        
        function edit(event){
            start = event.start.format('YYYY-MM-DD HH:mm:ss');
            if(event.end){
                end = event.end.format('YYYY-MM-DD HH:mm:ss');
            }else{
                end = start;
            }
            
            id =  event.id;
            
            Event = [];
            Event[0] = id;
            Event[1] = start;
            Event[2] = end;
            
            $.ajax({
             url: 'editEventDate.php',
             type: "POST",
             data: {Event:Event},
             success: function(rep) {
                    if(rep == 'OK'){
                        alert('Evento se ha guardado correctamente');
                    }else{
                        alert('No se pudo guardar. Inténtalo de nuevo.'); 
                    }
                }
            });
        }
        calendar.render();
    });
 
</script>
<?php include "footer.php" ?>

