<?php 
  //prp($numeroReclamo);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?= cargar_headers() ?>
  <?= mostrar_nav_bar() ?>
	<meta charset="UTF-8">
	<title>Nuevo Reclamo</title>
</head>
<body>

<hr>
 <a class="light-blue darken-3 btn-small" onclick="enviar()"><i class="material-icons left">save</i>Guardar</a>
 <a href="<?=base_url()?>inicio_controller" class="light-blue darken-3 btn-small"><i class="material-icons left">arrow_back</i>Regresar</a>
<hr>

  <form  method="post" action="<?= base_url() ?>reclamos_controller/guardar" id="formulario">
    <div class="row">
      <h4 align="center">Datos del Cliente</h4>
      <!-- primer cuadro inicio -->
      <div class="col s3">
        <div class="col">         
            N° Reclamo
            <input type="text" name="num_reclamo" readonly="true" value="<?=$numeroReclamo?>">
        </div>

        <div class="col s11">         
            Fecha
            <input type="text"  name="fechaReclamo" value="<?= date('d-m-Y') ?>" readonly="true">         
        </div>
      </div>
      <!-- primer cuadro fin  -->

      <!-- cuadro nacionalidad inicio  -->
       <div class="col l2" id="nacionalidad">
        Nacionalidad       
          <p>
            <label>
              <input class="nacionalidad" name="nacionalidad" type="radio" value="V" />
              <span><b>Venezolana</b></span>
            </label>
          </p>
          <p>
            <label>
              <input class="nacionalidad" name="nacionalidad" type="radio" value="E" />
              <span><b>Extranjero</b></span>
            </label>
          </p>
          <p>
            <label>
              <input class="nacionalidad" name="nacionalidad" type="radio" value="P" />
              <span><b>Pasaporte</b></span>
            </label>
          </p>       
      </div>
      <!-- cuadro nacionalidad fin  -->

      <!-- cuadro datos cliente inicio  -->
      <div class="col s6" id="datos">
        <div class="col s4">
          N° Identidad
          <input class="cedula" type="text" name="cedula" id="cedula" onblur="buscarCliente()" readonly="true" >
        </div>
        <div class="col s8">
          Apellidos y Nombres
          <input type="text" id="nombre" name="nombreApellido" readonly="true" >
        </div>

        <div class="col s5" id="divCuentas">
          Cuenta Bancaria
          <div>
            <select id="cuentas" name="cuentas" onchange="buscarTarjeta()">
              <option value="">Seleccione</option>
            </select>
          </div>
        </div>

        <div class="col s7">
          Numero de Tarjeta (Cta Cte o Ahorros)
          <select id="tarjeta" name="tarjeta">
            <option value="">Seleccione</option>
          </select>          
        </div>
      </div>
    </div>
      <!-- cuadro datos cliente fin  -->





    <div class="row" id="datosAtms">
      <h4 align="center">  Datos del ATM'S POS</h4>
      <div class="col s6">
        Bancos
         <select name="banco" id="banco">
          <option value="#" selected>Seleccione</option>
          <?php foreach ($listarBancos as $id => $banco) { ?>
              <option value="<?= $banco['ID_BANCO'] ?>"> <?= $banco['nombre_banco']; ?></option>
          <?php } ?>          
          </select>
      </div>
    
      <div class="col s6">
        Dispositivos                          
        <p>
          <label>
            <input name="dispositivo" id="group2" type="radio" value="atm's" />
            <span><b>ATM'S.</b></span>
          </label>
       
          <label>
            <input name="dispositivo" id="group2" type="radio" value="pos" />
            <span><b>POS</b></span>
          </label>
        </p>          
      </div>

      <div class="col s11">
        Ubicacion del ATM'S. POS o INTERNET BANKING
        <textarea name="ubicacion" id="textarea1" class="materialize-textarea" readonly="true"></textarea>
      </div>
    </div>






    <div class="row">
      <h4 align="center">Datos del Reclamo</h4>
      <div class="col s12">
        Motivo del Reclamo  
                       
          <p>
            <label>
              <input name="motivoReclamo" id="group3" type="radio" value="noDispensado" />
              <span><b>Monto no Dispensado</b></span>
            </label>

            <label>
              <input name="motivoReclamo" id="group3" type="radio" value="dispensadoParcial" />
              <span><b>Dispensado Parcialmente</b></span>
            </label>

            <label>
              <input  class="otros" name="motivoReclamo" id="group3" type="radio" value="otros" />
              <span><b>Otros Especifique en la Observacion</b></span>
            </label>
          </p>
        
      </div>
      <div class="col s4">
        Fecha Transaccion
        <input type="date" id="fechaTrans" name="fechaTrans">    
      </div>
      <div class="col s4">
        Monto Solicitado
        <input type="text" name="montoSolicitado" id="montoSolicitado" class="moneda"> 
      </div>
      <div class="col s3">
        Monto Dispensado o Autorizado
        <input type="text" name="montoDispensado" id="montoDispensado" class="moneda"> 
      </div>
       <div class="col s11">
        Observaciones
        <textarea id="textarea2" class="materialize-textarea" name="observaciones" id="observaciones" readonly="true"></textarea>
      </div>
    </div>
  </form>

  <hr>
 <a class="light-blue darken-3 btn-small" onclick="enviar()"><i class="material-icons left">save</i>Guardar</a>
 <a href="<?=base_url()?>inicio_controller" class="light-blue darken-3 btn-small"><i class="material-icons left">arrow_back</i>Regresar</a>
