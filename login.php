<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body onload="getLocation()">
<div>
 <?php
      if($this->session->flashdata('ErrorMessage')!='') { ?>
      <div class="log-er"><div class="box">
          <table>
            <tr>
                <td><img alt="logo Godelius" src="<?php echo base_url()?>public/img/oops.jpg"></td>  
                <td><?php echo $this->session->flashdata('ErrorMessage'); ?></td>
              </tr>
              <tr>
                <td colspan="2"><a href="">Reintentar</a></td>
              </tr>
          </table>
          
          </div></div>
 <?php } ?>
  <?php  
    $attributes = array('id' => 'login'); 
    echo form_open(null,$attributes); 
   ?>
  <div class="form">
      <img alt="logo Godelius" src="<?php echo base_url()?>public/img/GODELIUS.png">
        <input type="text" id="corr" name="corr" placeholder="Correo">
        <input type="password" id="pass" name="pass" placeholder="Contraseña">
        <input onclick="logining()" type="button" value="Iniciar Sesión">
<img id="caps" src="<?php echo base_url()?>public/img/caplocks.png" width="20px">
    </div>
    <input type="hidden" name="latitude" id="lat" style="display: none">
    <input type="hidden" name="longitude" id="lon" style="display: none">
  <?php echo form_close(); ?>

</div>
<script>
    function logining(){
        corr = document.getElementById("corr").value;
        pass = document.getElementById("pass").value;
        if (corr.length == 0 || /^\s+$/.test(corr)) {
            document.getElementById("corr").className = "fail";
            document.getElementById("corr").placeholder = "Debes ingresar un correo elecrónico válido";
        }
        if (pass.length == 0 || /^\s+$/.test(pass)) {
            document.getElementById("pass").className = "fail";
            document.getElementById("pass").placeholder = "Debes ingresar una contraseña";
        }
        else{
            document.getElementById("login").submit();
        }
    }
    CapsLock.addListener(function(isOn){
  if (isOn){
    document.getElementById("caps").style.opacity=0.75;
  }else{
    document.getElementById("caps").style.opacity=0;  
  }
});
</script>

<script>
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}
function showPosition(position) {
    latitude = position.coords.latitude;
    longitude = position.coords.longitude;
    $("#lat").attr("value",latitude);
    $("#lon").attr("value",longitude);
}
</script>