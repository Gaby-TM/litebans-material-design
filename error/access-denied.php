<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>litebans-php - Database Error</title>
    <link href="../inc/css/bootstrap.min.css" rel="stylesheet">
    <link href="../inc/css/mdb.min.css" rel="stylesheet">
</head>
<style>
.container {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
html {
    background-image: url(../inc/img/backgrounds/unconfigured-background.jpg);
    background-repeat: no-repeat;
    background-size: cover;
}
</style>
<body><center>
<div class="container">
    <div class="jumbotron">
        <h1 class="h1-responsive">Connection Error</h1><br>
        <h4>
            The web interface was unable to connect to the database using the configuration provided.
            <br>
            Connection error: Access denied
                <br>
            <?php
            if (isset($_GET['error'])) {
                $error = $_GET['error'];
                if (strlen($error) <= 1024) {
                    $error = base64_decode($error, true);

                    if ($error !== false) {
                        // sanitize user input
                        $error = htmlspecialchars($error, ENT_QUOTES, "UTF-8");

                        echo $error;
                    }
                }
            }
            ?></h4>
        <br>
        <a href="../" class="btn btn-cyan">Try Again</a>
    </div>
</div></center>
</body>
</html>