<hr>





  <script type="text/javascript">
    $(document).ready(function(){
      $("#datosAtms").attr('disabled','disabled')
      $(".moneda").on({
          "focus": function (event) {
              $(event.target).select();
          },
          "keyup": function (event) {
              $(event.target).val(function (index, value ) {
                  return value.replace(/\D/g, "").replace(/([0-9])([0-9]{2})$/, '$1,$2').replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
              });
          }
      })
      //habilitar el campo para escribir el numero de cedula
      $('.nacionalidad').on('click', function(){
          $('.cedula').removeAttr('readonly')
      })
      //////////////////////////////////////////////////////


      //habilitar el campo para escribir la ubicacion del atm o pos
      $('#group2').on('click', function(){
          $('#textarea1').removeAttr('readonly')
      })
      /////////////////////////////////////////////////////////////

      $('.otros').on('click', function(){
        $('#textarea2').removeAttr('readonly')
      })
    })

    function buscarCliente(){
      var cedula = $('#cedula').val()
      var url = "<?=site_url()?>/reclamos_controller/buscarPersona"      
      $.ajax({
        type: "post",
        dataType: "json",
        url: url,
        data: {
          cedula : cedula
        },success: function (data) {
          if (data != ''){
            $('#nombre').val(data.apellido+' '+data.nombre)
          }else{
            console.log('fallo')
          }
        }
      })
      buscarCuentas(cedula)
    }

    function buscarCuentas(cedula){
      var url = "<?=site_url()?>/reclamos_controller/buscarCuentas/"+cedula      
      $.ajax({
          type: "post",
          dataType: "json",
          url: url,
          data: {cedula: cedula},
          success: function (cuenta){
            if(cuenta != ''){
               let select = $('#cuentas')               
                let obj = cuenta
                obj.forEach((elemento, indice) => {                 
                    select.append(`
                        <option value="${elemento.ID_CUENTA}">${elemento.numero_cuenta}</option>
                    `)
                });
                 $('select').formSelect();
            }else{
              alert('No Hay Cuenta Registrada para la Cedula '+cedula)
            }
          }
      })
    }

    function buscarTarjeta(){
      var id_cuenta = $('#cuentas').val()
      var url = "<?=site_url()?>/reclamos_controller/buscarTarjeta/"+id_cuenta
      $('#tarjeta').html('')
      $.ajax({
        type: "post",
        dataType: "json",
        url: url,
        data: {ID_CUENTA : id_cuenta},
        success: function (tarjeta) {
          console.log(tarjeta)
          if (tarjeta != ''){
            let select = $('#tarjeta')
            let obj = tarjeta

            obj.forEach((elemento, indice) => {
              select.append(`<option value"${elemento.numero_tarjeta}">${elemento.numero_tarjeta}</option>`)
            })
            $('select').formSelect();
          }else{
            alert('Tarjeta no registrada para la cuenta Seleccionada')
          }
        }
      })
    }

    function enviar() {
      $('#formulario').submit()
    }
   
  </script>
</body>
</html>






















