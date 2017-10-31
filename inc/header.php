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
$themeurl = "inc/css/wilikath.bootstrap.min.css";
if(isset($_POST['theme'])){
   $_SESSION['theme'] = strtolower($_POST['theme']);

}
if(isset($_SESSION['theme'])){
   $theme = $_SESSION['theme'];
}
    if(!empty($theme)) {
      $themeurl = "inc/css/" . $theme . ".bootstrap.min.css";
} else { $themeurl = "inc/css/wilikath.bootstrap.min.css"; }?>

    <!-- CSS -->
    
<link href="<?php echo $this->autoversion('inc/css/bootstrap.min.css'); ?>" rel="stylesheet">
<link rel="shortcut icon" href="inc/img/minecraft.ico">
<link href="<?php echo $this->autoversion($themeurl); ?>" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
                "index.php"    => "<i class=\"fa fa-home\" style=\"padding-right:5px;\"></i>".$this->page->lang->header_index,
                "bans.php"     => "<i class=\"fa fa-ban\" style=\"padding-right:5px;\"></i>".$this->page->lang->header_bans,
                "mutes.php"    => "<i class=\"fa fa-commenting\" style=\"padding-right:5px;\"></i>".$this->page->lang->header_mutes,
                "warnings.php" => "<i class=\"fa fa-gavel\" style=\"padding-right:5px;\"></i>".$this->page->lang->header_warnings,
                "kicks.php"    => "<i class=\"fa fa-suitcase\" style=\"padding-right:5px;\"></i>".$this->page->lang->header_kicks,
            ));
            ?>
            <div class="nav navbar-nav navbar-right">
<?php $this->page->print_theme_changer(); ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $this->page->lang->credits ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a target="_blank" href="https://github.com/darbyjack/litebans-material-design"><?php echo $this->page->lang->github ?></a></li>
                            <li><a target="_blank" href="https://www.spigotmc.org/resources/litebans.3715/"><?php echo $this->page->lang->litebans ?></a></li>
                            <li><a target="_blank" href="https://glaremasters.me/"><?php echo $this->page->lang->glare ?></a></li>
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
