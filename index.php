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
<?php $page->print_main_page_search_button(); ?>
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

<div class="conatiner">
<?php $page->print_social(); ?>
    

    </div>
</div>
</div>
<?php $page->print_footer(false); ?>
