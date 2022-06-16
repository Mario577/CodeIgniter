/*<script type="text/javascript">
    $(document).ready(function(){
        $('#guardar').click(function(){
                var datos=$('#form_1').serialize();
                    $.ajax({
                        type:"post",
                        url:"Listas.php",
                        data:datos,
                        success:function(r){
                            if(r==1){
                                alert("agregado con exito");
                            }else{
                                alert("Fallo al insertar");
                            }

                        }
                    });
                return false;
        });
    });
</script>  

---------------------------------------------------------------------------------------------------------------
<script>
            $("#Guardar").click(function(){

                var url =  "@Url.Action('guardar_by_ajax', 'Listas')";
                var dui = $("#dui").val();
                var nombre = $("#nombre").val();
                var edad = $("#edad").val();
                var datos = {Dui: dui, Nombre: nombre, Edad: edad,};

                $.post(url, datos). done(function(datos){
                    if(datos.Ok){
                        $("#div-alerta").removeClass("alert-danger").addClass("alert-success").slideDown(200);
                    } else {
                        $("#div-alerta").removeClass("alert-success").addClass("alert-danger").slideDown(200);

                    }
                    $("mensaje-alerta").html(data.mensaje)
                }).fail(manejarErrorAjax);
            });

            $("#btn-cerrar-alerta").click(function(){
                $(this).parent().slideUp(200);
            });
        </script>
----------------------------------------------------------------------------------------
        <script>
          $( "#form_1" ).on( "submit", function( event ) {
        event.preventDefault();
        $.ajax({
            url: "http://localhost/CodeIgniter/index.php/Listas/tablausuarios",
            type: 'post',
            data: $( this ).serialize(), 
            success: function(response){
                alert( response );
            }
        });
    });
</script>
---------------------------------------------------------------------------------------------
  $('#Guardar').click(function() {  
        event.preventDefault();

    var _dui = $('#dui').val();  
    // cons]ole.log(_dui);
    var _datos = $('#form_1');  
    // console.log(_datos.serialize());
    $.ajax({  
        url: 'http://localhost/CodeIgniter/index.php/Listas/guardar_by_ajax',  
        type: 'POST',  
        data: _datos.serialize(),  
        success: function(result) {  
            let _respuesta = JSON.parse(result);
            console.log(_respuesta);
            if (_respuesta.respuesta==true) {
                alert(_respuesta.msj)
            } else {
                console.error(_respuesta.msj);
            }
        }
    });      
    });   
    </script>



        */