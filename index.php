<?php
require_once './inc/page.php';

$page = new Page("index");
$page->print_title();
?>
<div class="container">
    <div class="jumbotron">
        <div style="text-align: center;">
<img src="https://via.placeholder.com/350x150"/>
            <h2 style="text-shadow:none; color:black;"><?php echo $page->lang->index_welcome1 . $page->settings->name . $page->lang->index_welcome2; ?></h2>
        </div>

        <div style="text-align: center;"><p style="color:black;"><?php echo $page->lang->index_allsins; ?></p></div>
<div style="text-align: center;">
<a href="#">
<button type="button" class="btn btn-default">Contact Us</button></a>

<a href="#">
<button type="button" class="btn btn-default">Ban Appeal</button></a></div>
<div style="text-align: center;">
<button type="button" class="btn btn-default">Players Online: <span class="player-count badge"></span></button></a>
</div>
<div class-"conatiner">
    <div class="icon">
<a href="#">
    	 <span class="fa-stack fa-2x" aria-hidden="true">
    	   <i class="fa fa-youtube-play fa-stack-1x fa-inverse"></i>
    	 </span></a>
<a href="#">
    	  <span class="fa-stack fa-2x" aria-hidden="true">
    	   <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
    	 </span></a>
<a href="#">
    	  <span class="fa-stack fa-2x" aria-hidden="true">
    	   <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
    	 </span></a>
<a href="#">
    	  <span class="fa-stack fa-2x" aria-hidden="true">
    	   <i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>
    	 </span>
    </a>
   
</div>
<form method="post">
<select class="form-control" name='theme' onchange='this.form.submit();'>
<?php
$themes = Array('mdb-teal','mdb-red','mdb-warning','mdb-success','mdb-info');
if(!isset($_SESSION['theme'])){
?>
  <option>mdb-teal</option>
  <option>mdb-red</option>
<option>mdb-warning</option>
<option>mdb-success</option>
<option>mdb-info</option>
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
    </div>
</div>
<?php $page->print_footer(false); ?>
