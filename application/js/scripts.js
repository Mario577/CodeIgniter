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

---------------------------------------------------------------------------------------------------
let fila1 = document.createElement('tr');
                         let dui = document.getElementById("dui");
                         let fila1_dato1 = document.createElement('td');
                         fila1_dato1.innerHTML = informacion["dui"];
                         let nombre = document.getElementById("nombre");
                         let fila1_dato2 = document.createElement('td');
                         fila1_dato2.innerHTML = informacion["nombre"];
                         let edad = document.getElementById("edad")
                         let fila1_dato3 = document.createElement('td');
                         fila1_dato3.innerHTML = informacion["edad"];

                         fila1.appendChild(fila1_dato1);
                         fila1.appendChild(fila1_dato2);
                         fila1.appendChild(fila1_dato3);

------------------------------------------------------------------------------------------------
            let dui= $('#dui').val();
            let esp= /\d{8}[\s-]\d{1}/gm;
            let nombre= $('#nombre').val();
            let edad= $('#edad').val();

            if(dui == "" || dui.length<=10 ||!dui==/\d{8}[\s-]\d{1}/gm||  nombre == "" ||edad == ""||edad < 18){
                $("#mensaje1").fadeIn();
                $("#mensaje2").fadeIn();
                $("#mensaje3").fadeIn();
                $("#mensaje4").fadeIn();
                return false;
            }else{
                $("#mensaje1").fadeOut();
                $("#mensaje2").fadeOut();
                $("#mensaje3").fadeOut();
                $("#mensaje4").fadeOut();
           }




           // var informacion = _respuesta.tabla_datos;
                        // $.each(informacion, function(i, value) {
                        //     $('#tabla1').html($('#tabla1').html() + `
                        //     <tr><td>${value.dui}</td><td>  
                        //     ${value.nombre}  </td><td> 
                        //     ${value.edad} </td></tr>
                        //     `);

                        //     console.log(i+":"+value);
                            
                        //  });

                        //Funciona para validacion de correo  
                        // var valemail = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/; 



                           rules: {
                dui:{
                    required: true,
                    minlength: 10,
                    min: 18,
                    max: 99
                    
                },
                nombre: {
                    required: true,
                },
                edad:{
                    required: true,
                    maxlength: 2,
                    min: 18,
                    max: 99
                    
                }
            },
            messages: {
                dui:{
                    required:"Ingresa un Dui",
                    minlength:"Debe contener 10 caracteres inclyendo -"
                },
                nombre: {
                    required: "Ingresa un Nombre",
                },
                edad: {
                    required: "Ingresa tu edad",
                    min: "Debes tener 18 años "
                }
            }

----------------------------------------------------------------------------------------------------------
<script>
        $('#Guardar').click(function() {
            event.preventDefault();
            $("#form_1").validate({
                rules: {
                    dui: {
                        required: true,
                        minlength: 10,
                        min: 18,
                        max: 99

                    },
                    nombre: {
                        required: true,
                    },
                    edad: {
                        required: true,
                        maxlength: 2,
                        min: 18,
                        max: 99

                    }
                },
                messages: {
                    dui: {
                        required: "Ingresa un Dui",
                        minlength: "Debe contener 10 caracteres inclyendo -"
                    },
                    nombre: {
                        required: "Ingresa un Nombre",
                    },
                    edad: {
                        required: "Ingresa tu edad",
                        min: "Debes tener 18 años "
                    }
                }
            });

            var _datos = $('#form_1');
            $.ajax({
                url: 'http://localhost/CodeIgniter/index.php/Listas/guardar_by_ajax3',
                data: _datos.serialize(),
                type: 'POST',
                success: function(reshhh) {
                    let _respuesta = JSON.parse(reshhh);
                    console.log(_respuesta);
                    if (_respuesta.respuesta == true) {
                        alert(_respuesta.msj)
                        $('#tabla1').html(_respuesta.tabla_datos);
                        
                    } else {
                        console.error(_respuesta.msj);
                    }
                }
            });
        });
    </script>

---------------------------------------------------------------------------------------------------------
 $this->load->helper(array('form'));
        $this->load->library('form_validation');
        $config = array(
            array(
                'field' => 'dui',
                'label' => 'Dui',
                'rules' => 'required|exact_length[10]|alpha_dash',
                $this->form_validation->set_message('rule2',  'Debe contener 10 caracteres incluyendo')
            ),
            array(
                'field' => 'nombre',
                'label' => 'Nombre',
                'rules' => 'required',


            ),
            array(
                'field' => 'edad',
                'label' => 'Edad',
                'rules' => 'required',

            ),
        );
        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('agregarnuevo3');
        } else {
            $this->load->library('table');
                $listado = $this->empleadomodelo->tabla();
                $template = array('table_open' => '<table  class="table" id="tabla1">');
                $this->table->set_template($template);
                $this->table->set_heading('Dui', 'Nombre', 'Edad');
                $usuarios['tabla_datos'] = $this->table->generate($listado);
        */