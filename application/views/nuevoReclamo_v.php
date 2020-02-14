<?php 
  //prp($listarBancos);
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
 <a class="light-blue darken-3 btn-small"><i class="material-icons left">save</i>Guardar</a>
 <a href="<?=base_url()?>.reclamos_controller/listarReclamos" class="light-blue darken-3 btn-small"><i class="material-icons left">arrow_back</i>Regresar</a>
<hr>  
    <div class="row">
      <h4 align="center">Datos del Cliente</h4>
      <!-- primer cuadro inicio -->
      <div class="col s3">
        <div class="col">         
            N° Reclamo
            <input type="text" name="num_reclamo">         
        </div>

        <div class="col s11">         
            Fecha
            <input type="text" class="datepicker" name="num_reclamo" value="<?= date('d-m-Y') ?>" disabled>         
        </div>
      </div>
      <!-- primer cuadro fin  -->

      <!-- cuadro nacionalidad inicio  -->
       <div class="col l2">
        Nacionalidad
        <form action="#">
          <p>
            <label>
              <input name="group1" type="radio" />
              <span><b>Venezolana</b></span>
            </label>
          </p>
          <p>
            <label>
              <input name="group1" type="radio" />
              <span><b>Extranjero</b></span>
            </label>
          </p>
          <p>
            <label>
              <input name="group1" type="radio" />
              <span><b>Pasaporte</b></span>
            </label>
          </p>
        </form>
      </div>
      <!-- cuadro nacionalidad fin  -->

      <!-- cuadro datos cliente inicio  -->
      <div class="col s6">
        <div class="col s4">
          N° Identidad
          <input type="text" name="cedula">
        </div>
        <div class="col s8">
          Apellidos y Nombres
          <input type="text" name="nombreApellido">
        </div>

        <div class="col s5">
          Cuenta Bancaria
          <input type="text" name="cuenta">
        </div>

        <div class="col s7">
          Numero de Tarjeta (Cta Cte o Ahorros)
          <select>
            <option value="" disabled selected>Seleccione</option>
            <option value="1">10000055587</option>            
          </select>          
        </div>
      </div>
      <!-- cuadro datos cliente fin  -->
    </div>
  
    <div class="row">
        <h4 align="center">  Datos del ATM'S POS</h4>
      <div class="col s6">
        Bancos
         <select>
          <option value="" disabled selected>Seleccione</option>
          <?php foreach ($listarBancos as $id => $banco) { ?>
              <option value="<?= $banco['ID_BANCO'] ?>"> <?= $banco['nombre_banco']; ?></option>
          <?php } ?>          
          </select>  

      </div>
    
      <div class="col s6">
        Dispositivos  
         <form action="#">                  
             <p>
            <label>
              <input name="group1" type="radio" />
              <span><b>ATM'S.</b></span>
            </label>
         
            <label>
              <input name="group1" type="radio" />
              <span><b>POS</b></span>
            </label>
          </p>  
        </form>
      </div>
      <div class="col s11">
        Ubicacion del ATM'S. POS o INTERNET BANKING
        <textarea id="textarea1" class="materialize-textarea"></textarea>
      </div>
    </div>

    <div class="row">
      <h4 align="center">Datos del Reclamo</h4>
      <div class="col s12">
        Motivo del Reclamo  
         <form action="#">                  
          <p>
            <label>
              <input name="group3" type="radio" />
              <span><b>Monto no Dispensado</b></span>
            </label>

            <label>
              <input name="group3" type="radio" />
              <span><b>Dispensado Parcialmente</b></span>
            </label>

            <label>
              <input name="group3" type="radio" />
              <span><b>Otros Especifique en la Observacion</b></span>
            </label>
          </p>
        </form>
      </div>
      <div class="col s4">
        Fecha Transaccion
        <input type="date" name="num_reclamo">    
      </div>
      <div class="col s4">
        Monto Solicitado
        <input type="text" name="num_reclamo" class="moneda"> 
      </div>
      <div class="col s3">
        Monto Dispensado o Autorizado
        <input type="text" name="num_reclamo" class="moneda"> 
      </div>
       <div class="col s11">
        Observaciones
        <textarea id="textarea1" class="materialize-textarea"></textarea>
      </div>

    </div>





  <script type="text/javascript">
    $(document).ready(function(){
      $(".moneda").on({
          "focus": function (event) {
              $(event.target).select();
          },
          "keyup": function (event) {
              $(event.target).val(function (index, value ) {
                  return value.replace(/\D/g, "").replace(/([0-9])([0-9]{2})$/, '$1,$2').replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
              });
          }
      });     

    })
  </script>
</body>
</html>