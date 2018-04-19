<?php
require_once './inc/page.php';

$page = new Page("index");
$page->print_title();
?>
<div class="container">
    <div class="jumbotron">
        <div style="text-align: center;">
          <img class="img-fluid" src="<?php echo $page->settings->logo_image; ?>"/>
            <h2 style="text-shadow:none; color:black; font-family: 'Raleway', sans-serif;"><h2><?php echo str_replace("{server}", $page->settings->name, $page->t("index.welcome.main")); ?></h2>
        </div>
<div style="text-align: center;"><p style="color:black; font-family: 'Raleway', sans-serif;"><?php echo $page->t("index.welcome.sub"); ?></p></div>
<?php if ($page->settings->show_main_page_search_button) : ?>
<?php $page->print_main_page_search_button(); ?>
<?php else : ?>
<?php endif; ?>
<div style="text-align: center;">
<?php if ($page->settings->show_contact_button) : ?>
<a href="<?php echo $page->settings->contact_link; ?>">
<button type="button" class="btn btn-default"><?php echo $page->t("contact_button"); ?></button></a>
<?php else : ?>
<?php endif;?>
<?php if ($page->settings->show_appeal_button) : ?>
<a href="<?php echo $page->settings->appeal_link; ?>">
<button type="button" class="btn btn-default"><?php echo $page->t("ban_appeal"); ?></button></a></div>
<?php else : ?>
<?php endif;?>
<?php if ($page->settings->show_on_page) : ?>
<div style="text-align: center;">
<button type="button" class="btn btn-default" id="player-count-button" data-clipboard-text="<?php echo $page->settings->server_ip ?>" title="Click to Copy IP"><?php echo $page->t("join"); ?> <span class="player-count badge"></span> <?php echo $page->t("others"); ?> <span class="badge" style="margin-left: 5px;"><?php echo $page->settings->server_ip ?></span></button>
</div>
<?php else : ?>
<?php endif;?>
            <div style="text-align: center;">
                <?php $page->print_player_heads(); ?>
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
tippy('#player-head', {
  animation: 'scale',
  position: 'bottom',
  duration: 500,
  arrow: true
})
</script>
<script></script>
<?php if ($page->settings->show_social) : ?>
<div class="conatiner ">
    <div class="icon">
<a href="<?php echo $page->settings->youtube_link; ?>">
    	 <span class="fa-stack fa-3x" aria-hidden="true">
    	   <i class="fab fa-youtube fa-inverse"></i>
    	 </span></a>
<a href="<?php echo $page->settings->twitter_link; ?>">
    	  <span class="fa-stack fa-3x" aria-hidden="true">
    	   <i class="fab fa-twitter-square fa-inverse"></i>
    	 </span></a>
<a href="<?php echo $page->settings->facebook_link; ?>">
    	  <span class="fa-stack fa-3x" aria-hidden="true">
    	   <i class="fab fa-facebook fa-inverse"></i>
    	 </span></a>
<a href="<?php echo $page->settings->discord_link; ?>">
    	  <span class="fa-stack fa-3x" aria-hidden="true">
    	   <i class="fab fa-discord fa-inverse"></i>
    	 </span>
    </a>
</div>
</div>
        <?php else : ?>
        <?php endif;?>
</div>
</div>
<?php $page->print_footer(false); ?>
  