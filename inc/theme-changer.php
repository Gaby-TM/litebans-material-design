<i class="fa fa-paint-brush" aria-hidden="true" style="color:white; padding-left:10px;"></i>
<form method="post" style="display:inline-block;">
<select class="form-control" name='theme'style="margin-top:0rem; height:50px; margin-bottom:0rem; font-size:13px; border:none;" onchange='this.form.submit();'>
<?php
$themes = Array('wilikath','dreswen','astielian','giarith','cerrav','abyn','america','christmas'); 
if(!isset($_SESSION['theme'])){
?>
<option>Wilikath</option>
<option>Dreswen</option>
<option>Astielian</option>
<option>Giarith</option>
<option>Cerrav</option>
<option>Abyn</option>
<option>America</option>
<option>Christmas</option>
  <?php
}else{
   foreach($themes AS $themey){
      if(strtolower($themey)==$_SESSION['theme']){
         echo "<option selected>" . $themey . "</option>";
      }else{
         echo '<option>'.$themey."</option>";
      }
}
}
?>
</select>
<noscript><input type="submit" value="Change"></noscript>
</form>