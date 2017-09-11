<form method="post">
<select class="form-control" name='theme' onchange='this.form.submit();'>
<?php
$themes = Array('mdb-teal','mdb-red','mdb-warning','mdb-success','mdb-info','mdb-secondary','mdb-usa');
if(!isset($_SESSION['theme'])){
?>
<option>mdb-teal</option>
<option>mdb-red</option>
<option>mdb-warning</option>
<option>mdb-success</option>
<option>mdb-info</option>
<option>mdb-secondary</option>
<option>mdb-usa</option>
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