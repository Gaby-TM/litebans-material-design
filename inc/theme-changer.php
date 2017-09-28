<i class="fa fa-paint-brush" aria-hidden="true" style="color:white; padding-left:10px;"></i>
<form method="post" style="display:inline-block;">
<select class="form-control" name='theme' style="margin-top:0rem; height:50px; margin-bottom:0rem; font-size:13px; border:none;" onchange='this.form.submit();'>
<?php
$themes = Array('mdb-teal','mdb-red','mdb-warning','mdb-success','mdb-info','mdb-secondary','mdb-usa','halloween');
if(!isset($_SESSION['theme'])){
?>
<option>mdb-teal</option>
<option>mdb-red</option>
<option>mdb-warning</option>
<option>mdb-success</option>
<option>mdb-info</option>
<option>mdb-secondary</option>
<option>mdb-usa</option>
<option>halloween</option>
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