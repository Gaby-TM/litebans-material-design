<?php
require_once './inc/page.php';

$page = new Page("index");
$page->print_title();
?><br><br>
<div class="container">
<div id="particles-js"></div>
    <div class="jumbotron">
        <div style="text-align: center;">
          <img src="<?php echo $page->settings->logo_image; ?>"/>
            <h2 style="text-shadow:none; color:black; font-family: 'Raleway', sans-serif;"><?php echo $page->lang->index_welcome1 . $page->settings->name . $page->lang->index_welcome2; ?></h2>
        </div>

<div style="text-align: center;"><p style="color:black; font-family: 'Raleway', sans-serif;"><?php echo $page->lang->index_allsins; ?></p></div>
<div style="text-align: center;">
<a href="<?php echo $page->settings->contact_link; ?>">
<button type="button" class="btn btn-default"><?php echo $page->lang->contact_button; ?></button></a>

<a href="<?php echo $page->settings->appeal_link; ?>">
<button type="button" class="btn btn-default"><?php echo $page->lang->ban_appeal; ?></button></a></div>
<div style="text-align: center;">

<button type="button" class="btn btn-default" id="player-count-button" data-clipboard-text="<?php echo $page->settings->server_ip ?>" title="Click to Copy IP"><?php echo $page->lang->join; ?> <span class="player-count badge"></span> <?php echo $page->lang->others; ?> <span class="badge" style="margin-left: 5px;"><?php echo $page->settings->server_ip ?></span></button>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.7.1/clipboard.min.js"></script>
<script src="https://unpkg.com/tippy.js@1.2.1/dist/tippy.min.js"></script>
<script>
  var btn = document.getElementById('player-count-button');
  var clipboard = new Clipboard(btn);
  clipboard.on('success', function(e) {
      console.log(e);
  });
  clipboard.on('error', function(e) {
      console.log(e);
  });
</script>


<script>
tippy('#player-count-button', {
  animation: 'scale',
  position: 'bottom',
  duration: 500,
  arrow: true
})
</script>

<div class-"conatiner">
    <div class="icon">
<a href="<?php echo $page->settings->youtube_link; ?>">
    	 <span class="fa-stack fa-2x" aria-hidden="true">
    	   <i class="fa fa-youtube-play fa-stack-1x fa-inverse"></i>
    	 </span></a>
<a href="<?php echo $page->settings->twitter_link; ?>">
    	  <span class="fa-stack fa-2x" aria-hidden="true">
    	   <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
    	 </span></a>
<a href="<?php echo $page->settings->facebook_link; ?>">
    	  <span class="fa-stack fa-2x" aria-hidden="true">
    	   <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
    	 </span></a>
<a href="<?php echo $page->settings->googleplus_link; ?>">
    	  <span class="fa-stack fa-2x" aria-hidden="true">
    	   <i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>
    	 </span>
    </a>

</div>
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
    </div>
</div>
<?php $page->print_footer(false); ?>
