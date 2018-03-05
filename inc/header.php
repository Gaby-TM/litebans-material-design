<?php session_start();

class Header {
/**
 * @param $page Page
 */
function __construct($page) {
    $this->page = $page;
    if ($page->settings->header_show_totals) {
        $t = $page->settings->table;
        $t_bans = $t['bans'];
        $t_mutes = $t['mutes'];
        $t_warnings = $t['warnings'];
        $t_kicks = $t['kicks'];
        try {
            $st = $page->conn->query("SELECT
            (SELECT COUNT(*) FROM $t_bans) AS c_bans,
            (SELECT COUNT(*) FROM $t_mutes) AS c_mutes,
            (SELECT COUNT(*) FROM $t_warnings) AS c_warnings,
            (SELECT COUNT(*) FROM $t_kicks) AS c_kicks");
            ($row = $st->fetch(PDO::FETCH_ASSOC)) or die('Failed to fetch row counts.');
            $st->closeCursor();
            $this->count = array(
                'bans.php'     => $row['c_bans'],
                'mutes.php'    => $row['c_mutes'],
                'warnings.php' => $row['c_warnings'],
                'kicks.php'    => $row['c_kicks'],
            );
        } catch (PDOException $ex) {
            Settings::handle_error($page->settings, $ex);
        }
    }
}

function navbar($links) {
    echo '<ul class="nav navbar-nav">';
    foreach ($links as $page => $title) {
        $li = "li";
        if ((substr($_SERVER['SCRIPT_NAME'], -strlen($page))) === $page) {
            $li .= ' class="active"';
        }
        if ($this->page->settings->header_show_totals && isset($this->count[$page])) {
            $title .= " <span class=\"badge\">";
            $title .= $this->count[$page];
            $title .= "</span>";
        }
        echo "<$li><a href=\"$page\">$title</a></li>";
    }
    echo '</ul>';
}

function autoversion($file) {
    return $file . "?" . filemtime($file);
}



function print_header() {
$settings = $this->page->settings;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- COMMON TAGS -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Search Engine -->
<meta name="description" content="<?php echo $settings->meta_description; ?>">
<meta name="image" content="<?php echo $settings->meta_image; ?>">
<meta name="author" content="LiteBans">

<!-- Schema.org for Google -->
<meta itemprop="name" content="LiteBans Material Design Theme (Multiple Themes Included)">
<meta name="og:description" content="<?php echo $settings->meta_description; ?>">
<meta name="og:image" content="<?php echo $settings->meta_image; ?>">

<!-- Open Graph general (Facebook, Pinterest & Google+) -->
<meta name="og:description" content="<?php echo $settings->meta_title; ?>">
<meta name="og:image" content="<?php echo $settings->meta_image; ?>">
<meta name="og:site_name" content="<?php echo $settings->meta_title; ?>">
<meta name="og:type" content="website">
    
    
<?php
$themeurl = "inc/css/" . $settings->default_theme . ".bootstrap.min.css";

if (isset($_POST['theme']))
	{
	$_SESSION['theme'] = strtolower($_POST['theme']);
	}

if (isset($_SESSION['theme']))
	{
	$theme = $_SESSION['theme'];
	}

if (!empty($theme))
	{
	$themeurl = "inc/css/" . $theme . ".bootstrap.min.css";
	}
  else
	{
	$themeurl = "inc/css/" . $settings->default_theme . ".bootstrap.min.css";
	} ?>

    <!-- CSS -->
    
<link href="<?php echo $this->autoversion('inc/css/bootstrap.min.css'); ?>" rel="stylesheet">
<link rel="shortcut icon" href="<?php echo $settings->favico_image; ?>">
<link href="<?php echo $this->autoversion($themeurl); ?>" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.3/js/all.js"></script>
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/tippy.js@1.2.1/dist/tippy.css">


    
    
    <script type="text/javascript">
        function withjQuery(f) {
            if (window.jQuery) f();
            else window.setTimeout(function () {
                withjQuery(f);
            }, 100);
        }
    </script>
    <script>
    (function () {

  var COUNT = 300;
  var masthead = document.querySelector('html');
  var canvas = document.createElement('canvas');
  var ctx = canvas.getContext('2d');
  var width = masthead.clientWidth;
  var height = masthead.clientHeight;
  var i = 0;
  var active = false;

  function onResize() {
    width = masthead.clientWidth;
    height = masthead.clientHeight;
    canvas.width = width;
    canvas.height = height;
    ctx.fillStyle = '#FFF';

    var wasActive = active;
    active = width > 600;

    if (!wasActive && active)
      requestAnimFrame(update);
  }

  var Snowflake = function () {
    this.x = 0;
    this.y = 0;
    this.vy = 0;
    this.vx = 0;
    this.r = 0;

    this.reset();
  }

  Snowflake.prototype.reset = function() {
    this.x = Math.random() * width;
    this.y = Math.random() * -height;
    this.vy = 1 + Math.random() * 3;
    this.vx = 0.5 - Math.random();
    this.r = 1 + Math.random() * 2;
    this.o = 0.5 + Math.random() * 0.5;
  }

  canvas.style.position = 'absolute';
  canvas.style.left = canvas.style.top = '0';

  var snowflakes = [], snowflake;
  for (i = 0; i < COUNT; i++) {
    snowflake = new Snowflake();
    snowflake.reset();
    snowflakes.push(snowflake);
  }

  function update() {

    ctx.clearRect(0, 0, width, height);

    if (!active)
      return;

    for (i = 0; i < COUNT; i++) {
      snowflake = snowflakes[i];
      snowflake.y += snowflake.vy;
      snowflake.x += snowflake.vx;

      ctx.globalAlpha = snowflake.o;
      ctx.beginPath();
      ctx.arc(snowflake.x, snowflake.y, snowflake.r, 0, Math.PI * 2, false);
      ctx.closePath();
      ctx.fill();

      if (snowflake.y > height) {
        snowflake.reset();
      }
    }

    requestAnimFrame(update);
  }

  // shim layer with setTimeout fallback
  window.requestAnimFrame = (function(){
    return  window.requestAnimationFrame       ||
            window.webkitRequestAnimationFrame ||
            window.mozRequestAnimationFrame    ||
            function( callback ){
              window.setTimeout(callback, 1000 / 60);
            };
  })();

  onResize();
  window.addEventListener('resize', onResize, false);

  masthead.appendChild(canvas);
})();</script>
<script>
$(document).ready(function () {
    var interval = 5000;   //number of mili seconds between each call
    var refresh = function() {
   $.getJSON("https://use.gameapis.net/mc/query/players/<?php echo $settings->server_ip ?>",function(json){
          if (json.status !== true) {
         
        } else {
            // success
            $(".player-count").html(json.players.online);
            setTimeout(function(){ $('.player-count').removeClass('zoomIn').addClass('zoomOut') }, 14350); 
            setTimeout(function(){ $('.player-count').removeClass('zoomOut').addClass('zoomIn') }, 0);
        }
    });
    setTimeout(function() {
        refresh();
            },
        interval);
            }
        refresh();
});
</script>

</head>
<?php if ($settings->show_navigation) : ?>
<header class="navbar navbar-expand-lg navbar-dark bg-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#litebans-navbar" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo $settings->name_link; ?>">
                <?php echo $settings->name; ?>
            </a>
        </div>
        <nav id="litebans-navbar" class="collapse navbar-collapse">
            <?php
            $this->navbar(array(
                "index.php"    => "<i class=\"fas fa-home\" style=\"padding-right:5px;\"></i>".$this->page->t("header_index"),
                "bans.php"     => "<i class=\"fas fa-ban\" style=\"padding-right:5px;\"></i>".$this->page->t("header_bans"),
                "mutes.php"    => "<i class=\"fas fa-comment\" style=\"padding-right:5px;\"></i>".$this->page->t("header_mutes"),
                "warnings.php" => "<i class=\"fas fa-gavel\" style=\"padding-right:5px;\"></i>".$this->page->t("header_warnings"),
                "kicks.php"    => "<i class=\"fas fa-suitcase\" style=\"padding-right:5px;\"></i>".$this->page->t("header_kicks"),
            ));
            ?>
            <div class="nav navbar-nav navbar-right">
<?php $this->page->print_theme_changer(); ?>
                    <li class="dropdown">
                       <?php if ($settings->show_in_nav) : ?>
                      <li><a title="Click to Copy IP" data-clipboard-text="<?php echo $settings->server_ip ?>" style="color:white;" id="player-count-button"><?php echo $this->page->t("players_online") ?><span class="player-count badge"></span></a></li>
                      <?php else : ?>
                      <?php endif;?>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $this->page->t("credits") ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a target="_blank" href="https://github.com/darbyjack/litebans-material-design"><?php echo $this->page->t("github") ?></a></li>
                            <li><a target="_blank" href="https://www.spigotmc.org/resources/litebans.3715/"><?php echo $this->page->t("litebans") ?></a></li>
                            <li><a target="_blank" href="https://glaremasters.me/"><?php echo $this->page->t("glare") ?></a></li>
                            <?php if ($settings->display_version) : ?>
                            <?php $version = file_get_contents("https://glaremasters.me/api/litebans-version.php"); ?>
                            <?php if ($settings->version == $version) : ?>
                            <li><a><?php echo $this->page->t("version") ?><b><?php echo $this->page->t("version_latest") ?></b></a></li>
                            <?php else : ?>
                            <li><a target="_blank" href="https://www.spigotmc.org/resources/litebans-material-design-theme-multiple-themes-included.46648/"><?php echo $this->page->t("click_for_latest_version") ?></a></li>
                            <?php endif; ?>
                            <?php else : ?>
                            <?php endif; ?>
                        </ul>
                    </li>
            </div>
        </nav>
    </div>
</header>
<?php else : ?>
<?php endif; ?>
<?php
}
}
?>
