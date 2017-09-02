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
    </div>
</div>
<?php $page->print_footer(false); ?>
